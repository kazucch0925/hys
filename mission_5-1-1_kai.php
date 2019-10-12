<html>
	<head>
		<title>mission_5-1-1_kai</title>
		<meta charset = "utf-8">
	</head>
	<body>
		<form action="mission_5-1-2_kai.php" method="post">
		<h1>入力フォーム</h1>
			<p class="comment-form-author">
				<label for="author">名前:</label>
				<input id="author" type="text" name="name" value="" size="30" aria-required="true" />
			</p>
			<p class="comment-form-comment">
				<label for="comment">コメント:</label>
				<textarea id="comment" type="text" name="comment" placeholder="ここには自由にコメントを記入してください"></textarea>
			</p>
			<p class="comment-form-pass">
				<label for="pass">新しいパスワードを設定:</label>
				<input id="pass" type="text" name="pass" />
			</p>
			<p><input type="submit" value="送信する"></p>
		</form>

		<form action="mission_5-1-2_kai.php" method="post">
			<p class="comment-form-deleteNo">
				<label for="deleteNo">削除したい番号を入力:</label>
				<input type="text" name="deleteNo">
			</p>
			<p><input type="text" name="passdel" placeholder="パスワード"></p>
			<p><input type="submit" name="delete" value="削除"></p>	
		</form>

		<form action="mission_5-1-2_kai.php" method="get">
			<p class="comment-form-editNo">
				<label for="editNo">編集したい番号を入力:</label>
				<input type="text" name="editNo">
			</p>
			<p><input type="text" name="passed" placeholder="パスワード"></p>
			<p><input type="submit" name="edit" value="編集"></p>
		</form>
	</body>
</html>