<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<ul class="nav nav-tabs" id="myTab-three" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab-three" data-bs-toggle="tab" href="#home-three" role="tab"
           aria-controls="home" aria-selected="false">Основная информация</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab-three" data-bs-toggle="tab" href="#profile-three" role="tab"
           aria-controls="profile" aria-selected="false">Категории ресторана</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " id="contact-tab-three" data-bs-toggle="tab" href="#contact-three"
           role="tab" aria-controls="contact" aria-selected="true">Описание ресторана</a>
    </li>
</ul>
<form action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data" id="rest_info">

    <?= bitrix_sessid_post() ?>
    <input type="hidden" name="action" value="Action_make_company">
    <input type="hidden" name="FIELDS[ID]" id="FIELDS_ID" value="<?= !empty($arParams['ID']) ? $arParams['ID'] : '' ?>"/>

    <div class="tab-content" id="myTabContent-4">
    <div class="tab-pane fade  active show" id="home-three" role="tabpanel" aria-labelledby="home-tab-three">
        <div class="form-group">
            <label>Название ресторана</label>
            <input type="text" name="FIELDS[NAME]" maxlength="255"
                   value="<?= !empty($arResult['ITEM']['NAME']) ? $arResult['ITEM']['NAME'] : '' ?>"
                   id="FIELDS_NAME"
                   class="form-control" placeholder="">
<div class="row">
            <? foreach ($arResult['PROPS'] as $prop): ?>
                <? if ($prop['PROPERTY_TYPE'] == 'F') continue; ?>
                <? if ($prop['CODE'] == 'RATING') continue; ?>
                <div class="col-12 col-md-6 col-lg-4 mt-3">
                    <label><?= $prop['HINT'] ?: $prop['NAME'] ?></label>
                    <? if ($prop['PROPERTY_TYPE'] == 'L' || $prop['USER_TYPE'] == 'directory'): ?>
                        <div class="form-check">
                            <? foreach ($prop['VALUES'] as $value): ?>
                                <div>
                                    <input type="<?= $prop['MULTIPLE'] == 'Y' ? 'checkbox' : 'radio' ?>"
                                           class="form-check-input"
                                           name="PROPS[<?= $prop['CODE'] ?>]<?= $prop['MULTIPLE'] == 'Y' ? '[]' : '' ?>"
                                        <?= !empty($arResult['ITEM']['PROPS'][$prop['CODE']]) && in_array($value['UF_XML_ID'] ?: $value['VALUE'], $arResult['ITEM']['PROPS'][$prop['CODE']], true) ? 'checked' : '' ?>
                                           id="PROPS_<?= $prop['CODE'] . '_' . $value['ID'] ?>"
                                           value="<?= $value['UF_XML_ID'] ?: $value['ID'] ?>"
                                    >
                                    <label class="form-check-label"
                                           for="PROPS_<?= $prop['CODE'] . '_' . $value['ID'] ?>"><?= $value['UF_NAME'] ?: $value['VALUE'] ?></label>
                                </div>
                            <? endforeach; ?>
                        </div>
                    <? elseif ($prop['PROPERTY_TYPE'] == 'S'): ?>
                        <div class="input-group">

                            <?
                            $type='text';

                            if ($prop['CODE']=='PHONE'){
                                $type='tel';
                            }
                            if ($prop['CODE']=='TIME_1'||$prop['CODE']=='TIME_2'){
                                $type='time';
                            }

                            ?>

                            <input type="<?=$type;?>"
                                   name="PROPS[<?= $prop['CODE'] ?>]<?= $prop['MULTIPLE'] == 'Y' ? '[]' : '' ?>"
                                   maxlength="255"
                                   value="<?= !empty($arResult['ITEM']['PROPS'][$prop['CODE']]) ? ($prop['MULTIPLE'] == 'Y' ? current($arResult['ITEM']['PROPS'][$prop['CODE']]) : $arResult['ITEM']['PROPS'][$prop['CODE']]) : '' ?>"
                                   id="PROPS_<?= $prop['CODE'] ?>"
                                   class="form-control" placeholder="">
                            <? if ($prop['MULTIPLE'] == 'Y'): ?>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary js-add-field" type="button">+</button>
                                </div>
                            <? endif; ?>
                        </div>
                        <? if ($prop['MULTIPLE'] == 'Y' && !empty($arResult['ITEM']['PROPS'][$prop['CODE']]) && count($arResult['ITEM']['PROPS'][$prop['CODE']]) > 1): ?>
                            <? unset($arResult['ITEM']['PROPS'][$prop['CODE']][0]); ?>
                            <? foreach ($arResult['ITEM']['PROPS'][$prop['CODE']] as $value): ?>
                                <div class="input-group">
                                    <input type="text"
                                           name="PROPS[<?= $prop['CODE'] ?>]<?= $prop['MULTIPLE'] == 'Y' ? '[]' : '' ?>"
                                           maxlength="255"
                                           value="<?= $value ?>"
                                           id="PROPS_<?= $prop['CODE'] ?>"
                                           class="form-control" placeholder="">
                                    <? if ($prop['MULTIPLE'] == 'Y'): ?>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary js-remove-field" type="button">-
                                            </button>
                                        </div>
                                    <? endif; ?>
                                </div>
                            <? endforeach; ?>
                        <? endif; ?>
                    <? endif; ?>
                </div>
            <? endforeach; ?>
</div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile-three" role="tabpanel" aria-labelledby="profile-tab-three">
        <div class="form-group">

            <style>
                .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
                .toggle.ios .toggle-handle { border-radius: 20rem; }
            </style>

            <? foreach ($arResult['SECTIONS'] as $section): ?>


                <br>
                <input data-toggle="toggle" data-style="ios" data-size="sm" value="<?= $section['ID'] ?>"
                       type="checkbox" name="FIELDS[IBLOCK_SECTION][]"
                    <?= is_array($arResult['ITEM']['IBLOCK_SECTION']) && in_array($section['ID'], $arResult['ITEM']['IBLOCK_SECTION'], true)  ? 'checked' : '' ?>>

                <label><?= $section['NAME'] ?></label>
                <br>
            <? endforeach;?>

        </div>
    </div>
    <div class="tab-pane fade" id="contact-three" role="tabpanel"
         aria-labelledby="contact-tab-three">
        <div class="form-group">
            <label>Краткое описание</label>
            <textarea name="FIELDS[PREVIEW_TEXT]" maxlength="500" id="FIELDS_PREVIEW_TEXT" class="form-control"><?= !empty($arResult['ITEM']['PREVIEW_TEXT']) ? $arResult['ITEM']['~PREVIEW_TEXT'] : '' ?></textarea>
        </div>
        <div class="form-group">
            <label>Подробное описание</label>
            <textarea name="FIELDS[DETAIL_TEXT]" rows="10" id="FIELDS_DETAIL_TEXT" class="form-control"><?= !empty($arResult['ITEM']['DETAIL_TEXT']) ? $arResult['ITEM']['~DETAIL_TEXT'] : '' ?></textarea>
        </div>
    </div>
</div>



    <div class="form-group form-group_submit">
        <button type="submit" class="btn btn-primary rounded">Сохранить</button>
    </div>
    <div id="rest_success" class="alert alert-success align-items-center" role="alert" >
        <div>
            Данные о ресторане успешно сохранены!
        </div>
    </div>
</form>