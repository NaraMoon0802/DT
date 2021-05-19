
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人情報登録</title>
</head>
<body>
<form method="post" action="./confirm.php">
        
        姓<input type="text" name="family_name"><br>
        名<input type="text" name="first_name"><br>
        せい<input type="text" name="family_name_kana"><br>
        めい<input type="text" name="first_name_kana"><br>
        男性<input type="radio" name="sex" value="<?php echo $sexArr["1"]?>">
        女性<input type="radio" name="sex" value="<?php echo $sexArr["2"]?>">        
        その他<input type="radio" name="sex" value="<?php echo $sexArr["3"]?>"><br>
        郵便番号<input type="text" name="zip1"><input type="text" name="zip2"><br>
        住所<input type="text" name="address"><br>
        メールアドレス<input type="text" name="email"><br>
        電話番号<input type="text" name="tel1"><input type="text" name="tel2"><input type="text" name="tel3"><br>
        <input type="hidden" name="user_id" value= "<?php echo $dataArr["user_id"]?>">
        <?php foreach ($errMsg as $value){
            echo $value."<br>";
        }?>
        <input type = "submit" name="confirm" value="confirm">
    </form>
<a href="http://localhost/DT/product/index.php">back</a>
</body>
</html>