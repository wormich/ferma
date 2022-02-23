<?

//namespace Realweb;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class Realweb_recaptcha extends CModule
{
    public static $__MODULE_ID = 'realweb.recaptcha';
    var $MODULE_ID = 'realweb.recaptcha';
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_SORT;
    var $MODULE_MODE_EXEC = 'local';
    // пути
    var $PATH;
    var $PATH_ADMIN;
    var $PATH_INSTALL;
    var $PATH_INSTALL_DB;
    // пути в CMS
    var $BXPATH;
    var $BXPATH_ADMIN;


    private $bxRoot = BX_ROOT;

    public function __construct()
    {
        // информация о модуле и разработчике
        $this->MODULE_NAME = 'Google reCaptcha v3';
        $this->MODULE_DESCRIPTION = 'reCAPTCHA v3 returns a score for each request without user friction';
        $this->PARTNER_NAME = 'Риалвеб';
        $this->PARTNER_URI = 'http://realweb.ru';


        $localPath = getLocalPath("");
        $this->bxRoot = strlen($localPath) > 0 ? rtrim($localPath, "/\\") : BX_ROOT;


        // версия
        $arModuleVersion = array(
            'VERSION' => '',
            'VERSION_DATE' => ''
        );
        include('version.php');
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

        // пути
        global $DBType;
        $this->PATH = $_SERVER['DOCUMENT_ROOT'] . "/$this->MODULE_MODE_EXEC/modules/$this->MODULE_ID";
        $this->PATH_ADMIN = "$this->PATH/admin";
        $this->PATH_INSTALL = "$this->PATH/install";
        $this->PATH_INSTALL_DB = "$this->PATH_INSTALL/db/$DBType";

        // пути в CMS битрикс
        $this->BXPATH = $_SERVER['DOCUMENT_ROOT'] . "/$this->MODULE_MODE_EXEC";
        $this->BXPATH_ADMIN = $_SERVER['DOCUMENT_ROOT'] . "/bitrix/admin";
    }

    public function InstallDB()
    {
        return true;
    }

    public function UnInstallDB()
    {
        return true;
    }

    public function InstallFiles()
    {

        CopyDirFiles(
            \Bitrix\Main\Application::getDocumentRoot() . $this->bxRoot . "/modules/" . $this->MODULE_ID . "/install/js/", \Bitrix\Main\Application::getDocumentRoot() . BX_ROOT . "/js", true, true
        );


        return true;
    }

    public function UnInstallFiles()
    {

        DeleteDirFilesEx(BX_ROOT . "/js/" . $this->MODULE_ID . "/");

        return true;
    }

    function InstallEvents()
    {
        RegisterModuleDependences("main", "OnPageStart", "realweb.recaptcha", "Realweb\Recaptcha\Captcha", "OnPageStart");
        RegisterModuleDependences("main", "OnEndBufferContent", "realweb.recaptcha", "Realweb\Recaptcha\Captcha", "OnEndBufferContent");
        return true;
    }

    function UnInstallEvents()
    {
        UnRegisterModuleDependences("main", "OnPageStart", "realweb.recaptcha", "Realweb\Recaptcha\Captcha", "OnPageStart");
        UnRegisterModuleDependences("main", "OnEndBufferContent", "realweb.recaptcha", "Realweb\Recaptcha\Captcha", "OnEndBufferContent");
        return true;
    }

    public function DoInstall()
    {
        $this->InstallDB();
        $this->InstallFiles();
        $this->InstallEvents();

        \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);

    }

    public function DoUninstall()
    {
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        $this->UnInstallDB();


        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
    }

}
