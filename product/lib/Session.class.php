<?php
namespace product\lib;
use product\lib\PDODatabase;

class Session{
    public $session_key = "";
    public $db = NULL;
    private $username = "";

    public function __construct($db){
    session_start();
    $this->session_key = session_id();
    $this->db = $db;
}
    public function checkSession($id = ""){
        $user_id = $this->selectSession(); 
        if ($user_id !== false){
            $_SESSION["user_id"] = $user_id;
            return $_SESSION["user_id"];
        }else {
            $res = $this->insertSession();
            if($res === true){
                $_SESSION["user_id"] = $this->db->getLastId();
                return $_SESSION["user_id"];
            }else {
                $_SESSION["user_id"] = "";
                return $_SESSION["user_id"];
            }
        }

    }
    private function selectSession(){
        $table = "session";
        $col = "user_id";
        $where = "session_key = ?";
        $arrVal = [$this->session_key];
        $res = $this->db->select($table, $col, $where, $arrVal);
        return (count($res) !== 0)? $res[0]["user_id"]: false;
    }
    private function insertSession(){
        $table = "session";
        $insData = [
            "session_key" => $this->session_key,
        ];
        $res = $this->db->insert($table, $insData);
        return $res;
    }

    public function require_unlogined_session(){
        if (isset($_SESSION["username"])){
            header("Location: ./index.php");
            //すでにログインしていたらページ遷移
            exit;
        }
    }
    public function require_logined_session(){
        if (!isset($_SESSION["username"])){
            header("Location: /login.php");
        }
    }
}

?>