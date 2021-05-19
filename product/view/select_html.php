<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
    <div id="wrapper">
        <div id="select_list">
        <?php echo $event_id;?>
            <p>楽器リスト</p>
            <p><a href="http://localhost/DT/product/request.php?id=<?php echo $user_id?>">>楽器一覧</a></p>
            <p>楽器合計：<?php echo $sum?>個</p>
            <?php if ($dataArr === []){
                echo "<p>楽器が選択されていません</p>";
            }else{ 
                foreach ($dataArr as $value) {?>
                <div class="item">
                    <ul>
                        <li class="image"><img src=
                        "http://localhost/DT/product/images/<?php echo $value["image"]?>"
                        alt= <?php echo $value["item_name"]?>></li>
                        <li class="name"><?php echo $value["item_name"]?></li>
                        <li class="number"><?php echo $value["number"]?></li>
                        <li><a href="http://localhost/DT/product/select.php?select_id=<?php echo $value["select_id"]?>&user_id=<?php echo $value["user_id"]?>">削除</a></li>
                    </ul>
                </div>
                <?php }
            }?>
        </div>
        <div id="decide">
            <form method="post" action="./select.php">
            <?php echo $errMsg;?>
            <input type="hidden" name="event_id" value=<?php echo $event_id ?>>
            <input type="hidden" name="user_id" value=<?php echo $user_id?>> 
            <input type="submit" name="cancel" value="全てキャンセル">
            <input type="submit" name="decide" value="決定">
            </form>
        </div>
        <a href="http://localhost/DT/product/index.php">index</a>
    </div>
</body>
</html>