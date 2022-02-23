<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();



?>
<?if($arResult["FORM_TYPE"] == "logout"){

    header("Location: /personal/");
exit( );

}?>
<section class="container-fluid bg-circle-login" id="auth-sign">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 col-xl-4">
            <div class="card-body">
                <a href="/">
                    <img src="/local/templates/main/assets/images/favicon.png" class="img-fluid logo-img" alt="img4">
                </a>
                <h2 class="mb-2 text-center"><?=GetMessage("AUTH_LOGIN")?></h2>
                <p class="text-center">Sign in to stay connected.</p>
                <?
                if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
                    ShowMessage($arResult['ERROR_MESSAGE']);
                ?>
                <form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
                    <?foreach ($arResult["POST"] as $key => $value):?>
                        <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                    <?endforeach?>
                    <input type="hidden" name="AUTH_FORM" value="Y" />
                    <input type="hidden" name="TYPE" value="AUTH" />
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="USER_LOGIN" maxlength="50" value="" size="17">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="password" class="form-label"><?=GetMessage("AUTH_PASSWORD")?></label>
                                <input type="password" class="form-control form-control-sm" id="password" name="USER_PASSWORD" maxlength="255" size="17" autocomplete="off">
                            </div>
                        </div>




                        <div class="col-lg-12 d-flex justify-content-between">
                            <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y">
                                <label class="form-check-label" for="customCheck1" title="<?=GetMessage("AUTH_REMEMBER_ME")?>"><?echo GetMessage("AUTH_REMEMBER_SHORT")?></label>
                            </div>
                            <?endif?>
                            <a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"><?=GetMessage("AUTH_LOGIN_BUTTON")?></button>
                    </div>

                    <p class="mt-3 text-center">
                        <a href="<?=$arResult["AUTH_REGISTER_URL"]?>" class="text-underline"><?=GetMessage("AUTH_REGISTER")?></a>
                    </p>
                </form>
            </div>
        </div>
        <div class="col-md-12 col-lg-5 col-xl-8 d-lg-block d-none vh-100 overflow-hidden">
            <img src="/local/templates/main/assets/images/auth/09.png" class="img-fluid sign-in-img" alt="images">

        </div>
    </div>
</section>
