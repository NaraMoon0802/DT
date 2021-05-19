<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <form method="post" action="">
        ユーザー名：<input type="text" name="username" value="<?php echo $username;?>" /><br>
        パスワード：<input type="password" name="password" value="<?php echo $password; ?>"/><br>
        <?php echo $err_msg;?><br>
        <input type="submit" value="Log In">

    </form>
</body>
</html>