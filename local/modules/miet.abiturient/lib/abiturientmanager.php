<?php
namespace MIET\Abiturient;

use Bitrix\Main\Application;
use Bitrix\Main\Entity;
use Bitrix\Main\Entity\Event;
use Bitrix\Main\Localization\Loc;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\UserTable;

Loc::loadMessages(__FILE__);

class AbiturientManager {
    public static function SaveAbit($arData)
    {
        $db = Application::getConnection();
        $db->startTransaction();
        $result = AbiturientTable::add(array(
                // в таблицу абитуриент //
                'UF_SURNAME' => $arData['UF_SURNAME'],
                'UF_NAME' => $arData['UF_NAME'],
                'UF_MIDDLENAME' => $arData['UF_MIDDLENAME'],
                'UF_DATA' => $arData['UF_DATA'],
                'UF_CITY' => $arData['UF_CITY'],
                'UF_STREET' => $arData['UF_STREET'],
                'UF_HOME' => $arData['UF_HOME'],
                'UF_FLAT' => $arData['UF_FLAT'],
                'UF_INDEX' => $arData['UF_INDEX'])
        );

        if (!$result->isSuccsess()) {
            $db->rollbackTransaction();
            Return false;
        }
        $idAbit = $result->getID();
        //получили айди абитуриента//

        //сохраняем его направления]//
        foreach ($arData['Napr'] as $idNapr => $priorNapr) {
            $result = AbitNapr::add(array(
                'UF_APP' => $idAbit,
                'UF_DIR' => $idNapr,
                'UF_PRIORITY' => $priorNapr
            ));
        }

        if (!$result->isSuccsess()) {
            $db->rollbackTransaction();
            return false;
        }

        //сохраняем сертификат абитуриента//
        $result = SertificatTable::add(array(
                'UF_IDAPP' => $idAbit,
                'UF_SERT' => $arData['UF_SERT'],
                'UF_ISSUEDATE' => $arData['UF_ISSUEDATE'],
                'UF_TERM' => $arData['UF_TERM'])
        );

        if (!$result->isSuccsess()) {
            $db->rollbackTransaction();
            return false;
        }

        $idSert = $result->getID();
        //получили айди сертификата//

        //сохраняем его баллы]//
        foreach ($arData['Ball'] as $idBall => $scoreBall) {
            $result = AbitBall::add(array(
                'UF_IDCERT' => $idSert,
                'UF_DISC' => $idBall,
                'UF_SCORE' => $scoreBall));
        }

        if (!$result->isSuccsess()) {
            $db->rollbackTransaction();
            return false;
        }
        $db->commitTransaction();
        return true;
    }
}