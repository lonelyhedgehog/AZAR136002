<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Анкета");
?><?$APPLICATION->IncludeComponent(
	"miet:abiturient.anketa",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>