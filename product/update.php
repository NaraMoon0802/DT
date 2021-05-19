<?php
namespace product;
require_once dirname(__FILE__)."/Bootstrap.class.php";
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\initMaster;
use product\lib\ListUp;
$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$list = new ListUp($db);

$user_id = $_GET["user_id"];
$event_id = $_GET["event_id"];

$event_data = $list->listEvent($user_id, $event_id);
$inst_data = $list->listInst($user_id, $event_id);
$listData = array_merge($event_data[0], $inst_data[0]);
// var_dump($listData);
list($yearArr, $monthArr, $dayArr) = initMaster::getDate();
list($hourArr, $minArr) = initMaster::getTime();

require_once("./view/update_html.php");
?>