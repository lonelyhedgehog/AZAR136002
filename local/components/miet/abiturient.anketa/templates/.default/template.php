<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if($arResult['OK']):?>
    <?ShowMessage(array('TYPE' => 'OK','MESSAGE' =>
        $arResult['OK']));?>
<?endif;?>
<?if($arResult['ERROR']):?>
    <?ShowMessage(array('TYPE' => 'ERROR','MESSAGE' =>
        $arResult['ERROR']));?>
<?endif;?>


<form action="<?=POST_FORM_ACTION_URI?>" method="post">
<table>
    <tr>
        <td colspan="2"><b> <?=GetMessage('PERSONAL');?></b></td>
    </tr>

    <tr>
        <td><?=GetMessage('SURNAME');?> </td>
        <td><input type="text" name="UF_SURNAME" value="<?=$REQUEST["UF_SURNAME"];?>"> </td>
    </tr>

    <tr>
        <td><?=GetMessage('ANAME');?> </td>
        <td><input type="text" name="UF_NAME" value="<?=$REQUEST["UF_NAME"];?>"> </td>
    </tr>

    <tr>
        <td><?=GetMessage('MIDDLENAME');?></td>
        <td> <input type="text" name="UF_MIDDLENAME" value="<?=$REQUEST["UF_MIDDLENAME"];?>"></td>
    </tr>


    <tr>
        <td> <?=GetMessage('CITY');?> </td>
        <td><input type="text" name="UF_CITY" value="<?=$REQUEST["UF_CITY"];?>"> </td>
    </tr>


    <tr>
        <td><?=GetMessage('STREET');?> </td>
        <td><input type="text" name="UF_STREET" value="<?=$REQUEST["UF_STREET"];?>"> </td>
    </tr>

    <tr>
        <td><?=GetMessage('HOME');?> </td>
        <td><input type="text" name="UF_HOME" value="<?=$REQUEST["UF_HOME"];?>"> </td>
    </tr>

    <tr>
        <td><?=GetMessage('FLAT');?> </td>
        <td><input type="text" name="UF_FLAT" value="<?=$REQUEST["UF_FLAT"];?>"> </td>
    </tr>

    <tr>
        <td> <?=GetMessage('INDEX');?> </td>
        <td><input type="text" name="UF_INDEX" value="<?=$REQUEST["UF_INDEX"];?>"> </td>
    </tr>

    <tr>
        <td><b> <?=GetMessage('MEGE');?> </b></td>
    </tr>

    <tr>
        <td> <?=GetMessage('SERT');?> </td>
        <td><input type="text" name="UF_SERT" value="<?=$REQUEST["UF_SERT"];?>"> </td>
    </tr>
    <tr>
        <td colspan="2"><b> <?=GetMessage('DISCIPLINE');?></b></td>
    </tr>
    <?foreach($arResult["EGE"] as $idEGE => $nameEGE):?>
        <tr>
            <td>
                <?=$nameEGE; ?>
            </td>
            <td>
                <input type="text" name="DIS[<?=$idEGE;?>]" value="<?=$REQUEST["DIS[".$idEGE."]"];?>">
            </td>
        </tr>
    <?endforeach;?>

    <tr>
        <td colspan="2"><b> <?=GetMessage('Napr');?></b></td>
    </tr>
    <?foreach($arResult["Napr"] as $idNapr => $arNapr):?>
        <tr>
            <td>
                <?=$arNapr['PROPERTY_CODE_VALUE']  .' '. $arNapr['NAME']; ?>
            </td>
            <td>
                <?=GetMessage('Prior');?>
                <select name='Napr[<?=$arNapr['ID'];?> ]' >
                    <?for($i = 1;$i <= 3; $i++):?>
                        <option value='<?=$i;?>' <?($i == $REQUEST['Napr'][$arNapr['ID']] ? ' selected' : '')?>><?=$i;?></option>
                    <?endfor;?>
                </select>
            </td>
        </tr>
    <?endforeach;?>

    <tr>
        <td colspan="1">
            <input type="submit" name="saveAbit" value="Сохранить">
        </td>
    </tr>

</table>
</form>
