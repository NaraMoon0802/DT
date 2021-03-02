<?php 
echo "Hello world!";
echo "<br>";
$a="PHP";
$b="school";
echo $a.$b;
echo "<br>";
$n=10;
echo $n+5;
echo "<br>";
define("TAX", 1.05);
$price=2000*TAX;
echo $price;
echo "<br>";

$a=100;
if($a>=80){
    echo "congratulation";
}elseif($a>=60 && $a<80){
    echo "OK";
}else{
    echo "Don't mind";
}
echo "<br>";

$id=1;
$name="natsuki";
if($id!="" && $name!=""){
    echo "OKです";
}else{
    echo "idまたはpassを入力してください。";
}
echo "<br>";

$arr=["aaa", "bbb", "ccc"];
echo $arr[1];
echo "<br>";

$sum=0;
for($i=1; $i<=10; $i++){
    $sum=$sum+0.1;
}
echo $sum;
echo "<br>";

echo date("Y年m月d日 H時i分", time());
echo "<br>";

$str="apple.orange.peach";
$fruits= explode(".", $str);
var_dump($fruits);
echo "<br>";

$zip= "170-0014";
if (preg_match("/-/", $zip)){
    echo "OK";
}else {
    echo "NG";
}
echo PHP_EOL."<br>";

$i=1;
while($i<=10){
    if ($i%3==0){
        echo "<strong>".$i."</strong>";
    }else{
        echo $i;
    }
    $i++;
}
echo PHP_EOL."<br>";

$sum=0;
for ($i=1; $i<=100; $i++){
    $sum = $sum + $i;
}
echo $sum;
echo PHP_EOL."<br>";

$sum=0;
for ($i=1; $sum<=10000; $i++){
    $sum=$sum+$i;
    // echo $i."<br>";
}
echo ($i-1)."<br>".PHP_EOL;
echo $sum;


?>