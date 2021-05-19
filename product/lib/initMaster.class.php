<?php
namespace product\lib;

class initMaster{
    public static function getDate(){
        $yearArr = [];
        $monthArr = [];
        $dayArr = [];

        $next_year = date("Y")+1;

        //年を作成
        for ($i = 2020; $i<$next_year; $i++){
            $year = sprintf("%04d", $i);
            $yearArr[$year] = $year;
        }
        //月を作成
        for ($i = 0; $i<13; $i++){
            $month = sprintf("%02d", $i);
            $monthArr[$month] = $month;
        }
        //日を作成
        for ($i = 0; $i<32; $i++){
            $day = sprintf("%02d", $i);
            $dayArr[$day] = $day;
        }
        return [$yearArr,$monthArr, $dayArr];
    }

    public static function getTime(){
        for ($i=0; $i<25; $i++){
            $hour = sprintf("%02d", $i);
            $hourArr[$hour] = $hour;
        }
        for ($i=0; $i<60; $i=$i+15){
            $min = sprintf("%02d", $i);
            $minArr[$min] = $min;
        }
        return [$hourArr, $minArr];
    }

    public static function getSex(){
        $sexArr = ["1" => "男性", "2" => "女性", "3" => "その他"];
        return $sexArr;
    }

}


?>