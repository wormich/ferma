<?
if ($USER->IsAuthorized()) {
    ?>

    <? $uname = \Bitrix\Main\Engine\CurrentUser::get()->getFormattedName(); ?>


    <div class="nav-item dropdown">
        <a class="py-0 d-flex align-items-center " href="#" id="navbarDropdown" role="button"
           data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="ava_link">
                            <img src="/local/templates/main/assets/images/empty_user.svg" alt="User-Profile">
</span>
            <img src="/local/templates/main/assets/images/dots.svg" alt="<?= $uname; ?>" title="<?= $uname; ?>">
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/personal/">Личный кабинет</a></li>
            <li><a class="dropdown-item" href="/personal/history/">История заказов</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item"
                   href="<? echo $APPLICATION->GetCurPageParam("logout=yes&" . bitrix_sessid_get(), [
                           "login",
                           "logout",
                           "register",
                           "forgot_password",
                           "change_password"]
                   ); ?>">Выход</a></li>
        </ul>
    </div>


<? } else {
    ?>
    <button type="button" class="btn btn-block btn-light rounded-pill auth_button"
            data-bs-toggle="modal" data-bs-target=".bd-auth">Войти
    </button>
<? } ?>
