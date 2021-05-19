<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
  	<meta name="author" content="">
	<title>コメント一覧</title>
	<!-- bootstrap CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">	
	<style type=text/css>
		div#main {
			padding: 30px;
			background-color: #efefef;
		}
	</style>
</head>

<body>
	<div class="container">
		<div id="main">
			<!-- 1.モーダル表示のためのボタン -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-example">
			新規
            </button>
 
            <div class="modal" id="modal-example" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
 
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modal-label">コメント投稿</h4>
                        </div>
                        <form method="post" action = "board.php" class="modal-body">
                        <input type="text" name="comment">ここに内容を書く
                        <input type="hidden" name="user_id" value=<?php echo $user_id?>>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        <input type="submit" class="btn btn-primary" value="保存">
                        </div>
						</form>
                    </div>
                </div>
            </div>

			<h2>コメント一覧</h2>
			<table class="table table-striped">
				<tr>
					<th>id</th>
					<th>日時</th>
					<th>投稿内容</th>
					<th>ユーザーID</th>
					<th></th>
				</tr>
                <?php foreach($allData as $val){?>
                <tr>
					<td><?= $val["id"] ?></td>
					<td><?= $val["regist_date"] ?></td>
					<td><?= $val["comment"] ?></td>
					<td><?= $val["user_id"] ?></td>
				<?php if ($val["user_id"] === $user_id){?>
					<form action="board.php" method="post">
					<input type="hidden" name="delete_id" value=<?= $val["id"] ?>>
					<input type="hidden" name="user_id" value=<?php echo $user_id?>>
					<td><button class="btn btn-danger" type="submit">削除</button></td>
					</form>
				<?php }?>
				</tr>
				<?php } ?>
			</table>
			<a class="btn btn-primary" href="http://localhost/DT/product/index.php">index</a>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>

</html>