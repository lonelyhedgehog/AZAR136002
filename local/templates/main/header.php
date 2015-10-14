
<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die(); ?>
<?IncludeTemplateLangFile(__FILE__);?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Black / White
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20111121

-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?=LANGUAGE_ID?>">
<head>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle();?></title>
    <link href='http://fonts.googleapis.com/css?family=Nova+Mono' rel='stylesheet' type='text/css'>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/style.css", true);?>

</head>
<body>
<?$APPLICATION->ShowPanel();?>
<div id="wrapper">
    <div id="header-wrapper">
        <div id="header">
            <div id="logo">
                <h1>Абитуриентам</h1>
                <p>Поcтупайте к нам</p>
            </div>
        </div>
    </div>
    <!-- end #header -->
    <div id="menu">
        <ul>
            <li class="current_page_item"><a href="#">Главная</a></li>
            <li><a href="#">Анкета</a></li>
            <li><a href="#">Сотруднику</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
    </div>
    <!-- end #menu -->
    <div id="page">
        <div id="page-bgtop">
            <div id="page-bgbtm">
                <div id="content">