<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>if文</title>
</head>
<body>

<?php
echo "斎藤　友彦";
echo "<br>";
echo "サイトウ　トモヒコ";
echo "<br>";//html tagを出力することで使える
$x="10";
//$xという変数に文字列の１０をいれる
/*コメントアウトスタート⇒終わり */
// ==大体同じ
// ===データ型まで同じ
echo "<br>";

$id=0;
//空・・・0==""(値は同じ)であるが、0(数値)===""(文字列)ではない
if ($id===""){
    echo "empty";
}else {
    echo "not empty";
}
echo "<br>";
//$x="10";
if ($x===10){
    echo "10";
}else {
    echo "not 10";//出力
}
echo "<br><br>";

//変数名は分かりやすく！
$my_score=70;//数字
//$a="70"; 文字列
if($my_score>=80){
    echo "がんばりましたね";
}elseif($my_score>=60){
    echo "もう一歩です";
}elseif($my_score>=40){
    echo "頑張りましょう";
}else {
    echo "ダメダメです";
}
echo "<br>";

$a=10;
$c=7;
// || バーティカルバー　（または）どちらか一方を満たす
if($a===10&&$c===8){
    echo "OK";
}else{
    echo "NG";
}
echo "<br>";

//!== or != は否定
// $a ==="" 空白、未入力
$a="0";
if (empty($a)===true){//$aが空であるならば（データ型まで）
    echo "空（カラ）です";
}
echo "<br>";
if ($a!==""){
    echo "値が入っています。";
}else {
    echo "空白です";
}
//データ型まで一致しているかはPHP公式HPを参照しよう　比較演算子！
//"" !=="0"は確実
?>
</body>
</html>

