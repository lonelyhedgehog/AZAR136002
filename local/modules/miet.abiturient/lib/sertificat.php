<?php
namespace MIET\Abiturient;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class SertificatTable extends Entity\DataManager {
    public static function getFilePath()
    {
        return __FILE__;
    }

    /*Название таблицы HL в БД*/
    public static function getTableName()
    {
        return 'Sertificat';
    }

    /*Описание полей сущности (соответсвуют полям HL DepartmentKPI)*/
    public static function getMap()
    {
        return array(

            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('SERT_ID_FIELD'),
            ),

            'UF_IDAPP' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('IDAPP'),
            ),

            'UF_SERT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('SERT'),
            ),

            'UF_TERM' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('TERM'),
            ),
            'UF_ISSUEDATE' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('ISSUEDATE'),
            ),

            new Entity\ReferenceField(
                'UF_IDAPP',
                'miet\abiturient\AbiturientTable',
                array('=this.UF_IDAPP' => 'ref.ID')
            ),


        );
    }

}
