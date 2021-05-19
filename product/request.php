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

$cateArr = $itm->getCategoryList();
$allArr = $itm->getAllItem();
// $user_id = 1;
// $event_id = 1;
$user_id = (isset($_GET["id"]))?$_GET["id"]: $_GET["user_id"];
$event_id = (isset($_GET["event_id"]))?$_GET["event_id"]: "";

require_once("./view/inst_list_html.php");
?>