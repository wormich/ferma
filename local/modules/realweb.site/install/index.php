<?

//namespace Realweb;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class Realweb_site extends CModule
{


    public static $__MODULE_ID = 'realweb.site';
    var $MODULE_ID = 'realweb.site';
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
        $this->MODULE_NAME = 'Модуль Site';
        $this->MODULE_DESCRIPTION = 'Модуль Site';
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

        if (is_dir($p = $_SERVER['DOCUMENT_ROOT'] . $this->bxRoot . '/modules/' . $this->MODULE_ID . '/admin')) {
            if ($dir = opendir($p)) {
                while (false !== $item = readdir($dir)) {
                    if ($item == '..' || $item == '.' || $item == 'menu.php')
                        continue;

                    file_put_contents($file = $_SERVER['DOCUMENT_ROOT'] . BX_ROOT . '/admin/' . $item,
                        '<' . '? require($_SERVER["DOCUMENT_ROOT"]."' . $this->bxRoot . '/modules/' . $this->MODULE_ID . '/admin/' . $item . '");?' . '>');
                }
                closedir($dir);
            }
        }


        return true;
    }

    public function UnInstallFiles()
    {


        if (is_dir($p = $_SERVER['DOCUMENT_ROOT'] . $this->bxRoot . '/modules/' . $this->MODULE_ID . '/admin')) {
            if ($dir = opendir($p)) {
                while (false !== $item = readdir($dir)) {
                    if ($item == '..' || $item == '.')
                        continue;
                    unlink($_SERVER['DOCUMENT_ROOT'] . BX_ROOT . '/admin/' . $item);
                }
                closedir($dir);
            }
        }


        return true;
    }

    function InstallEvents()
    {
        return true;
    }

    function UnInstallEvents()
    {
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
