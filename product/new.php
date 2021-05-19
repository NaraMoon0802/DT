<?php
namespace product;
require_once("./Bootstrap.class.php");
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\Session;

$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$ses = new Session($db);




?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予定の登録</title>
</head>
<body>
    <form method="post" action="">
        <select name="year">
            <?php 
            $i = 2021
            $switch = 1;
            while($res === true){
                $year = strval($i);
                echo ("<option value=".$year.">".$i."</option>");
                $i = $i+1;
                if ($i === 2100){
                    $res = false;
                }
            }?>
        </select>
    </form>
</body>
</html>