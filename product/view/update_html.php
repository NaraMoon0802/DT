<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集</title>
</head>
<body>
<table border="1">
    <tr>
        <th>User ID</th>
        <th>Event ID</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>Finish Time</th>
        <th>place</th>
        <th>address</th>
        <th>バイオリン</th>
        <th>サックス</th>
        <th>ドラム</th>
        <th>ピアノ</th>
        <th>アコーディオン</th>
        <th>ビオラ</th>
        <th>チェロ</th>
        <th>コントラバス</th>
        <th>クラリネット</th>
        <th>フルート</th>
        <th>ホルン</th>
        <th>トロンボーン</th>
        <th>トランペット</th>
        <th>チューバ</th>
        <th>ギター</th>
        <th>ユーフォニウム</th>
        <th>カスタネット</th>
        <th>タンバリン</th>
        <th>トライアングル</th>


    </tr>
    <tr>
        <td>
        <?php echo $user_id?>
        </td>
        <td>
        <?php echo $listData["id"]?>
        </td>
        <td>
        <?php echo $listData["year"]."年".$listData["month"]."月".$listData["day"]."日"?>
        </td>
        <td>
        <?php echo $listData["start_hour"]."時".$listData["start_min"]."分"?>
        </td>
        <td>
        <?php echo $listData["finish_hour"]."時".$listData["finish_min"]."分"?>
        </td>            
        <td><?php echo $listData["venue"]?></td>
        <td><?php echo $listData["address"]?></td>
        <td><?php echo $listData["violin"]?></td>
        <td><?php echo $listData["saxophone"]?></td>
        <td><?php echo $listData["drum"]?></td>
        <td><?php echo $listData["piano"]?></td>
        <td><?php echo $listData["accordion"]?></td>
        <td><?php echo $listData["viola"]?></td>
        <td><?php echo $listData["cello"]?></td>
        <td><?php echo $listData["contrabass"]?></td>
        <td><?php echo $listData["clarinet"]?></td>
        <td><?php echo $listData["flute"]?></td>
        <td><?php echo $listData["horn"]?></td>
        <td><?php echo $listData["trombone"]?></td>
        <td><?php echo $listData["trumpet"]?></td>
        <td><?php echo $listData["tuba"]?></td>
        <td><?php echo $listData["guitar"]?></td>
        <td><?php echo $listData["euphonium"]?></td>
        <td><?php echo $listData["castanet"]?></td>
        <td><?php echo $listData["tambourine"]?></td>
        <td><?php echo $listData["triangle"]?></td>

    </tr>
</table>
<form method="post" action="update_confirm.php">
  開催日<select name="year">
            <?php foreach($yearArr as $value){ ?>
                <option> <?php echo $value."年" ?> </option>
            <?php } ?>
        </select>
        <select name="month">
            <?php foreach($monthArr as $value){ ?>
                <option> <?php echo $value."月" ?> </option>
            <?php } ?>
        </select>
        <select name="day">
            <?php foreach($dayArr as $value){ ?>
                <option> <?php echo $value."日" ?> </option>
            <?php } ?>
        </select>
        <input type="hidden" name="user_id" value= <?php echo $user_id?>>
        <input type="hidden" name="event_id" value= <?php echo $event_id?>>
        <input type="submit" name ="confirm" value="confirm"><br>
</form>
<form method="post" action="update_confirm.php">
        開始時間
        <select name="start_hour">
            <?php foreach($hourArr as $value){ ?>
                <option> <?php echo $value."時" ?> </option>
            <?php } ?>
        </select>
        <select name="start_min">
            <?php foreach($minArr as $value){ ?>
                <option> <?php echo $value."分" ?> </option>
            <?php } ?>
        </select>
        <input type="hidden" name="user_id" value= <?php echo $user_id?>>
        <input type="hidden" name="event_id" value= <?php echo $event_id?>>
        <input type="submit" name ="confirm" value="confirm"><br>
</form>
<form method="post" action="update_confirm.php">
        終了時間
        <select name="finish_hour">
            <?php foreach($hourArr as $value){ ?>
                <option> <?php echo $value."時" ?> </option>
            <?php } ?>
        </select>
        <select name="finish_min">
            <?php foreach($minArr as $value){ ?>
                <option> <?php echo $value."分" ?> </option>
            <?php } ?>
        </select>
        <input type="hidden" name="user_id" value= <?php echo $user_id?>>
        <input type="hidden" name="event_id" value= <?php echo $event_id?>>
        <input type="submit" name ="confirm" value="confirm"></br>
</form>
<form method="post" action="update_confirm.php">
        会場名<input type="text" name="venue">
        <input type="hidden" name="user_id" value= <?php echo $user_id?>>
        <input type="hidden" name="event_id" value= <?php echo $event_id?>>
        <input type="submit" name ="confirm" value="confirm"></br>
</form>
<form method="post" action="update_confirm.php">
        住所<input type="text" name="address">    
        <input type="hidden" name="user_id" value= <?php echo $user_id?>>
        <input type="hidden" name="event_id" value= <?php echo $event_id?>>
        <input type="submit" name ="confirm" value="confirm"></br>
</form>
<?php foreach ($inst_data[0] as $key => $value){?>
<?php echo $key;?>
<form method="post" action="update_confirm.php">   
        <select name=<?php echo $key ?>>
            <?php for ($i=1; $i<6; $i++){?>
            <option><?php echo $i?></option>
            <?php }?>
        </select>
        <input type="hidden" name="user_id" value= <?php echo $user_id?>>
        <input type="hidden" name="event_id" value= <?php echo $event_id?>>
        <input type="hidden" name="inst_num" value= "reset">
        <input type="submit" name ="confirm" value="confirm"></br>
</form>
<?php } ?>

<a href="http://localhost/DT/product/list.php?user_id=<?php echo $user_id?>&event_id=<?php echo $event_id?>">一覧</a>
<a href="http://localhost/DT/product/index.php">index</a>
</body>
</html>