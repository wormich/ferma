<?php

/**
 * @global $USER
 * @global $APPLICATION
 * @var $REQUEST_METHOD
 * @var $Update
 * @var $Apply
 * @var $RestoreDefaults
 */
if (!$USER->IsAdmin())
    return;

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/options.php");
IncludeModuleLangFile(__FILE__);
global $SERVER_NAME;
$arAllOptions = array(
    array("active", 'Активность', array("checkbox")),
    array("site_key", 'Ключ сайта', array("text", 40)),
    array("secret_key", 'Секретный ключ', array("text", 40)),
);


$aTabs = array(
    array("DIV" => "edit1", "TAB" => GetMessage("MAIN_TAB_SET"), "ICON" => "ib_settings", "TITLE" => GetMessage("MAIN_TAB_TITLE_SET")),
);

$tabControl = new CAdminTabControl("tabControl", $aTabs);

if ($REQUEST_METHOD == "POST" && strlen($Update . $Apply . $RestoreDefaults) > 0 && check_bitrix_sessid()) {
    if (strlen($RestoreDefaults) > 0) {
        COption::RemoveOption('realweb.recaptcha');
    } else {
        foreach ($arAllOptions as $arOption) {
            $name = $arOption[0];
            $val = $_REQUEST[$name];
            if ($arOption[2][0] == "checkbox" && $val != "Y")
                $val = "N";
            if ($arOption[2][0] == "text" && $arOption[2][1] == "multiple") {
                if (!is_array($val)) {
                    $val = Array();
                } else {
                    foreach ($val as $key => $v) {
                        if (strlen($v) <= 0) {
                            unset($val[$key]);
                        }
                    }
                }
                $val = serialize($val);
            }

            if ($arOption[2][0] == "text" && $arOption[2][1] == "multipleExtra") {
                reset($arOption[2][3]);
                $firstCode = key($arOption[2][3]);
                if (!is_array($val)) {
                    $val = Array();
                } else {
                    foreach ($val as $key => $v) {
                        if (strlen($v[$firstCode]) <= 0) {
                            unset($val[$key]);
                        }
                    }
                }
                $val = serialize($val);

            }

            COption::SetOptionString("realweb.recaptcha", $name, $val, $arOption[1]);
        }
    }
    if (strlen($Update) > 0 && strlen($_REQUEST["back_url_settings"]) > 0)
        LocalRedirect($_REQUEST["back_url_settings"]);
    else
        LocalRedirect($APPLICATION->GetCurPage() . "?mid=" . urlencode($mid) . "&lang=" . urlencode(LANGUAGE_ID) . "&back_url_settings=" . urlencode($_REQUEST["back_url_settings"]) . "&" . $tabControl->ActiveTabParam());
}


$tabControl->Begin();
?>
<form method="post"
      action="<? echo $APPLICATION->GetCurPage() ?>?mid=<?= urlencode($mid) ?>&amp;lang=<? echo LANGUAGE_ID ?>">
    <? $tabControl->BeginNextTab(); ?>
    <?
    foreach ($arAllOptions as $arOption):
        $val = COption::GetOptionString("realweb.recaptcha", $arOption[0]);
        $type = $arOption[2];
        ?>
        <tr>
            <td width="40%" nowrap <? if ($type[0] == "textarea") echo 'class="adm-detail-valign-top"' ?>>
                <label for="<? echo htmlspecialcharsbx($arOption[0]) ?>"><? echo $arOption[1] ?>:</label>
            </td>
            <td width="60%">
                <? if ($type[0] == "checkbox"): ?>
                    <input type="checkbox" id="<? echo htmlspecialcharsbx($arOption[0]) ?>"
                           name="<? echo htmlspecialcharsbx($arOption[0]) ?>"
                           value="Y"<? if ($val == "Y") echo " checked"; ?>>
                <? elseif ($type[0] == "text"): ?>
                    <?
                    if ($type[1] == "multiple") {

                        $arVal = unserialize($val);

                        if (!is_array($arVal)) {
                            $arVal = Array();
                        }

                        for ($i = 0; $i < ($type[2] ? $type[2] : 3); $i++) {
                            $arVal[] = "";
                        }
                        ?>
                        <? foreach ($arVal as $key => $strVal) { ?>
                            <input type="text" size="<? echo $type[1] ?>" maxlength="255"
                                   value="<? echo htmlspecialcharsbx($strVal) ?>"
                                   name="<? echo htmlspecialcharsbx($arOption[0]) ?>[]"><br/>
                        <? } ?>
                    <? } elseif ($type[1] == "multipleExtra") {

                        $arVal = unserialize($val);

                        if (!is_array($arVal)) {
                            $arVal = Array();
                        }

                        for ($i = 0; $i < ($type[2] ? $type[2] : 3); $i++) {
                            $arVal[] = Array();
                        }

                        ?>
                        <table>
                        <tr>
                            <? foreach ($type[3] as $name) {
                                ?>
                                <th><?= $name ?></th><?
                            } ?>
                        </tr>
                        <? foreach ($arVal as $key => $strVal) {

                            ?>
                            <tr>
                                <? foreach ($type[3] as $code => $name) {
                                    if (!isset($strVal[$code]) || strlen($strVal[$code]) <= 0) {
                                        $strVal[$code] = "";
                                    }
                                    ?>
                                    <td><input type="text" size="<? echo $type[1] ?>" maxlength="255"
                                               value="<? echo htmlspecialcharsbx($strVal[$code]) ?>"
                                               name="<? echo htmlspecialcharsbx($arOption[0]) ?>[<?=$key?>][<?= $code ?>]"/>
                                    </td><?
                                } ?>
                            </tr>

                        <? } ?>

                        </table><?

                    } else { ?>
                        <input type="text" size="<? echo $type[1] ?>" maxlength="255"
                               value="<? echo htmlspecialcharsbx($val) ?>"
                               name="<? echo htmlspecialcharsbx($arOption[0]) ?>">
                    <? } ?>
                <? elseif ($type[0] == "textarea"): ?>
                    <textarea rows="<? echo $type[1] ?>" cols="<? echo $type[2] ?>"
                              name="<? echo htmlspecialcharsbx($arOption[0]) ?>"><? echo htmlspecialcharsbx($val) ?></textarea>

                <? elseif ($type[0] == "select"):
                    ?>

                    <select name="<? echo htmlspecialcharsbx($arOption[0]) ?>">
                        <? foreach ($type[1] as $key => $valueSelect) { ?>
                            <option value="<?= htmlspecialcharsbx($key) ?>" <? if ($val == $key) { ?> selected=""<? } ?>><?= htmlspecialcharsbx($valueSelect) ?></option>
                        <? } ?>
                    </select>
                <? endif ?>
            </td>
        </tr>
    <? endforeach ?>
    <? $tabControl->Buttons(); ?>
    <input type="submit" name="Update" value="<?= GetMessage("MAIN_SAVE") ?>"
           title="<?= GetMessage("MAIN_OPT_SAVE_TITLE") ?>" class="adm-btn-save">
    <input type="submit" name="Apply" value="<?= GetMessage("MAIN_OPT_APPLY") ?>"
           title="<?= GetMessage("MAIN_OPT_APPLY_TITLE") ?>">
    <? if (strlen($_REQUEST["back_url_settings"]) > 0): ?>
        <input type="button" name="Cancel" value="<?= GetMessage("MAIN_OPT_CANCEL") ?>"
               title="<?= GetMessage("MAIN_OPT_CANCEL_TITLE") ?>"
               onclick="window.location = '<? echo htmlspecialcharsbx(CUtil::addslashes($_REQUEST["back_url_settings"])) ?>'">
        <input type="hidden" name="back_url_settings" value="<?= htmlspecialcharsbx($_REQUEST["back_url_settings"]) ?>">
    <? endif ?>
    <input type="submit" name="RestoreDefaults" title="<? echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS") ?>"
           OnClick="return confirm('<? echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING")) ?>')"
           value="<? echo GetMessage("MAIN_RESTORE_DEFAULTS") ?>">
    <?= bitrix_sessid_post(); ?>
    <? $tabControl->End(); ?>
</form>