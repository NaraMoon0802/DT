<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント登録情報確認</title>
</head>
<body>
<table border="1">
        <tr>
            <th>Date</th>
            <th>Start Time</th>
            <th>Finish Time</th>
            <th>place</th>
            <th>address</th>
            <th>会場画像・動画</th>
        </tr>
            <tr>
                <td>
                <?php echo $dataArr["year"].$dataArr["month"].$dataArr["day"]?>
                </td>
                <td>
                <?php echo $dataArr["start_hour"].$dataArr["start_min"]?>
                </td>
                <td>
                <?php echo $dataArr["finish_hour"].$dataArr["finish_min"]?>
                </td>            
                <td><?php echo $dataArr["venue"]?></td>
                <td><?php echo $dataArr["address"]?></td>
                <td><img src=<?php echo $url?> alt=<?php echo $img_name?>></td>
            </tr>
    </table>
    <form method="post" action="complete_event.php">
    <?php foreach ($dataArr as $key => $value) {?>
    <input type="hidden" name="event_data[<?php echo $key?>]" value=<?php echo $value?>>
    <?php }?>
    <?php foreach ($imageArr as $key => $value) {?>
    <input type="hidden" name="image_data[<?php echo $key?>]" value=<?php echo $value?>>
    <?php }?>
    <input type="submit" name="decide" value="決定">
    </form>
    <a href ="http://localhost/DT/product/event_detail.php?id=<?php echo $user_id?>">back</a>
</body>
</html>