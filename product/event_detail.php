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
    "year" => "",
    "month" => "",
    "day" => "",
    "venue" => "",
    "address" => "",
    "start_hour" => "",
    "start_min" => "",
    "finish_hour" => "",
    "finish_min" => "",
    "venue_picture" => "",
    "user_id" => "",
    "regist_date" => "",
];
$errArr = [];
foreach ($dataArr as $key => $value){
    $errArr[$key] = "";
}
$errImageMsg = [];
$errMsg = [];
$errCompMsg = "";
$user_id = $_GET["id"];
list($yearArr, $monthArr, $dayArr) = initMaster::getDate();
list($hourArr, $minArr) = initMaster::getTime();
require_once("./view/event_detail.html.php");
?>
