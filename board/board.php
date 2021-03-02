<?php

$data="";//これの意味は？始めはデータがないってこと？
$fp=fopen("data.txt", "r");

$flg=true;
$count=0;
while($flg===true){
    $res=fgets($fp);

    if($res===false){
        $flg=false;
    }
    $data.=$res; //$data=$data.$res;今までのデータに今回の分を加える
    $count++;//0,1,2,...
    if($count%2===0){
        $data.= "<br>";//0,2,4...行目に改行を加える
    }
}
fclose($fp);
//別の書き方（スマート）
// while($res=fgets($fp)){
//     $data.=$res. "<br>";
// }

if (isset($_POST["send"])===true){
    $name=$_POST["name"];
    $comment=$_POST["comment"];

    if($name!=="" && $comment!==""){
        $fp=fopen("data.txt", "a");//a 追記  w 上書き

        if(flock($fp, LOCK_EX)===true){
            fwrite($fp, $name. "\n". $comment. "\n");
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>
    <form method="post" action="">
        名前<input type="text" name="name" value="">
        コメント
        <textarea name="comment" rows="8" cols="30"></textarea>
        <input type="submit" name="send" value="書き込む">
    </form>

    <!--ここに書き込まれたデータを表示する-->
    <?php echo $data;?>
</body>
</html>