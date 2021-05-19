<?php
namespace product;
require_once dirname(__FILE__)."/Bootstrap.class.php";
use product\lib\initMaster;
use product\lib\PDODatabase;
use product\lib\Common;
use product\lib\Complete;
use product\lib\Image;

$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$common = new Common();

if (isset($_POST["confirm"])){
        unset($_POST["confirm"]);
        $dataArr = $_POST;
        $user_id = $_POST["user_id"];
        $errArr = $common->errorCheckEvent($dataArr);
        $err_check = $common->getErrorFlg();//エラーメッセージがあるかの確認
    $imageData = ($_FILES["upfile"]["name"]!== "")?$_FILES: "";
    if ($imageData !== ""){
        $img_name = $imageData["upfile"]["name"];
        $tmp_name = $imageData["upfile"]["tmp_name"];
        move_uploaded_file($tmp_name, "./images/upload/".$img_name);
        $url = "http://localhost/DT/product/images/upload/".$img_name;
        // var_dump($imageData);
        
        list($fname, $extension, $raw_data, $errImage) = $common->errorCheckImage($imageData);
        $imageArr = [
            "fname" => $fname,
            "extension" => $extension,
            "raw_data" => $raw_data,
            "user_id" => $dataArr["user_id"]
        ];
        $errImage_check = $common->getErrorImageFlg();
    }else {
        $errImage_check = false;
        $errImage = ["ファイルが選択されていません"];
    }

        $errMsg = []; $errImageMsg = [];
        if ($err_check !== true || $errImage_check !== true){
            if ($err_check !== true){
                foreach ($errArr as $value){
                $errMsg[] = $value;
                }
            }
            if ($errImage_check !== true){
                foreach ($errImage as $value){
                $errImageMsg[] = $value;
                }
            }
            list($yearArr, $monthArr, $dayArr) = initMaster::getDate();
            list($hourArr, $minArr) = initMaster::getTime();
            // var_dump($errMsg);
            require_once("./view/event_detail.html.php");
            exit();
        }else {
            $dataArr["regist_date"] = date("Y-m-d H:i:s");
            $imageArr["regist_date"] = date("Y-m-d H:i:s");
            require_once("./view/confirm_event_html.php");

        }
}

?>