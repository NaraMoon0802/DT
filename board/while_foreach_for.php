<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
$i=1;
while ($i<=10){
    echo $i;
    $i++;
}
echo "<br><br>";
for($i=1; $i<=10; $i++){
    echo $i."<br>";
}
echo "<br><br>";
//変数の四則演算(+, -, *, /,)
// $i+=5; -> $i=$i+5;
// $i++; -> $i=$i+1;
// $i--; -> $i=$i-1;
//結合
$name="natsuki";
echo "わたしは".$name."<br>"; 
$name .= "です。";
echo "わたしは".$name;
echo "<br><br>";

$arr=[
    "saito",
    "tomohiko",
    "chiba",
    "PHP"
];
// echo $arr[0];
// echo $arr[1];
// echo $arr[2];
// echo $arr[3];
echo "***********************<br>";
$num=count($arr); //count()関数...引数に関する要素の数を数える
//->0~3 = 4
for($i=0; $i<$num; $i++){
    echo $arr[$i]."<br>";
}
//valueが順番に出力される
echo "<br><br>";
//連想配列の繰り返し処理（一般的）
foreach($arr as $key=>$value){
    echo $key." : ";
    echo $value."<br>";
}
echo "<br><br>";

$label_arr=[
    "family_name"=>"saito",
    "first_name"=>"tomohiko",
    "pref"=>"chiba",
    "language"=>"PHP"
];
foreach($label_arr as $label=>$data){
    echo $label;
    echo" : ";
    echo $data."<br>";
}
echo "<br><br>";

$excel_arr=[ //外側の[]を忘れるな！
    [
        "family_name"=>"saito",
        "first_name"=>"tomohiko",
        "pref"=>"chiba",
        "age"=>"33",
        "language"=>"PHP"
    ],
    [
        "family_name"=>"tanaka",
        "first_name"=>"youhei",
        "pref"=>"tokyo",
        "age"=>"19",
        "language"=>"C",
    ],
    [
        "family_name"=>"satou",
        "first_name"=>"ichirou",
        "pref"=>"kanagawa",
        "age"=>"28",
        "language"=>"Java"
    ]
];
foreach($excel_arr as $no=>$member_data){
    echo "NO:".$no. "<br>";
    // var_dump($member_data); valueは配列で取得されている
    // echo "<br>";
    echo "family_name :".$member_data["family_name"]."<br>";
    echo "first_name  :".$member_data["first_name"]."<br>";
    echo "pref        :".$member_data["pref"]."<br>";
    echo "age         :".$member_data["age"]."<br>";
    echo "language    :".$member_data["language"]."<br>";
    echo "<br><br>";

}

//offにするのは$j===10の時というような考えか？
$j=1;
$flg=true;//$flgにtrueを代入 $flgはtrueなのである
while($flg===true){//$flgがtrueである限り(論理値なのでデータ型がずれることはないね)
    if($j===10) //この時$flg=falseとなりループ処理は終了する
        $flg=false; //１行のみの場合{}は省いて可！
    echo $j;
    $j++;
}
echo "<br><br>";

$fp=fopen("sample_text.txt", "r");
$flg=true;

while($flg===true){
    $res=fgets($fp); //fgetsが終点に到達するとfalseを返す。

if ($res===false)
    $flg=false;
    echo $res."<br>";
}
fclose($fp);
echo "<br><br>";

foreach($excel_arr as $member_data){
    if($member_data["age"]>=30){
        echo $member_data["family_name"]."さんは３０代です。<br>";
    }elseif($member_data["age"]>=20){
        echo $member_data["family_name"]."さんは２０代です。<br>";
    }else{
        echo $member_data["family_name"]."さんは１０代です。<br>";
    }
}
echo "<br><br>";

//<tr>row...行（横）
echo "<table border=1px>";
echo "<tr>";
echo "<td>family_name</td>";
echo "<td>first_name</td>";
echo "<td>pref</td>";
echo "<td>age</td>";
echo "<td>language</td>";
echo "</tr>";
foreach($excel_arr as $member){
    echo "<table border=1px>";
    echo "<tr>";
    echo "<td>".$member["family_name"]."</td>";
    echo "<td>".$member["first_name"]."</td>";
    echo "<td>".$member["pref"]."</td>";
    echo "<td>".$member["age"]."</td>";
    echo "<td>".$member["language"]."</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>