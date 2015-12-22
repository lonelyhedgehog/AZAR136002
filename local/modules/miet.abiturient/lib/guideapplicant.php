<?php
namespace MIET\Abiturient;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class GuideTable extends Entity\DataManager {
    public static function getFilePath()
    {
        return __FILE__;
    }

    /*Название таблицы HL в БД*/
    public static function getTableName()
    {
        return 'guide_applicant';
    }

    /*Описание полей сущности (соответсвуют полям HL DepartmentKPI)*/
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('GUIDE_ID_FIELD'),
            ),

            'UF_IDA' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('IDA_ID_FIELD'),
            ),


            'UF_DIR' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('DIR_ID_FIELD'),
            ),

            'UF_PRIORITY' => array(
                'data_type' => 'integer',
                'validation' => array(//Метод-валидатор значения
                    __CLASS__,//Имя класса метода-валидатора, в данном случае текущий класс
                    'validateValue' //Название метода-валидатора в данном классе
                ),
                'title' => Loc::getMessage('Priority'),
            ),

            //Cвязи

            /*new Entity\ReferenceField(
                'UF_IDA',
                'MIET\Abiturient\AbiturientTable',
                array('=this.UF_IDA' => 'ref.ID')
            ),*/

            new Entity\ReferenceField(
                'UF_DIR',
                'Bitrix\Iblock\GuideDirections',
                array('=this.UF_DIR' => 'ref.ID')
            ),


        );
    }

    public static function validateValue()
    {
        return array(
            new Entity\Validator\Range(0, null, false, array("MIN" => "Приоритет должен быть больше 0")),
        );
    }
}
