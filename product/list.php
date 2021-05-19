<?php
namespace product;
require_once dirname(__FILE__)."/Bootstrap.class.php";
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\ListUp;
$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$list = new ListUp($db);
if (isset($_POST["progress"])){
    $insData = [
        "progress" => $_POST["progress"]
    ];
    $table = "event";
    $where = "id=".$_POST["id"];
    $res = $db->update($table, $insData, $where);
    $allData = $list->allWholeList();
    require_once("./view/admin_list_html.php");
    exit();
}elseif (isset($_GET["user"])){
        $allData = $list->allWholeList();
        require_once("./view/admin_list_html.php");
        exit();
}else {
    $user_id = $_GET["user_id"];
    $event_id = (isset($_GET["event_id"]))?$_GET["event_id"]: "";

    $allData = $list->allList($user_id);
    // var_dump($allData);
    require_once("./view/list_html.php");
}

?>
