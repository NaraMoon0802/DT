<?php
namespace product\lib;
class Item{
    public $cateArr = [];
    public $db = null;
    public function __construct($db){
        $this->db = $db;
    }
    public function getCategoryList(){
        $table = " category ";
        $col = " ctg_id, category_name ";
        $res = $this->db->select($table, $col);
        return $res;
    }

    public function getAllItem(){
        $table = " item ";
        $col = " item_id, item_name, image, ctg_id ";
        $res = $this->db->select($table, $col);
        return ($res !== false && count($res) !== 0)? $res: false;
    }
    public function getItemList($ctg_id){
        $table = " item ";
        $col = " item_id, item_name, image, ctg_id ";
        $where = ($ctg_id !== "")? " ctg_id = ? ": "";
        $arrVal = ($ctg_id !== "")? [$ctg_id]: [];
        $res = $this->db->select($table, $col, $where, $arrVal);
        return ($res !== false && count($res) !== 0)? $res: false;
    }
    public function getItemDetailData($item_id){
        $table = " item ";
        $col = " item_id, item_name, image, ctg_id ";
        $where = ($item_id !== "")? " item_id = ? ": "";
        $arrVal = ($item_id !== "")? [$item_id]: [];
        $res = $this->db->select($table, $col, $where, $arrVal);
        return ($res !== false && count($res) !== 0)? $res: false;
    }
}
?>