<?php
namespace product;
require_once "../vendor/autoload.php";
date_default_timezone_set("Asia/Tokyo");

class Bootstrap{
    const DB_HOST = "localhost";
    const DB_NAME = "member_db";
    const DB_USER = "member_user";
    const DB_PASS = "member_pass";
    const DB_TYPE = "mysql";
    public $oreder;
    const APP_DIR = "c:/xampp/htdocs/DT/";
    // const TEMPLATE_DIR = self::APP_DIR. "templates/member/";
    const CACHE_DIR = false;
    const APP_URL = "http://localhost/DT/";
    const ENTRY_URL = self::APP_URL. "product/";

    public static function loadClass($class){
        $path = str_replace("\\", "/", self::APP_DIR. $class. ".class.php");
        require_once $path;
    }
}

spl_autoload_register([
    "product\Bootstrap",
    "loadClass"
]);

?>