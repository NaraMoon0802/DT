<?php
namespace product\lib;

class Complete {
    public function insertPersonData($dataArr, $db){
        $res = $db->insert("member", $dataArr);
        return $res;
    }

    
}

?>
