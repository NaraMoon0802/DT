<?php?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>楽器リクエスト</title>
    
</head>
<body>
    <div id = "wrapper">
    <header>楽器をリクエストする</header>
    <a href="http://localhost/DT/product/ctg_list.php?ctg_id=<?php echo $cateArr[0]["ctg_id"]?>&user_id=<?php echo $user_id?>&event_id=<?php echo $event_id?>"><?php echo $cateArr[0]["category_name"]?></a>
    <a href="http://localhost/DT/product/ctg_list.php?ctg_id=<?php echo $cateArr[1]["ctg_id"]?>&user_id=<?php echo $user_id?>&event_id=<?php echo $event_id?>"><?php echo $cateArr[1]["category_name"]?></a>
    <a href="http://localhost/DT/product/ctg_list.php?ctg_id=<?php echo $cateArr[2]["ctg_id"]?>&user_id=<?php echo $user_id?>&event_id=<?php echo $event_id?>"><?php echo $cateArr[2]["category_name"]?></a>
    <a href="http://localhost/DT/product/ctg_list.php?ctg_id=<?php echo $cateArr[3]["ctg_id"]?>&user_id=<?php echo $user_id?>&event_id=<?php echo $event_id?>"><?php echo $cateArr[3]["category_name"]?></a>
    <a href="http://localhost/DT/product/request.php?user_id=<?php echo $user_id?>">全部</a>
    <div id="item_list">
    <?php if (isset($allArr)){
        foreach ($allArr as $value){?>
        <div class="item">
            <ul>
                <li class="name">
                <?php echo $value["item_name"]?>
                </li>
                <li class="image">
                <img src="http://localhost/DT/product/images/<?php echo $value["image"]?>" alt=<?php echo $value["item_name"]?>>
                </li>
            </ul>
            <form class="cart_in" method="post" action="select.php">
                <select name="number">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <input type="submit" name="cart_in" value="選択する" id="cart_in">
                <input type="hidden" name="user_id" value=<?php echo $user_id ?>>
                <input type="hidden" name="event_id" value=<?php echo $event_id ?>>
                <input type="hidden" name="item_id" value=<?php echo $value["item_id"]?>>
            </form>
        </div>
        <?php }
    }else {
        foreach ($dataArr as $value){?>
            <div class="item">
            <ul>
                <li class="name">
                <?php echo $value["item_name"]?>
                </li>
                <li class="image">
                <img src="http://localhost/DT/product/images/<?php echo $value["image"]?>" alt=<?php echo $value["item_name"]?>>
                </li>
            </ul>
            <form class="cart_in" method="post" action="select.php">                
                <select name="number">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <input type="submit" name="cart_in" value="選択する" id="cart_in">
                <input type="hidden" name="user_id" value=<?php echo $user_id ?>>
                <input type="hidden" name="event_id" value=<?php echo $event_id ?>>
                <input type="hidden" name="item_id" value=<?php echo $value["item_id"]?>>
            </form>
            </div>
        <?php }
    }?>

    <a href = "http://localhost/DT/product/index.php">back</a>
    <a href="http://localhost/DT/product/select.php?user_id=<?php echo $user_id?>&select=all&event_id=<?php echo $event_id?>">選択内容</a>
    </div>
</body>
</html>