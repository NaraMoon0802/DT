<?php
namespace product;
require_once dirname(__FILE__)."/Bootstrap.class.php";
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\ListUp;
$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$list = new ListUp($db);
$user_id = (isset($_GET["id"]))?$_GET["id"]: $_POST["user_id"];



$allData = $list->allCommentList();
// var_dump($allData);

if (isset($_POST["delete_id"])) {
    $delete_id = $_POST["delete_id"];
    $table = "comment";
    $where = "id=".$delete_id;
    $res = $db->delete($table, $where);
    header("Location: board.php?id=$user_id");
    exit();
}

// 受け取ったデータを書き込む
if (isset($_POST["comment"])) {
    $comment   = $_POST["comment"];
    $table = "comment";
    $insData = [
        "regist_date" => date("Y-m-d H:i:s"),
        "comment" => $comment,
        "user_id" => $user_id
    ];
    $res = $db->insert($table, $insData);
    header("Location: board.php?id=$user_id");
    exit();
} 


require_once("./view/board_html.php");

?>
