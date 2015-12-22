<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
###»нициализаци¤ глобальных переменных Ѕитрикс###
global $DB;
/** @global CUser $USER */
global $USER;

\Bitrix\Main\Loader::includeModule('miet.abiturient');
use MIET\abiturient;

###Сохранение значений KPI###
if($_REQUEST['saveAbit']) {
    if(abiturient\AbiturientManager::SaveAbit($_REQUEST)) {
        $arResult['OK'] = 'Изменения успешно сохранены';
    } else {
        $arResult['ERROR'] = 'Ошибка при сохранении';
    }
}
###

$arEGE = CIBlockElement::GetList(
    array("NAME" => "asc"),
    array("IBLOCK_CODE" => "GuideDisc"),
    false,
    false,
    array("ID", "NAME"));
while ($rowGen = $arEGE->getNext()) {
    $arResult['EGE'][$rowGen["ID"]] = $rowGen["NAME"];
}

$arNapr = CIBlockElement::GetList(
    array('NAME'=>'asc'),
    array("IBLOCK_CODE" => "GuideDirection"),
    false,
    false,
    array('ID', 'NAME', 'PROPERTY_CODE'));
While ($rowNapr = $arNapr-> getNext()){
    $arResult['Napr'][$rowNapr["ID"]]=$rowNapr;
}

$this->IncludeComponentTemplate();