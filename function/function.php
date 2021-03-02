<?php
define("TAX", 1.08); //const TAX =1.08;でもOK
echo TAX; //まんま書いてOK 後から変更できない定数
echo "<br><br>";
function say_Hello($name){
    echo "hi ".$name."<br>";
    echo "your name is ".$name."<br>";
    echo "<br>";
}
say_Hello("matsumoto");
say_Hello("tanaka");
say_Hello("watanabe");
say_Hello("katou");

function say_Hello2($name="hoge"/*初期値*/){
    echo "hi ".$name."<br>";
    echo "your name is ".$name."<br>";
    echo "<br>";
}
say_Hello2();
say_Hello2("kazuma");//$name="kazuma"と上書きされた

function say_Hello3($name, $age){
    echo $name. " is ".$age. " years old"."<br>";
}
say_Hello3("matsumoto", 34);


//TAX = 1.08;
function calc($price){
    $price = 1.2*$price;
    $price2=$price*TAX;
    return $price2; //戻り値を得るだけで出力ではない
}//関数のうちで定義された変数(ローカル変数)は外で使えない
$price=1000;//グローバル変数もまた関数内で使えないが、引数としてのみ使える
echo $price."<br>";
$price2=calc($price);
echo $price2;
echo "<br>";
// echo $price; ->1000!

//参考問題
function say_weather($name, $fine_fig){
    if($fine_fig===true){
        echo $name." さんいい天気ですね。";
    }else{
        echo $name." さん今日は雨ですね。";
    }    
}
say_weather("佐藤", true);
?>