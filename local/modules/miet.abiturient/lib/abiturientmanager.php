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
                'UF_CITY' => $arData['UF_CITY'],
                'UF_STREET' => $arData['UF_STREET'],
                'UF_HOME' => $arData['UF_HOME'],
                'UF_FLAT' => $arData['UF_FLAT'],
                'UF_INDEX' => $arData['UF_INDEX'])
        );

        if (!$result->isSuccess()) {
            $db->rollbackTransaction();
            Return false;
        }
        print $idAbit = $result->getId();
        //получили айди абитуриента//

        //сохраняем его направления]//
        foreach ($arData['Napr'] as $idNapr => $priorNapr) {
            $result = GuideTable::add(array(
                'UF_IDA' => $idAbit,
                'UF_DIR' => $idNapr,
                'UF_PRIORITY' => $priorNapr
            ));
        }

        if (!$result->isSuccess()) {
            $db->rollbackTransaction();
            return false;
        }

        //сохраняем сертификат абитуриента//
        $result = SertificatTable::add(array(
                'UF_IDAPP' => $idAbit,
                'UF_SERT' => $arData['UF_SERT'],)
        );

        if (!$result->isSuccess()) {
            $db->rollbackTransaction();
            return false;
        }

        print $idSert = $result->getId();
        //получили айди сертификата//

        //сохраняем его баллы]//
        foreach ($arData['DIS'] as $idBall => $scoreBall) {
            $result = BallyTable::add(array(
                'UF_SERT' => $idSert,
                'UF_DISC' => $idBall,
                'UF_SCORE' => $scoreBall));
        }

        if (!$result->isSuccess()) {
            $db->rollbackTransaction();
            return false;
        }
        $db->commitTransaction();
        return true;
    }
}