<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 * @global CUser $USER
 * @global CMain $APPLICATION
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if ($arResult["SHOW_SMS_FIELD"] == true) {
    CJSCore::Init('phone_auth');
}
?>

<section class="container-fluid bg-circle-login">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 col-xl-4">
            <div class="d-flex justify-content-center mb-0">
                <div class="card-body mt-5">
                    <a href="/">
                        <img src="/local/templates/main/assets/images/logo.svg" class="img-fluid logo-img" alt="img5">
                    </a>
                    <h2 class="mb-2 text-center"><?= GetMessage("AUTH_REGISTER") ?></h2>
                    <p class="text-center">Create your Aprycot account.</p>
                    <? if ($USER->IsAuthorized()): ?>

                        <p><? echo GetMessage("MAIN_REGISTER_AUTH") ?></p>

                    <? else: ?>
                        <?
                        if (count($arResult["ERRORS"]) > 0):
                            foreach ($arResult["ERRORS"] as $key => $error)
                                if (intval($key) == 0 && $key !== 0)
                                    $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;" . GetMessage("REGISTER_FIELD_" . $key) . "&quot;", $error);

                            ShowError(implode("<br />", $arResult["ERRORS"]));

                        elseif ($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
                            ?>
                            <p><? echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT") ?></p>
                        <? endif ?>

                        <form method="post" action="/personal/register/" name="regform">
                            <?
                            if($arResult["BACKURL"] <> ''):
                                ?>
                                <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                            <?
                            endif;
                            ?>
                            <input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
                            <div class="row">
                                <?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
                                    <?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="full-name"><?=$arUserField["EDIT_FORM_LABEL"]?>:<?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?></label>

                                        <input size="30" class="form-control form-control-sm" type="text"
                                               name="UF_RESTNAME"
                                               value="<?= $arResult["VALUES"]['UF_RESTNAME'] ?>"/>




                                    </div>
                                </div>
                                    <?endforeach;?>
                                <?endif;?>
                                <? foreach ($arResult["SHOW_FIELDS"] as $FIELD): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="full-name"
                                                   class="form-label"><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>
                                                :<? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?><span
                                                        class="starrequired">*</span><? endif ?></label>

                                            <? switch ($FIELD) { ?>
<? case "PASSWORD": ?>
                                                    <input size="30" type="password" name="REGISTER[<?= $FIELD ?>]"
                                                           value="<?= $arResult["VALUES"][$FIELD] ?>" autocomplete="off"
                                                           class="form-control form-control-sm bx-auth-input"/>

                                            <?if($arResult["SECURE_AUTH"]):?>
                                                <span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
                                                <noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
                                                </noscript>
                                                <script type="text/javascript">
                                                    document.getElementById('bx_auth_secure').style.display = 'inline-block';
                                                </script>
                                            <?endif?>
                                                    <? break; ?>
                                                <? case "CONFIRM_PASSWORD": ?>

                                                    <input size="30" type="password" name="REGISTER[<?= $FIELD ?>]"
                                                           value="<?= $arResult["VALUES"][$FIELD] ?>"
                                                           class="form-control form-control-sm" autocomplete="off"/>
                                                    <? break; ?>
                                                <?default;?>
                                                    <input size="30" class="form-control form-control-sm" type="text"
                                                           name="REGISTER[<?= $FIELD ?>]"
                                                           value="<?= $arResult["VALUES"][$FIELD] ?>"/>
                                                    <? break; ?>
                                                <? } ?>

                                        </div>
                                    </div>


                                <? endforeach ?>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit"
                                        class="btn btn-primary"><?= GetMessage("AUTH_REGISTER") ?></button>
                            </div>

                            <p class="mt-3 text-center">
                                Уже есть аккаунт <a href="/personal/login/" class="text-underline">Войти</a>
                            </p>

                        </form>

                    <? endif ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-5 col-xl-8 d-lg-block d-none vh-100 overflow-hidden">
            <img src="/local/templates/main/assets/images/auth/09.png" class="img-fluid sign-in-img" alt="images">
        </div>
    </div>
</section>
