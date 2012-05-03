 <?php
	session_start();
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbName = "punk_shop";
	mysql_connect($hostname, $username) or die("Не могу создать соединение");
	mysql_select_db($dbName) or die(mysql_error()); 
	
	$query = mysql_query("SELECT id, password FROM users WHERE email='".mysql_real_escape_string($_POST['email'])."' LIMIT 1");
	$data = mysql_fetch_assoc($query);
	mysql_close();
	if($data['password'] === md5(md5($_POST['password']))) {
		$_SESSION['id'] = $data['id'];
		header("Location: index.php");
	} else{
		echo "<p style=\"font-family: helvetica; font-size: 20pt;\">Вы ввели неправильный логин/пароль</p>";
	}
	
	
?>
 