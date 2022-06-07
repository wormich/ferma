<?php

namespace Realweb\Site\Geo;

use Bitrix\Main\Application;
use Bitrix\Main\Context;
use Bitrix\Main\IO;
use Realweb\Site\Site;

class Base {

    protected $databaseDir = '/upload/geobase/';
    protected $databaseFileName = 'SxGeoCity.dat';

    public function __construct() {

        $obDataBaseDir = new IO\Directory(Application::getDocumentRoot() . $this->databaseDir);
        if ($obDataBaseDir->isExists()) {
            $obDataBaseDir->create();
        }
    }

    public function updateBase() {
        $url = 'https://sypexgeo.net/files/SxGeoCity_utf8.zip';

        $targetFilePath = Application::getDocumentRoot() . $this->databaseDir . '/SxGeoCity_utf8.zip';
        $obHttpClient = new \Bitrix\Main\Web\HttpClient();
        $obHttpClient->download($url, $targetFilePath);

        $result = $this->_unZip($targetFilePath);

        IO\File::deleteFile($targetFilePath);
    }

    public function getCity() {
        $strEncoding = '';
        if (ini_get('mbstring.func_overload') == 2 && strtolower(ini_get('mbstring.internal_encoding')) == 'utf-8') {
            mb_internal_encoding('latin1');
            $strEncoding = 'utf-8';
        }
        if (!file_exists(Application::getDocumentRoot() . $this->databaseDir . $this->databaseFileName)) {
            $this->updateBase();
        }
        $SxGeo = new SxGeo(Application::getDocumentRoot() . $this->databaseDir . $this->databaseFileName);
        if (Site::isLocal()) {
            $ip = '94.19.205.123';
        } else {
            $ipPart = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = $ipPart[0];
            //$ip = Context::getCurrent()->getRequest()->getRemoteAddress();
        }

        $arCity = $SxGeo->getCityFull($ip); // Вся информация о городе
        if ($strEncoding) {
            mb_internal_encoding($strEncoding);
        }

        return $arCity;
    }

    private function _unZip($file_name, $last_zip_entry = '', $start_time = 0, $interval = 0) {
        global $APPLICATION;

        //Function and securioty checks
        if (!function_exists('zip_open'))
            return false;
        $dir_name = substr($file_name, 0, strrpos($file_name, "/") + 1);
        if (strlen($dir_name) <= strlen(Application::getDocumentRoot()))
            return false;

        $hZip = zip_open($file_name);
        if (!is_resource($hZip))
            return false;
        //Skip from last step
        if ($last_zip_entry) {
            while ($entry = zip_read($hZip))
                if (zip_entry_name($entry) == $last_zip_entry)
                    break;
        }

        $io = \CBXVirtualIo::GetInstance();
        //Continue unzip
        while ($entry = zip_read($hZip)) {
            $entry_name = zip_entry_name($entry);
            //Check for directory
            zip_entry_open($hZip, $entry);
            if (zip_entry_filesize($entry)) {

                $file_name = trim(str_replace("\\", "/", trim($entry_name)), "/");
                $file_name = $APPLICATION->ConvertCharset($file_name, "cp866", LANG_CHARSET);
                $file_name = preg_replace("#^import_files/tmp/webdata/\\d+/\\d+/import_files/#", "import_files/", $file_name);

                $bBadFile = HasScriptExtension($file_name) || IsFileUnsafe($file_name) || !$io->ValidatePathString("/" . $file_name)
                ;

                if (!$bBadFile) {
                    $file_name = $io->GetPhysicalName($dir_name . Rel2Abs("/", $file_name));
                    CheckDirPath($file_name);
                    $fout = fopen($file_name, "wb");
                    if (!$fout)
                        return false;
                    while ($data = zip_entry_read($entry, 102400)) {
                        $data_len = function_exists('mb_strlen') ? mb_strlen($data, 'latin1') : strlen($data);
                        $result = fwrite($fout, $data);
                        if ($result !== $data_len)
                            return false;
                    }
                }
            }
            zip_entry_close($entry);

            //Jump to next step
            if ($interval > 0 && (time() - $start_time) > ($interval)) {
                zip_close($hZip);
                return $entry_name;
            }
        }
        zip_close($hZip);
        return true;
    }

}
