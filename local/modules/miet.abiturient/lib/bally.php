<?php
namespace MIET\Abiturient;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class BallyTable extends Entity\DataManager {
    public static function getFilePath()
    {
        return __FILE__;
    }

    /*Название таблицы HL в БД*/
    public static function getTableName()
    {
        return 'Discipline';
    }

    /*Описание полей сущности (соответсвуют полям HL DepartmentKPI)*/
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('ID_FIELD'),
            ),

            'UF_SERT' => array(
                'data_type' => 'integer',
                'requaried' => true,
                'title' => Loc::getMessage('SERT_ID_FIELD'),
            ),


            'UF_DISC' => array(
                'data_type' => 'integer',
                'requaried' => true,
                'title' => Loc::getMessage('DISC_FIELD'),
            ),

            'UF_SCORE' => array(
                'data_type' => 'integer',
                'requaried' => true,
                'validation' => array(//Метод-валидатор значения
                    __CLASS__,//Имя класса метода-валидатора, в данном случае текущий класс
                    'validateValue' //Название метода-валидатора в данном классе
                ),
                'title' => Loc::getMessage('SCORE_FIELD'),
            ),

            new Entity\ReferenceField(
                'UF_SERT',
                'miet/abiturient/SertificatTable',
                array('=this.UF_SERT' => 'ref.UF_SERT')
            ),

            new Entity\ReferenceField(
                'UF_DISC',
                'Bitrix\Iblock\GuideDisc',
                array('=this.UF_DISC' => 'ref.ID')
            ),



        );
    }
    public static function validateValue()
    {
        return array(
            new Entity\Validator\Range(0, 100, false, array("MIN" => "Балл может быть в интервале от 0 до 100")),
        );
    }
}
