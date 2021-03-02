<?php
$var=1;
$var2="1";
$name="斎藤";
var_dump($var); 
//int(1) 数値１
var_dump($var2);
//string(1) 文字列で1文字(バイト数)
var_dump($name);
//string(6) "斎藤" 斎藤という文字列は６文字(1mb=3)

//大規模なコードの場合、いちいち戻らずに変数の中身を確認できる。
//日本語はマルチバイトで１文字あたり3文字分ある。(mb)
echo "<br>";
echo "<br>";

$arr=["saito", "tomohiko", "chiba", "PHP"];
var_dump($arr);
//-> array(4){[0]=>string(5) "saito [1]=> string(8) "tomohiko" .....}
//->この配列には４つの要素が含まれている([0],[1],[2],[3])
echo "<br>";
echo "<br>";
echo $arr[0]; //saito
echo "<br>";
echo $arr[1]; //tomohiko
echo "<br>";
echo "<br>";
$arr[4]="man";
var_dump($arr); 
//array(5){[0]=>string(5) "saito" ........ [4]=>string(3) "man"}
echo "<br>";
echo "<br>";
//値を変更する
$arr[2]="tokyo";
var_dump($arr);
//array(5){......[2]=>string(5) "tokyo" ....} <- ([2] => string(5) "chiba")
echo "<br>";
echo "<br>";


//連想配列....数字のkeyをわかりやすい単語で表現しよう
$label_arr=[ //key => value
    "family_name" => "saito",
    "first_name"=> "tomohiko",
    "pref"=>"chiba",
    "language"=>"PHP"
];
var_dump($label_arr);
echo "<br>";
echo "<br>";

echo $label_arr["language"];
echo "<br>";
echo "<br>";
$label_arr["hobby"]="baseball";//新しい配列の追加(存在しなかったkeyとvalueをつくる）
var_dump($label_arr);
echo "<br>";
echo "<br>";
$label_arr["language"]="Perl";//配列の変更
var_dump($label_arr);
echo "<br>";
echo "<br>";

//多次元配列.....$example=[[key=>value, key=>value...], [key=>value, ...], [key=>value, ...]];
$excel_arr=[ //外の[]を忘れるな！
[
    "family_name"=>"saito",
    "first_name"=>"tomohiko",
    "pref"=>"chiba",
    "language"=>"PHP",
],
[
    "family_name"=>"tanaka",
    "first_name"=>"youhei",
    "pref"=>"tokyo",
    "language"=>"C"
],
[
    "family_name"=>"satou",
    "first_name"=>"ichirou",
    "pref"=>"kanagawa",
    "language"=>"Java"
]
];
var_dump($excel_arr);
echo "<br>";
echo "<br>";
var_dump($excel_arr[1]);
//array(4) { ["family_name"]=> string(6) "tanaka" ["first_name"]=> string(6) "youhei" ["pref"]=> string(5) "tokyo" ["language"]=> string(1) "C" }
//配列の形でデータを出す時はvar_dump
echo "<br>";
echo "<br>";
echo $excel_arr[0]["language"]; //PHP
//文字列、数値で出すときはecho
echo "<br>";
echo "<br>";
echo $excel_arr[1]["pref"]; //tokyo
echo "<br>";
echo "<br>";
$excel_arr[1]["pref"]="osaka";//tokyo->osaka
var_dump($excel_arr);
echo "<br>";
echo "<br>";

//多次元配列に値を追加する場合
//番号を使う
$excel_arr[3]=[
    "family_name"=>"suzuki",
    "first_name"=>"jirou",
    "pref"=>"saitama",
    "language"=>"Perl"
];
var_dump($excel_arr);
echo "<br>";
echo "<br>";
//array_pushを使う
$arr=[
    "family_name"=>"suzuki",
    "first_name"=>"jirou",
    "pref"=>"saitama",
    "language"=>"Perl"
];
// array_push($excel_arr, $arr);//関数なので（）
$excel_arr[]=$arr; //空の配列に入れる どっちでもOK
var_dump($excel_arr);
echo "<br>";
echo "<br>";

?>