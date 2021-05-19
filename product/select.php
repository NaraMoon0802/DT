<?php
namespace product;
require_once dirname(__FILE__). "/Bootstrap.class.php";
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\Session;
use product\lib\getItemData;

$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$ses = new Session($db);
$item = new getItemData($db);

$ses->checkSession();
$user_id = (isset($_POST["user_id"]))?$_POST["user_id"]: $_GET["user_id"];
$event_id = (isset($_POST["event_id"]))?$_POST["event_id"]: $_GET["event_id"];
$item_id = (isset($_POST["item_id"]) === true && preg_match("/^\d+$/",
$_POST["item_id"]) === 1)?$_POST["item_id"]: "";
$number = (isset($_POST["number"]) === true && preg_match("/^\d+$/", 
$_POST["number"]) ===1)?$_POST["number"]:"";

$list = (isset($_GET["select"]))?$_GET["select"]:"";

$cancel = (isset($_POST["cancel"]))? $_POST["cancel"]: "";
$decide = (isset($_POST["decide"]))? $_POST["decide"]: "";
$edit = (isset($_POST["edit"]))? $_POST["edit"]: "";

$errMsg = "";


if ($item_id !== ""){
    //選択した中に同じ楽器があるかを確認する
    $table= "sele";
    $column= "number";
    $where = "item_id=$item_id AND delete_flg=0";
    $data = $db->select($table, $column, $where);
    // var_dump($data);
    if ($data!== []){
        // var_dump($data);
        //楽器の数を加算する
        $sum_num = intval($number)+intval($data[0]["number"]);
        $insData = [
            "number" => $sum_num
        ];
        $db->update($table, $insData, $where);
    }
    else {
        $insData = [
            "user_id" => $user_id,
            "item_id" => $item_id,
            "number" => $number
        ];
        $res = $db->insert($table, $insData);
    }
    
    $dataArr = $item->getSelectData($user_id); //選択した楽器の種類と数のデータを全て配列で受け取る
    $sum = $item->getItemAndSum($user_id);
    require_once ("./view/select_html.php");

   

}
if ($list !== ""){
    $dataArr = $item->getSelectData($user_id);
    $sum = $item->getItemAndSum($user_id);
    require_once ("./view/select_html.php");

}
if (isset($_GET["select_id"])){
    $select_id = $_GET["select_id"];
    $res = $item->delSelectData($select_id);
    $dataArr = $item->getSelectData($user_id);
    $sum = $item->getItemAndSum($user_id);
    require_once("./view/select_html.php");
}

if($cancel !== ""){
    $table = "sele";
    $db->delete_all($table);
    $num = 1;
    $db->reAutoIncre($table, $num);
    $dataArr = $item->getSelectData($user_id);
    $sum = $item->getItemAndSum($user_id);
    require_once("./view/select_html.php");
    
}

if($decide !== ""){
    $event_id = (isset($_POST["event_id"]))?intval($_POST["event_id"]): "";
    if ($event_id === ""){
        $errMsg = "イベントIDがありません";
        require_once("./view/select_html.php");
        exit();
    }else {
        
        $dataArr = $item->getSelectData($user_id);
        // var_dump($dataArr);
        $table = "inst";
        $insData = [
            "user_id" => $user_id,
            "event_id" => $event_id
        ];
        $res = $db->insert($table, $insData);
        foreach ($dataArr as $key => $val){
            $insData = [
                $dataArr[$key]["item_name"] => $dataArr[$key]["number"]
            ];
            $where = "user_id = $user_id AND event_id = $event_id";
            $res = $db->update($table, $insData, $where);
        }
        if ($res !== false){
            $table = "sele";
            $db->delete_all($table);//選択内容を消去しておく
            header("Location: list.php?user_id=".$user_id."&event_id=".$event_id);
        }else {
            $errMsg = "登録できませんでした";
            require_once("./view/select_html.php");
        }
    }
}






?>