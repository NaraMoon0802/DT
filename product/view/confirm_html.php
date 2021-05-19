<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録情報確認</title>
</head>
<body>
<header>個人情報登録確認</header>
<table>
        <tr>
            <th>お名前(氏名)</th>
            <td><?php echo $dataArr["family_name"].$dataArr["first_name"]?></td>
        </tr>
        <tr>
            <th>お名前(かな)</th>
            <td><?php echo $dataArr["family_name_kana"].$dataArr["first_name_kana"]?></td>
        </tr>
        <tr>
            <th>性別</th>
            <td><?php echo $dataArr["sex"]?></td>
        </tr>
        <tr>
            <th>郵便番号</th>
            <td><?php echo $dataArr["zip1"]." - ".$dataArr["zip2"]?></td>
        </tr>
        <tr>
            <th>住所</th>
            <td><?php echo $dataArr["address"]?></td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td><?php echo $dataArr["email"]?></td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td><?php echo $dataArr["tel1"]." - ".$dataArr["tel2"]." - ".$dataArr["tel3"]?></td>
        </tr>
    </table>
    <div>
    <form method="post" action="complete.php">
    <?php foreach ($dataArr as $key => $value) {?>
    <input type="hidden" name="person_data[<?php echo $key?>]" value=<?php echo $value?>>
    <?php }?>
    <input type="submit" name="decide" value="決定">
    </form>
    <a href ="http://localhost/DT/product/new_host.php?id=<?php echo $user_id?>">back</a>
</body>
</html>