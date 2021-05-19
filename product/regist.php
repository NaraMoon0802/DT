<?php
namespace product;
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\Session;
require_once("./Bootstrap.class.php");

 
$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);

//エラーメッセージと登録完了メッセージの初期化
$err_msg = "";
$signUpMsg = "";

$username = (!empty($_POST["username"]))?$_POST["username"]: "";
$password = (!empty($_POST["password"]))?$_POST["password"]: "";
$password2 = (!empty($_POST["password2"]))?$_POST["password2"]: "";


if ($username!== "" && $password !== ""){
    $res = $db->insert("account", ["username"=>$username, "password" => password_hash($password, PASSWORD_DEFAULT)]);
    if ($res!==false){
        require_once("./after_regist.php");
        exit();
    }
    
}elseif ($password !== $password2){
    $err_msg = "パスワードが間違っています";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
</head>
<body>
    <form method="post" action="">
        ユーザー名：<input type="text" name="username" value="<?php echo $username;?>" /><br>
        パスワード：<input type="password" name="password" value="<?php echo $password; ?>"/><br>
        パスワード確認：<input type ="password" name="password2"/><br>
        <?php echo $err_msg;?><br>
        <input type="submit" value="登録">
    </form>
</body>
</html>