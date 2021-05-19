<?php
namespace product;
require_once dirname(__FILE__)."/Bootstrap.class.php";
use product\lib\PDODatabase;
use product\lib\Mail;

$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$mail = new Mail();

$dataArr = (isset($_POST["event_data"]))? $_POST["event_data"]: "";
$imageArr = (isset($_POST["image_data"]))? $_POST["image_data"]: "";
$user_id = $dataArr["user_id"];
// var_dump($imageArr);
$table="event";
$res_event = $db->insert($table, $dataArr);//イベント情報をDBに挿入
// $res_image = $comp->insertEventImage($imageArr, $db);
if ($res_event !== false){
    $event_id = $db->getLastId();//イベントIDを取得する
    $data = $mail->getMailInfo($user_id, $db);//氏名とメールアドレスの取得
    if (!empty($data[0]["family_name"])){
        $mail->sendMail($dataArr, $data, $user_id, $db);//自動メールを依頼者と管理者に送信する
        header("Location: http://localhost/DT/product/request.php?id=$user_id&event_id=$event_id");
        exit();
    }else {
        $errMsg = "個人情報登録がされていません。お手数ですが、個人情報の登録をお願いいたします。";
        require_once("./new_host.php");//個人情報登録ページに遷移
        exit();
    }
}

?>