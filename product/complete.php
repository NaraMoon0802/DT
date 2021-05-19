<?php
namespace product;
require_once dirname(__FILE__)."/Bootstrap.class.php";
use product\lib\PDODatabase;

$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$comp = new Complete();

$dataArr = (isset($_POST["person_data"]))? $_POST["person_data"]: "";
$user_id = $dataArr["user_id"];
$table = "member";
$res = $db->insert($table, $dataArr);//個人情報をDBに挿入する
if ($res !== false){
    header("Location: http://localhost/DT/product/index.php");
}

?>