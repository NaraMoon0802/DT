<?php
namespace product\lib;
class ListUp{
    private $db = null;
    public function __construct($db = null){
        $this->db = $db;
    }
    public function getSelectData($user_id){
        $table = " sele s LEFT JOIN item i ON s.item_id = i.item_id ";
        $column = " s.select_id, s.user_id, s.number, i.item_id, i.item_name, i.image ";
        $where = " s.user_id = ? AND s.delete_flg = ? ";
        $arrVal = [$user_id, 0];
        return $this->db->select($table, $column, $where, $arrVal);
    }

    public function allWholeList(){
        $table = "event e LEFT JOIN inst i ON e.id = i.event_id JOIN member m ON e.user_id = m.user_id";
        $column = "e.id, m.family_name, m.first_name, e.year, e.month, e.day, e.venue, e.address, e.start_hour, e.start_min, e.finish_hour, e.finish_min, e.user_id, e.progress,
        i.violin, i.saxophone, i.drum, i.piano, i.accordion, i.viola, i.cello, i.contrabass, i.clarinet, i.flute, i.horn, i.trombone, i.trumpet, i.tuba, i.guitar, i.euphonium, i.castanet, i.tambourine, i.triangle";
        return $this->db->select($table, $column);

    }
    public function allList($user_id){
        $table = "event e LEFT JOIN inst i ON e.id = i.event_id";
        $column = "e.id, e.year, e.month, e.day, e.venue, e.address, e.start_hour, e.start_min, e.finish_hour, e.finish_min, e.user_id, e.progress,
        i.violin, i.saxophone, i.drum, i.piano, i.accordion, i.viola, i.cello, i.contrabass, i.clarinet, i.flute, i.horn, i.trombone, i.trumpet, i.tuba, i.guitar, i.euphonium, i.castanet, i.tambourine, i.triangle";
        $where = "e.user_id=$user_id";
        return $this->db->select($table, $column, $where);
    }

    public function listEvent($user_id, $event_id){
        $table = "event";
        $column = "id, year, month, day, venue, address, start_hour, start_min, finish_hour, finish_min, user_id";
        $where = "id=$event_id AND user_id=$user_id";
        return $this->db->select($table, $column, $where);
    }
    public function listInst($user_id, $event_id){
        $table = "inst";
        $column = "violin, saxophone, drum, piano, accordion, viola, cello, contrabass, clarinet, flute, horn, trombone, trumpet, tuba, guitar, euphonium, castanet, tambourine, triangle";
        $where = "event_id=$event_id AND user_id=$user_id";
        return $this->db->select($table, $column, $where);
    }

    public function allCommentList(){
        $table = "comment";
        $column = "id, regist_date, comment, user_id";
        return $this->db->select($table, $column);
    }
}
?>