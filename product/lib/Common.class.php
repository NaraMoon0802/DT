<?php
namespace product\lib;
class Common{
    private $dataArr = [];
    private $errArr = [];
    private $errImage = [];

    public function __construct(){

    }
    public function errorCheck($dataArr=[]){
        $this->dataArr = $dataArr;

        $this->createErrorMessage();
        $this->familyNameCheck();
        $this->firstNameCheck();
        $this->sexCheck();
        $this->zipCheck();
        $this->addCheck();
        $this->telCheck();
        $this->mailCheck();
        return $this->errArr;
    }

    public function errorCheckEvent($dataArr){
        $this->dataArr = $dataArr;
        $this->createErrorMessage();
        $this->dateCheck();
        $this->addCheck();
        $this->timeCheck();
        return $this->errArr;
    }

    public function errorCheckImage($imageData){
        return $this->fileCheck($imageData);
    }
    private function createErrorMessage(){
        foreach($this->dataArr as $key => $val){
            $this->errArr[$key] = "";
        }
    }
    private function familyNameCheck(){
        if ($this->dataArr["family_name"] === ""){
            $this->errArr["family_name"] = "お名前（氏）を入力してください";
        }
    }
    private function firstNameCheck(){
        if ($this->dataArr["first_name"] === ""){
            $this->errArr["first_name"] = "お名前（名）を入力してください";
        }
    }
    private function sexCheck(){
        if ($this->dataArr["sex"] === ""){
            $this->errArr["sex"] = "性別を選択してください";
        }
    }
    
    private function zipCheck(){
        if (preg_match("/^[0-9]{3}$/", $this->dataArr["zip1"]) === 0){
            $this->errArr["zip1"] = "郵便番号の上は半角数字3桁で入力してください";
        }
        if (preg_match("/^[0-9]{4}$/", $this->dataArr["zip2"]) === 0){
            $this->errArr["zip2"] = "郵便番号の下は半角数字4桁で入力してください";
        }
    }

    private function addCheck(){
        if ($this->dataArr["address"] === ""){
            $this->errArr["address"] === "住所を入力してください";
        }
    }

    private function mailCheck(){
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+[a-zA-Z0-9\._-]+$/", $this->dataArr["email"]) === 0){
            $this->errArr["email"] = "メールアドレスを正しい形式で入力してください";
        }
    }
    private function telCheck(){
        if (preg_match("/^\d{1,6}$/", $this->dataArr["tel1"]) === 0 || 
        preg_match("/^\d{1,6}$/", $this->dataArr["tel2"]) === 0 ||
        preg_match("/^\d{1,6}$/", $this->dataArr["tel3"]) === 0 ||
        strlen($this->dataArr["tel1"]. $this->dataArr["tel2"]. $this->dataArr["tel3"]) >=12){
            $this->errArr["tel1"] = "電話番号は、半角数字で11桁以内で入力してください";
        }
    }

    private function dateCheck(){
        if ($this->dataArr["month"] === "00月"){
            $this->errArr["month"] = "イベント開催日の月を選択してください";
        }
        if ($this->dataArr["day"] === "00日"){
            $this->errArr["day"] = "イベント開催日の日を選択してください";
        }
        // if (checkdate($this->dataArr["month"], $this->dataArr["day"], $this->dataArr["year"]) === false){
            // $this->errArr["year"] = "正しい日付を選択してください";
        
    }

    private function timeCheck(){
        if ($this->dataArr["start_hour"] === "00時"){
            $this->errArr["start_hour"] = "開始時間（時）を選択してください";
        }
        
        if ($this->dataArr["finish_hour"] === "00時"){
            $this->errArr["finish_hour"] = "終了時間（時）を選択してください";
        }
        
        
    }

    private function fileCheck($imageData){
        if (isset($imageData['upfile']['error']) && is_int($imageData['upfile']['error']) && $_FILES["upfile"]["name"] !== ""){            
                if (is_uploaded_file($imageData["upfile"]["tmp_name"])===true){
                    // if ($_FILES["upfile"]["size"]>1048576){
                    //     $this->errImage["size"] = "アップロードできる画像のサイズは1MBまでです";
                    // }
                    $raw_data = file_get_contents($imageData["upfile"]["tmp_name"]);//画像データを文字列型にする
                    $img_info = getimagesize("./images/upload/".$imageData["upfile"]["name"]);
                    $mime = $img_info["mime"];

                    if($mime === "image/jpeg" ){
                        $extension = "jpeg";
                    }elseif($mime === "image/png"){
                        $extension = "png";
                    }elseif($mime === "image/gif"){
                        $extension = "gif";
                    }else{
                        $extension = "";
                        $this->errImage["extension"] = "非対応ファイルです";
                    }

                    $date = getdate();
                    $fname = $imageData["upfile"]["tmp_name"].$date["year"].$date["mon"].$date["mday"].$date["hours"].$date["minutes"].$date["seconds"];
                    $upData = [];
                    $upData[] = $fname; $upData[] =$extension; $upData[] =$raw_data; $upData[] =$this->errImage;
                    return $upData;
                }
        }
    }
        
    
    
    public function getErrorFlg(){
        $err_check = true;
        foreach ($this->errArr as $key => $value){
            if ($value !== ""){
                $err_check = false;
            }
        }
        return $err_check;
    }

    public function getErrorImageFlg(){
        $errImage_check = true;
        foreach ($this->errImage as $key=> $value){
            if ($value !== ""){
                $errImage_check = false;
            }
        }
        return $errImage_check;
    }
}
?>