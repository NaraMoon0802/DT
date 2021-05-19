<?php
namespace product\lib;
class getItemData{
    private $db = null;
    public function __construct($db = null){
        $this->db = $db;
    }
    
    public function DecideData($user_id, $numArr){
        foreach($numArr as $key=>$value){
        $table = "item";
        $column = "item_name";
        $where = "item_id=$key";
        $data = $this->db->select($table, $column, $where);
        $inst[$data["item_name"]] = $value;
        }
        return $inst;
    }
    public function getEventId($user_id, $event_id){
        $table = "event";
        $column = "id";
        $where = "user_id=$user_id AND id=$event_id";
        $eventId = $this->db->select($table, $column, $where);
        return $eventId;
       
    }



    public function insDecideData($user_id, $event_id, $inst){

        $table = "inst";
        $violin_num = (isset($inst["violin"]))?intval($inst["violin"]):0;
        $sax_num = (isset($inst["saxophone"]))?intval($inst["saxophone"]):0;
        $drum_num = (isset($inst["ドラム"]))?intval($inst["ドラム"]):0;
        $piano_num = (isset($inst["ピアノ"]))?intval($inst["ピアノ"]):0;
        $accordion_num = (isset($inst["accordion"]))?intval($inst["accordion"]):0;
        $viola_num = (isset($inst["viola"]))?intval($inst["viola"]):0;
        $cello_num = (isset($inst["cello"]))?intval($inst["cello"]):0;
        $contrabass_num = (isset($inst["contrabass"]))?intval($inst["contrabass"]):0;
        $clarinet_num = (isset($inst["clarinet"]))?intval($inst["clarinet"]):0;
        $flute_num = (isset($inst["flute"]))?intval($inst["flute"]):0;
        $horn_num = (isset($inst["horn"]))?intval($inst["horn"]):0;
        $trombone_num = (isset($inst["trombone"]))?intval($inst["trombone"]):0;
        $trumpet_num = (isset($inst["trumpet"]))?intval($inst["trumpet"]):0;
        $tuba_num = (isset($inst["tuba"]))?intval($inst["tuba"]):0;
        $guitar_num = (isset($inst["guitar"]))?intval($inst["guitar"]):0;
        $euphonium_num = (isset($inst["euphonium"]))?intval($inst["euphonium"]):0;
        $castanet_num = (isset($inst["castanet"]))?intval($inst["castanet"]):0;
        $tambourine_num = (isset($inst["tambourine"]))?intval($inst["tambourine"]):0;
        $triangle_num = (isset($inst["triangle"]))?intval($inst["triangle"]):0;

        $insData = [
            "event_id" => $event_id,
            "violin" => "",
            "saxophone" => "",
            "drum" => "",
            "piano" => "",
            "user_id" => $user_id
        ];
        $insData["violin"] = $violin_num;
        $insData["saxophone"] = $sax_num;
        $insData["drum"] = $drum_num;
        $insData["piano"] = $piano_num;
        $insData["accordion"] = $accordion_num;
        $insData["viola"] = $viola_num;
        $insData["cello"] = $cello_num;
        $insData["contrabass"] = $contrabass_num;
        $insData["clarinet"] = $clarinet_num;
        $insData["flute"] = $flute_num;
        $insData["horn"] = $horn_num;
        $insData["trombone"] = $trombone_num;
        $insData["trumpet"] = $trumpet_num;
        $insData["tuba"] = $tuba_num;
        $insData["guitar"] = $guitar_num;
        $insData["euphonium"] = $euphonium_num;
        $insData["castanet"] = $castanet_num;
        $insData["tambourine"] = $tambourine_num;
        $insData["triangle"] = $triangle_num;


        return $insData;
        return $this->db->insert($table, $insData);
    }

    
    public function getSelectData($user_id){
        $table = " sele s LEFT JOIN item i ON s.item_id = i.item_id ";
        $column = " s.select_id, s.user_id, s.number, i.item_id, i.item_name, i.image ";
        $where = " s.user_id = ? AND s.delete_flg = ? ";
        $arrVal = [$user_id, 0];
        return $this->db->select($table, $column, $where, $arrVal);
    }
    public function delSelectData($select_id){
        $table = "sele";
        $insData = ["delete_flg" => 1];
        
        $WhereVal = intval($select_id);
        return $this->db->delete_sele($table, $insData, $WhereVal);
    }
    public function getItemAndSum($user_id){
        $table = " sele s ";
        $column = " SUM( number ) AS num ";
        $where = "delete_flg =".intval(0);
        $res = $this->db->select($table, $column, $where);
        $num = ($res !== false && count($res) !== 0)? $res[0]["num"]: 0;
        return $num;
    }
    public function getItemEachSum(){
        $table = " sele ";
        $column = " item_id, SUM( number ) AS num ";
        $val = 0;
        $where = "delete_flg=$val";
        $this->db->setGroupBy("item_id");
        $res = $this->db->select($table, $column, $where);
        return $res;
    }
}
?>