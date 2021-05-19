<?php
namespace product;
require_once("./Bootstrap.class.php");
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\Session;
use product\lib\initMaster;

$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$ses = new Session($db);


$dataArr = [
    "user_id" => "",
    "family_name" => "",
    "first_name" => "",
    "family_name_kana" => "",
    "first_name_kana" => "",
    "day" => "",
    "zip1" => "",
    "zip2" => "",
    "address" => "",
    "email" => "",
    "tel1" => "",
    "tel2" => "",
    "tel3" => "",
    "regist_date" => ""
];

$errArr = [];
foreach ($dataArr as $key => $value){
    $errArr[$key] = "";
}
$errMsg = [];
list($yearArr, $monthArr, $dayArr) = initMaster::getDate();
//list() =   ：右辺の配列の要素を左辺の変数に代入することができる
//array()との違いは？静的クラスとは？

$sexArr = initMaster::getSex();
$dataArr["user_id"] = $_GET["id"];

require_once("./view/new_host.html.php");
?>
