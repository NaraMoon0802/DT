<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">	
    <title>イベント一覧</title>
    <style type="text/css">
        div#main {
			padding: 30px;
			background-color: #efefef;
		}
    </style>

</head>
<body>
    <div class="container">        
        <div id="main">
            <table border="1" class="table table-hover">
                <tr>
                    <th>氏名</th>
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
                <?php foreach($allData as $key=>$value){?>
                    <tr>
                        <td>
                        <?php echo $value["family_name"].$value["first_name"]?>
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
                    </tr>
                    <tr>
                        <td><?php echo $value["progress"]?></td><td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-example">進捗変更</button</td>
                    </tr>
                    <div class="modal" id="modal-example" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content"> 
                            <div class="modal-header">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="modal-label">進捗状況変更</h4>
                            </div>
                            <form method="post" action = "list.php" class="modal-body">
                            未確認<input type="radio" name="progress" value="未確認">
                            進行中<input type="radio" name="progress" value="進行中">
                            終了<input type="radio" name="progress" value="終了">
                            <input type="hidden" name="id" value=<?php echo $value["id"]?>>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                <input type="submit" class="btn btn-primary" value="保存">
                            </div>
                            </form>
                        </div>
                    </div>
                    </div>
                <?php } ?>
            </table>
            
        </div>
        <footer>
        <a href="http://localhost/DT/product/login.php">LogIn</a>
        </footer>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>