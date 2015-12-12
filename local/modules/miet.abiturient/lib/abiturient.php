<?php
namespace MIET\Abiturient;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class AbiturientTable extends Entity\DataManager {
    public static function getFilePath()
    {
        return __FILE__;
    }

    /*Название таблицы HL в БД*/
    public static function getTableName()
    {
        return 'Applicant';
    }

    /*Описание полей сущности (соответсвуют полям HL DepartmentKPI)*/
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('Abiturient_ID_FIELD'),
            ),

            'UF_INDEX' => array(
                'data_type' => 'float',
                'validation' => array(//Метод-валидатор значения
                    __CLASS__,//Имя класса метода-валидатора, в данном случае текущий класс
                    'validateValue' //Название метода-валидатора в данном классе
                ),
                'title' => Loc::getMessage('Index'),
            ),

            'UF_FLAT' => array(
                'data_type' => 'float',
                'title' => Loc::getMessage('Flat'),
            ),

            'UF_DATA' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('Birthday'),
            ),

            'UF_SURNAME' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('Family'),
            ),
            'UF_NAME' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('Name'),
            ),
            'UF_MIDDLENAME' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('Middlename'),
            ),

            'UF_HOME' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('Home'),
            ),
            'UF_CITY' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('City'),
            ),
            'UF_STREET' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('Street'),
            ),
        );
    }

    public static function validateValue()
    {
        return array(
            new Entity\Validator\Range(0, null, false, array("MIN" => "Количество должно быть больше нуля")),
        );
    }
}
