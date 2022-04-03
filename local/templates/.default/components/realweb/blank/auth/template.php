<li class="nav-item dropdown">
    <?
    if ($USER->IsAuthorized()){
    ?>
    <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="/local/templates/main/assets/images/avatars/01.png" alt="User-Profile" class="img-fluid avatar avatar-50 avatar-rounded">
        <div class="caption ms-3 d-none d-md-block ">
            <?$uname=\Bitrix\Main\Engine\CurrentUser::get()->getFormattedName();?>
            <h6 class="mb-0 caption-title"><?=$uname;?></h6>
            <p class="mb-0 caption-sub-title"></p>
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="/personal/">Личный кабинет</a></li>

        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="<?echo $APPLICATION->GetCurPageParam("logout=yes&".bitrix_sessid_get(), [
                    "login",
                    "logout",
                    "register",
                    "forgot_password",
                    "change_password"]
            );?>">Выйти</a></li>
    </ul>
    <?}else{?>

    <a href="/personal/auth/">Войти</a>
    <?}?>
</li>