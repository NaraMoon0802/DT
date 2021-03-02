<?php
$err_msg1="";
$err_msg2=""; //投稿がなかったとき、空白を格納する変数を定義しておかないとエラーになる

// if(isset($_POST["family_name"])===true){
    // $family_name=$_POST["family_name"];
// }else{
    // $family_name="";
// }
//これを三項演算子で表現する↓

//三項演算子
// $age=30;
// $message=($age>=20)?"大人です":"子供です";//$messageに結果を格納する

$x="";
var_dump(isset($x));//$xは定義されている ->bool(true)
var_dump(isset($y));//$yは定義されていない ->bool(false)

$family_name=(isset($_POST["family_name"])===true)? $_POST["family_name"]: "";
$first_name=(isset($_POST["first_name"])===true)? $_POST["first_name"]:"";

//配列は使えない書き方
$a=10;
// $c=($a)?:5;
$c=$a?$a:5;
echo $c;

echo "<br>";

//投稿がある場合のみ
if(isset($_POST["send"])===true){
    if($family_name==="")$err_msg1="氏を入力してください";
    if($first_name==="")$err_msg2="名を入力してください";
    //if($age<20)$err_msg3="20未満の方は参加できません。";
    //if($family_name!=="" && $first_name !=="")
    if($err_msg1===""&& $err_msg2==="" /*&&$err_msg3==="" */){
        echo "mail send!<br>";
        exit("this task stop!");
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
</head>
<body>
    <form action ="" method="post">
        氏：<input type="text" name="family_name" value="<?php echo $family_name;?>">
        <?php echo $err_msg1;?><br>名：<input type="text" name="first_name" value="<?php echo $first_name;?>">
    <?php//もし"family_name"と"first_name"のvalueが得られなかったらエラーメッセージ?>
        <?php echo $err_msg2;?><br><input type="submit" name="send" value="クリック">
    </form> 
    
</body>
</html>
