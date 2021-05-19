<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/event_detail.js" ></script>
    <title>イベント申請</title>
</head>
<body>
<form id = "event" enctype="multipart/form-data" method="post" action="./confirm_event.php">
        開催日
        <select name="year">
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
        </select><br>
        会場名<input type="text" name="venue"></br>
        住所<input type="text" name="address"></br>
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
        </select><br>
        会場の写真<br><input type="file" name="upfile"><br>
        <?php foreach($errImageMsg as $value){echo $value."<br>";}?>
        <?php foreach($errMsg as $value){echo $value."<br>";}?>
        <?php echo $errCompMsg."<br>"; ?>
        <input type="hidden" name="user_id" value= "<?php echo $user_id;?>">
        <input type="submit" name ="confirm" value="confirm">
</form>
        <a href="http://localhost/DT/product/index.php">index</a>
</body>
</html>