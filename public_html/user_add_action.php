 <?php
	session_start();
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbName = "punk_shop";
	mysql_connect($hostname, $username, $password) or die("�� ���� ������� ����������");
	mysql_select_db($dbName) or die(mysql_error()); 
 
	$err = array();
	
	$user_email = htmlspecialchars(($_POST['email']));
	$user_name = htmlspecialchars(($_POST['name']));
	$user_password = md5(md5($_POST['password']));

	$query = mysql_query("SELECT COUNT(id) FROM users WHERE email='".$user_email."'");
    if(mysql_result($query, 0) > 0){
        $err[] = "������ email ��� �����";
    }
	
	if(count($err) == 0){     
        mysql_query("INSERT INTO users SET email='".$user_email."', name='".$user_name."', password='".$user_password."'");
		$result = mysql_query("SELECT id FROM users WHERE email='".$user_email."'");
		$data = mysql_fetch_assoc($result);
		$id=$data["id"];
		$_SESSION['id']=$id;
		echo $id;
		mysql_close();
        header("Location: index.php"); exit();
    } else {
        print "<b>��� ����������� ��������� ��������� ������:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
?>
