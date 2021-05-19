<?php
namespace product;
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\Session;
require_once("./Bootstrap.class.php");
$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$ses = new Session($db);
// $ses->require_logined_session();//ログインされていなかったらログイン画面に戻る

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="./view/index.css" rel="stylesheet" type="text/css">	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">	
    <script type="text/javascript" src="./view/index.js"></script>
</head>
<body>
    <div class="container">
        <div>こんにちは、<?php echo $_SESSION["username"];?>さん</div>
        <div id="main">
            <a class="align-middle" href="new_host.php?id=<?php echo $_SESSION['id'];?>">個人情報登録</a><br>
            <a href="event_detail.php?id=<?php echo $_SESSION['id'];?>">ボランティア演奏会を企画する</a><br>
            <a href="list.php?user_id=<?php echo $_SESSION["id"]?>">申し込み一覧</a><br>
            <a href="board.php?id=<?php echo $_SESSION["id"]?>">コメント</a><br>
            <a class="btn btn-danger" href= <?php echo Bootstrap::ENTRY_URL."logout.php"?>>LogOut</a>

        </div>
        <div id="arrow-left" class="arrow"></div>
        <div id="arrow-right" class="arrow"></div>

        <div id="slider">
            <div class="slide slide1"></div>
            <div class="slide slide2"></div>
            <div class="slide slide3"></div>
        </div>

    </div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
</body>
</html>