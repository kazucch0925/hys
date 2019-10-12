<html>
	<head>
		<title>mission_5-1-2_kai</title>
		<meta charset = "utf-8">
	</head>
	<body>
		<form action="mission_5-1-2_kai.php" method="post">
		<h1>入力フォーム</h1>

		<?php
			if(!empty($_POST["editNo"])&& !empty($_POST["passed"])){
		$dsn='データベース名';
		$user='ユーザー名';
		$password='パスワード';
		$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

		$sql='SELECT* FROM hyskzt where id=$_POST["editNo"]';
		$stmt=$pdo->query($sql);
		$results=$stmt->fetchAll();
		foreach($results as $row){

			if($_POST["passed"]==$row['password']){
				echo '<p class="comment-form-author"><label for="author">名前:</label><br><input id="author" type="text" name="edname" value="$row["name"]" size="30" aria-required="true"><br></p>';
				echo '<p class="comment-form-comment"><label for="comment">コメント:</label><br><textarea id="comment" name="edcomment" value="$row["comment"]"></textarea><br><br></p>';
				echo '<p><input type="submit" value="送信する"><br></p>';
			}else{
				echo '<p class="comment-form-author"><label for="author">名前:</label><br><input id="author" type="text" name="name" value="" size="30" aria-required="true"><br></p>';
				echo '<p class="comment-form-comment"><label for="comment">コメント:</label><br><textarea id="comment" name="comment" value=""></textarea><br><br></p>';
				echo '<p><input type="submit" value="送信する"><br></p>';	
			}}
		}
		?>
		</form>

		<form action="mission_5-1-2_kai.php" method="post">
			<p class="comment-form-deleteNo">
				<label for="deleteNo">削除したい番号を入力:</label>
				<input type="text" name="deleteNo">
			</p>
			<p><input type="text" name="passdel" placeholder="パスワード"></p>
			<p><input type="submit" name="delete" value="削除"></p>
		</form>

		<form action="mission_5-1-2_kai.php" method="post">
			<p class="comment-form-editNo">
				<label for="editNo">編集したい番号を入力:</label>
				<input type="text" name="editNo">
			</p>
			<p><input type="text" name="passed" placeholder="パスワード"></p>
			<p><input type="submit" name="edit" value="編集"></p>
		</form>
	</body>
</html>

		<?php
			if(!empty($_POST["name"])&& !empty($_POST["comment"])&& !empty($_POST["pass"])){
				
		$dsn='データベース名';
		$user='ユーザー名';
		$password='パスワード';
		$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

		$sql = "CREATE TABLE IF NOT EXISTS hyskzt"
		." ("
		. "id INT AUTO_INCREMENT PRIMARY KEY,"
		. "name char(32),"
		. "comment TEXT,"
		. "password char(32),"
		. "time timestamp"
		.");";
		$stmt = $pdo->query($sql);

		$username = $_POST["name"];
		$comment = $_POST["comment"];
		$userpass = $_POST["pass"];
		$sql = $pdo -> prepare("INSERT INTO hyskzt (name, comment, password, time) VALUES (:name, :comment, :password, cast( now() as datetime))");
		$sql -> bindParam(':name', $username, PDO::PARAM_STR);
		$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
		$sql -> bindParam(':password', $userpass, PDO::PARAM_STR);
		$sql -> execute();

			echo "次のデータを受け取りました".'</br>';

		$sql = 'SELECT * FROM hyskzt';
		$stmt = $pdo->query($sql);
		$results = $stmt->fetchAll();
		foreach ($results as $row){
			//$rowの中にはテーブルのカラム名が入る
			echo $row['id'].',';
			echo $row['name'].',';
			echo $row['comment'].',';
			echo $row['time'].'<br>';
		echo "<hr>";
		}
			}
		?>

		<?php
			if(!empty($_POST["edname"])&& !empty($_POST["edcomment"])){

		$dsn='データベース名';
		$user='ユーザー名';
		$password='パスワード';
		$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

		$edid = $_POST["editNo"]; //変更する投稿番号
		$edname = $_POST["edname"];
		$edcomment = $_POST["edcomment"]; //変更したい名前、変更したいコメントは自分で決めること
		$sql = 'update hyskzt set name=:name,comment=:comment where id=:id';
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':name', $edname, PDO::PARAM_STR);
		$stmt->bindParam(':comment', $edcomment, PDO::PARAM_STR);
		$stmt->bindParam(':id', $edid, PDO::PARAM_INT);
		$stmt->execute();

		$sql = 'SELECT * FROM hyskzt';
		$stmt = $pdo->query($sql);
		$results = $stmt->fetchAll();
		foreach ($results as $row){
			//$rowの中にはテーブルのカラム名が入る
			echo $row['id'].',';
			echo $row['name'].',';
			echo $row['comment'].'<br>';
		echo "<hr>";
		}
			}
		?>

		<?php
			if(!empty($_POST["deleteNo"])&& !empty($_POST["passdel"])){
			
		$dsn='データベース名';
		$user='ユーザー名';
		$password='パスワード';
		$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

		$id = $_POST["deleteNo"];
		$sql = 'delete from hyskzt where id=:id';
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		$sql='SELECT*FROM hyskzt';
		$stmt=$pdo->query($sql);
		$results=$stmt->fetchAll();
		foreach($results as $row){
			echo $row['id'].',';
			echo $row['name'].',';
			echo $row['comment'].'<br>';
		echo "<hr>";
		}
			}
		?>