<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();



?>


<form class="mt-3" name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
      action="<?= $arResult["AUTH_URL"] ?>">
    <?
    if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
        ShowMessage($arResult['ERROR_MESSAGE']);
    ?>
    <? if ($arResult["BACKURL"] <> ''): ?>
        <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
    <? endif ?>
    <? foreach ($arResult["POST"] as $key => $value): ?>
        <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
    <? endforeach ?>
    <input type="hidden" name="AUTH_FORM" value="Y"/>
    <input type="hidden" name="TYPE" value="AUTH"/>
    <div class="form-label-group">
        <input type="text" id="email" name="USER_LOGIN" class="form-control" placeholder="Введите ваш e-mail">
        <label for="tt2">Почта</label>
    </div>
    <div class="form-label-group">
        <input type="password" id="password" name="USER_PASSWORD" class="form-control"
               placeholder="Введите ваш e-mail"/>
        <label for="tt2">Пароль</label>
    </div>
    <button type="submit" class="btn btn-primary rounded-pill btn-login">Войти на сайт</button>
</form>




