<?php 
echo "今日はいい天気"."<br>";
$name="natsuki"; // $⇒ダラーマークという

$a="3";
if ($a==3){
    echo "同じ";//同じと出力される
//$a===3だと違うとなる
}else {
    echo "違う！";
}
echo "<br>";

//空
$empty= [NULL, "0", 0, ""];
//==表記だとすべて空として扱われる

?>