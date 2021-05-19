<?php
namespace product;
require_once dirname(__FILE__)."/Bootstrap.class.php";
use product\Bootstrap;
use product\lib\PDODatabase;
use product\lib\initMaster;
use product\lib\ListUp;
use product\lib\Complete;
$db = new PDODatabase(Bootstrap::DB_HOST, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
$list = new ListUp($db);
$comp = new Complete();

$dataArr = $_POST;
unset($_POST["confirm"]);
// var_dump($dataArr);
$user_id = (isset($_POST["user_id"]))?$_POST["user_id"]: "";
$event_id = (isset($_POST["event_id"]))?$_POST["event_id"]: "";

if (isset($_POST["inst_num"])){
    $insData = [];
    if (isset($dataArr["violin"])){
    $insData["violin"] = $dataArr["violin"];
    }
    if (isset($dataArr["saxophone"])){
        $insData["saxophone"] = $dataArr["saxophone"];
    }
    if (isset($dataArr["drum"])){
        $insData["drum"] = $dataArr["drum"];
    }
    if (isset($dataArr["piano"])){
        $insData["piano"] = $dataArr["piano"];
        $arrWhereVal[] = $dataArr["piano"];
    }
    if (isset($dataArr["cello"])){
        $insData["cello"] = $dataArr["cello"];
        $arrWhereVal[] = $dataArr["cello"];
    }
    if (isset($dataArr["accordion"])){
        $insData["accordion"] = $dataArr["accordion"];
        $arrWhereVal[] = $dataArr["accordion"];
    }
    if (isset($dataArr["castanet"])){
        $insData["castanet"] = $dataArr["castanet"];
        $arrWhereVal[] = $dataArr[""];
    }
    if (isset($dataArr["clarinet"])){
        $insData["clarinet"] = $dataArr["clarinet"];
        $arrWhereVal[] = $dataArr["clarinet"];
    }
    if (isset($dataArr["contrabass"])){
        $insData["contrabass"] = $dataArr["contrabass"];
        $arrWhereVal[] = $dataArr["contrabass"];
    }
    if (isset($dataArr["euphonium"])){
        $insData["euphonium"] = $dataArr["euphonium"];
        $arrWhereVal[] = $dataArr["euphonium"];
    }
    if (isset($dataArr["flute"])){
        $insData["flute"] = $dataArr["flute"];
        $arrWhereVal[] = $dataArr["flute"];
    }
    if (isset($dataArr["guitar"])){
        $insData["guitar"] = $dataArr["guitar"];
        $arrWhereVal[] = $dataArr["guitar"];
    }
    if (isset($dataArr["horn"])){
        $insData["horn"] = $dataArr["horn"];
        $arrWhereVal[] = $dataArr["horn"];
    }
    if (isset($dataArr["tambourine"])){
        $insData["tambourine"] = $dataArr["tambourine"];
        $arrWhereVal[] = $dataArr["tambourine"];
    }
    if (isset($dataArr["triangle"])){
        $insData["triangle"] = $dataArr["triangle"];
        $arrWhereVal[] = $dataArr["triangle"];
    }
    if (isset($dataArr["trombone"])){
        $insData["trombone"] = $dataArr["trombone"];
        $arrWhereVal[] = $dataArr["trombone"];
    }
    if (isset($dataArr["trumpet"])){
        $insData["trumpet"] = $dataArr["trumpet"];
        $arrWhereVal[] = $dataArr["trumpet"];
    }
    if (isset($dataArr["tuba"])){
        $insData["tuba"] = $dataArr["tuba"];
        $arrWhereVal[] = $dataArr["tuba"];
    }
    if (isset($dataArr["viola"])){
        $insData["viola"] = $dataArr["viola"];
        $arrWhereVal[] = $dataArr["viola"];
    }

    $table = "inst";
    $where = "event_id=$event_id AND user_id=$user_id";
    $res = $db->update($table, $insData, $where);
if ($res !== false){
    header("Location: update.php?user_id=".$user_id."&event_id=".$event_id);
}else{
    $errMsg = "編集に失敗しました";
    header("Location: update.php?user_id=$user_id & event_id=$event_id");

}
}else{

$insData =[];
if (isset($dataArr["year"])){
    $insData["year"] = intval($dataArr["year"]);
    $insData["month"] = intval($dataArr["month"]);
    $insData["day"] = intval($dataArr["day"]);
}
if(isset($dataArr["start_hour"])){
    $insData["start_hour"] = $dataArr["start_hour"];
    $insData["start_min"] = $dataArr["start_min"];
}
if(isset($dataArr["finish_hour"])){
    $insData["finish_hour"] = $dataArr["finish_hour"];
    $insData["finish_min"] = $dataArr["finish_min"];
}
if(isset($dataArr["venue"])){
    $insData["venue"] = $dataArr["venue"];
}
if(isset($dataArr["address"])){
    $insData["address"] = $dataArr["address"];
}
$insData["regist_date"] = $comp->registDate();
// var_dump($insData);
$table = "event";
$where = "id=$event_id AND user_id=$user_id";
$res = $db->update($table, $insData, $where);
var_dump($res);
if ($res !== false){
    header("Location: update.php?user_id=".$user_id."&event_id=".$event_id);
}else{
    $errMsg = "編集に失敗しました";
    header("Location: update.php?user_id=$user_id & event_id=$event_id");

}
}

?>