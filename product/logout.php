<?php
namespace product;
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\Session;
require("./Bootstrap.class.php");
$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$ses = new Session($db);
$_SESSION = array();
if (isset($_COOKIE["PHPSESSID"])){
    setcookie("PHPSESSID", '', time()-1800, '/');
}

session_destroy();
echo "<a href='login.php'>ログインしてください。</a>";
?>