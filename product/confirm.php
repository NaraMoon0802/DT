<?php
namespace product;
require_once dirname(__FILE__)."/Bootstrap.class.php";
use product\lib\initMaster;
use product\lib\PDODatabase;
use product\lib\Common;

$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$common = new Common();

if (isset($_POST["confirm"])){
        unset($_POST["confirm"]);
        $dataArr = $_POST;
        if (isset($_POST["sex"]) === false){
            $dataArr["sex"] = ""; 
        }

        $errArr = $common->errorCheck($dataArr);
        $err_check = $common->getErrorFlg();//エラーメッセージがあるかの確認
        if ($err_check !== true){
            $errMsg = [];
            foreach ($errArr as $value){
            $errMsg[] = $value;
            }
            require_once("./view/new_host.html.php");
            exit();
        }else {
            $dataArr["regist_date"] = date("Y-m-d H:i:s");
            require_once("./view/confirm_html.php");
            exit();
        }
}

?>