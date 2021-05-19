<?php
namespace product;
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\Session;
require("./Bootstrap.class.php");
$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$ses = new Session($db);


    $err_msg = "";
    $username = (isset($_POST["username"]) === true)?$_POST["username"]: "";
    $password = (isset($_POST["password"]) === true)?$_POST["password"]: "";
    if ($username !== "" && $password !== ""){
        $table="admin";
        $column = "id, username, password";
        $where = "username = '$username'";
        $data = $db->select($table, $column, $where);

        if (password_verify($password, $data[0]["password"])){
            $ses->checkSession();
            //$_SESSION で値を次ページに渡す。        
            $_SESSION["username"] = $data[0]["username"];
            $_SESSION["id"] = $data[0]["id"];
            // $ses->checkSession();
            //ログイン完了後にindex.phpに遷移
            header("Location: list.php?user=admin");
            exit;
        }else{
            $err_msg = "ログイン情報が間違っています";
        }
    }else {
        $err_msg = "ユーザー名かパスワードを入力してください";
    }


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">	
    <title>管理者ログイン</title>
    <style type="text/css">
        div#main{
            padding: 30px;
			background-color: #efefef;
        }
    </style>
</head>
<body>
    <div class="container">
        <header><h3>管理者ログイン</h3></header>
        <div id="main">
            <form method="post" action="">
                ユーザー名：<input type="text" name="username" value="<?php echo $username;?>" /><br>
                パスワード：<input type="password" name="password" value="<?php echo $password; ?>"/><br>
                <?php echo $err_msg;?><br>
                <input type="submit" class="btn btn-primary" value="Log In">
            </form>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>