<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">	
    <title>イベント一覧</title>
    <style>
        html {
            height: 100%;
        }
        body{
            height: 100%;
            margin: 0;
        }
        .container {
            height: 100%;
            display: flex;
        }
        .container>#main{
            align-self: center;
        }
        
        div#main {
			padding: 30px;
            margin: ;
            height: 80%;
			background-color: #efefef;
            display: flex;
            align-items: center;    
		}
        
    </style>

</head>
<body>
    <div class="container">
        <div id="main">
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
                    <th>進捗</th>
                    <th>編集リンク</th>
                    <th>削除</th>
                </tr>
                <?php foreach($allData as $key=>$value){?>
                    <tr>
                        <td>
                        <?php echo $value["user_id"]?>
                        </td>
                        <td>
                        <?php echo $value["id"]?>
                        </td>
                        <td>
                        <?php echo $value["year"]."年".$value["month"]."月".$value["day"]."日"?>
                        </td>
                        <td>
                        <?php echo $value["start_hour"]."時".$value["start_min"]."分"?>
                        </td>
                        <td>
                        <?php echo $value["finish_hour"]."時".$value["finish_min"]."分"?>
                        </td>            
                        <td><?php echo $value["venue"]?></td>
                        <td><?php echo $value["address"]?></td>
                        <td><?php echo $value["violin"]?></td>
                        <td><?php echo $value["saxophone"]?></td>
                        <td><?php echo $value["drum"]?></td>
                        <td><?php echo $value["piano"]?></td>
                        <td><?php echo $value["accordion"]?></td>
                        <td><?php echo $value["viola"]?></td>
                        <td><?php echo $value["cello"]?></td>
                        <td><?php echo $value["contrabass"]?></td>
                        <td><?php echo $value["clarinet"]?></td>
                        <td><?php echo $value["flute"]?></td>
                        <td><?php echo $value["horn"]?></td>
                        <td><?php echo $value["trombone"]?></td>
                        <td><?php echo $value["trumpet"]?></td>
                        <td><?php echo $value["tuba"]?></td>
                        <td><?php echo $value["guitar"]?></td>
                        <td><?php echo $value["euphonium"]?></td>
                        <td><?php echo $value["castanet"]?></td>
                        <td><?php echo $value["tambourine"]?></td>
                        <td><?php echo $value["triangle"]?></td>
                        <td><?php echo $value["progress"]?></td>
                        <td><a href="
                        http://localhost/DT/product/update.php?user_id=<?php echo $user_id?>&event_id=<?php echo $value["id"]?>">編集</a></td>
                        <td><a href="
                        http://localhost/DT/product/list.php?user_id=<?php echo $user_id?>&event_id=<?php echo $value["id"]?>&action=delete">削除</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <footer>
        <a class="btn btn-primary" href="http://localhost/DT/product/index.php">index</a>
        </footer>

    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>