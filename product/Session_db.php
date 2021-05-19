<?php
namespace product\lib;

class DBSession{
    const DB_HOST = "localhost";
    const DB_NAME = "session_db";
    const DB_USER = "session_user";
    const DB_PASS = "session_pass";
    const DB_TYPE = "mysql";
    public $oreder;
    const APP_DIR = "c:/xampp/htdocs/DT/";
    // const TEMPLATE_DIR = self::APP_DIR. "templates/member/";
    const CACHE_DIR = false;
    const APP_URL = "http://localhost/DT/";
    const ENTRY_URL = self::APP_URL. "product/";

}

?>