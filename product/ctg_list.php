<?php
namespace product;
require_once dirname(__FILE__). "/Bootstrap.class.php";
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\Session;
use product\lib\Item;

$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$ses = new Session($db);
$itm = new Item($db);

$user_id = $_GET["user_id"];
$event_id = $_GET["event_id"];
$ctg_id = $_GET["ctg_id"];
$cateArr = $itm->getCategoryList();
$dataArr = $itm->getItemList($ctg_id);
require_once("./view/inst_list_html.php");
?>