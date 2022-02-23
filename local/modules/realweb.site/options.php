<?

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
    array("subscribe_action", 'Обработчик для подписки через UNISENDER', array("text")),
    array("recaptcha_key", 'reCaptcha ключ', array("text")),
    array("recaptcha_secret_key", 'reCaptcha секретный ключ', array("text")),
    array("link_booking", 'Ссылка на booking', array("text")),
    array("link_policy", 'Ссылка на политику конфиденциальности', array("text")),
    array("site_body_class", 'Класс body', array("text")),
//    array("import_iterateCount", 'Импорт, Limit', array("text")),
//    array("sync_image_directory", 'расположение импортируемых картинок', array("text")),
//
//
//    array("import_file_place_element", 'Расположение файла импорта элементов', array("text")),
//    array("import_file_place_image", 'Расположение файла импорта картинок', array("text")),
//    array("import_file_place_property", 'Расположение файла импорта свойства', array("text")),
//    array("import_file_place_propertyelement", 'Расположение файла импорта привязок свойств', array("text")),
//    array("import_file_place_propertvalues", 'Расположение файла импорта значений свойств', array("text")),
//    array("import_file_place_section", 'Расположение файла импорта секций', array("text")),
//    array("import_file_section_property", 'Расположение файла импорта привязки фильтров к разделам', array("text")),
//
//    array("sync_elements_property_codes", 'Свойства, для выгрузки', array("text", "multipleExtra", 2, Array(0 => "код свойства в файле", 1 => "код свойства в инфоблоке"))),
//    array("not_show_property", 'Служебные свойства(указать коды свойств):', array("text", "multiple", 5, )),
//
//    array("need_sync_element", 'пора синхронизировать элементы ', array("checkbox")),
//    array("need_sync_image", 'пора синхронизировать картинки ', array("checkbox")),
//    array("need_sync_property", 'пора синхронизировать  свойтсва', array("checkbox")),
//
//    array("need_sync_propertyvalues", 'пора синхронизировать  значения свойств', array("checkbox")),
//    array("need_sync_propertysection", 'пора синхронизировать  привязки свойств к разделам', array("checkbox")),
//    array("need_sync_section", 'пора синхронизировать  разделы ', array("checkbox")),

);


$aTabs = array(
    array("DIV" => "edit1", "TAB" => GetMessage("MAIN_TAB_SET"), "ICON" => "ib_settings", "TITLE" => GetMessage("MAIN_TAB_TITLE_SET")),
    array("DIV" => "edit2", "TAB" => 'Загрузка картинок', "ICON" => "ib_settings", "TITLE" => 'Загрузка картинок'),
);

$tabControl = new CAdminTabControl("tabControl", $aTabs);

if ($_REQUEST['GalleryDownload'] && check_bitrix_sessid() && $REQUEST_METHOD == "POST") {
    if (!empty($_FILES['GALLERY_PICTURES'])) {
        foreach ($_FILES['GALLERY_PICTURES'] as $fileKey => $files) {
            foreach ($files as $key => $value) {
                $arFiles[$key][$fileKey] = $value;
            }
        }
        $el = new CIBlockElement();
        foreach ($arFiles as $file) {
            if ($el->Add(array(
                'IBLOCK_ID' => IBLOCK_CONTENT_GALLERY,
                'IBLOCK_SECTION_ID' => $_REQUEST['GALLERY_SECTION_ID'],
                'ACTIVE' => 'Y',
                'NAME' => basename($file['name']),
                'DETAIL_PICTURE' => $file
            ))) {
                echo '<p>Фото добавлено: ' . basename($file['name']) . '</p>';
            } else {
                echo '<p>Ошибка:' . $el->LAST_ERROR . ' </p>';
            }
            //$FILES[] = array("VALUE" => \CFile::MakeFileArray(\CFile::SaveFile($file, '/iblock/')), "DESCRIPTION" => "");
        }
    }
}

if ($REQUEST_METHOD == "POST" && strlen($Update . $Apply . $RestoreDefaults) > 0 && check_bitrix_sessid()) {
    if (strlen($RestoreDefaults) > 0) {
        COption::RemoveOption('realweb.site');
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

            COption::SetOptionString("realweb.site", $name, $val, $arOption[1]);
        }
    }
    if (strlen($Update) > 0 && strlen($_REQUEST["back_url_settings"]) > 0)
        LocalRedirect($_REQUEST["back_url_settings"]);
    else
        LocalRedirect($APPLICATION->GetCurPage() . "?mid=" . urlencode($mid) . "&lang=" . urlencode(LANGUAGE_ID) . "&back_url_settings=" . urlencode($_REQUEST["back_url_settings"]) . "&" . $tabControl->ActiveTabParam());
}
$arGallery = array();
if (\Bitrix\Main\Loader::includeModule("iblock")) {
    $arGallery['SECTIONS'] = \Bitrix\Iblock\SectionTable::getList(array(
        'filter' => array('IBLOCK_ID' => IBLOCK_CONTENT_GALLERY, 'ACTIVE' => 'Y')
    ))->fetchAll();
}

$tabControl->Begin();
?>
<form method="post"
      action="<? echo $APPLICATION->GetCurPage() ?>?mid=<?= urlencode($mid) ?>&amp;lang=<? echo LANGUAGE_ID ?>"
      enctype="multipart/form-data">
    <? $tabControl->BeginNextTab(); ?>
    <?
    foreach ($arAllOptions as $arOption):
        $val = COption::GetOptionString("realweb.site", $arOption[0]);
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
    <? $tabControl->BeginNextTab(); ?>
    <tr>
        <td>
            <select name="GALLERY_SECTION_ID">
                <option value="">Выберите раздел</option>
                <? foreach ($arGallery['SECTIONS'] as $section): ?>
                    <option value="<?= $section['ID'] ?>"><?= $section['NAME'] ?></option>
                <? endforeach; ?>
            </select>
            <input type="file" name="GALLERY_PICTURES[]" multiple>
        </td>
    </tr>
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
    <input type="submit" name="GalleryDownload" value="Загрузить фото"
           title="<?= GetMessage("MAIN_OPT_APPLY_TITLE") ?>">
    <?= bitrix_sessid_post(); ?>
    <? $tabControl->End(); ?>
</form>

<? $tabControl->BeginNextTab(); ?>