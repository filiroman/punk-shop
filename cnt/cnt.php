<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "mydb";
$cnt_table = "view_count";
$ip_table = "ip_filter";

if (!isset($_GET['id']))
	die();
$id = (int)$_GET['id'];
is_numeric($id) or die();

mysql_connect($hostname, $username, $password) or die("Не могу создать соединение");
mysql_select_db($dbName) or die(mysql_error()); 

$query = "SELECT count FROM $cnt_table WHERE id=$id";
($reply = mysql_query($query)) or die(mysql_error());
$cnt = mysql_fetch_array($reply, MYSQL_NUM);
if ($cnt) 
	$cnt = $cnt[0];
else {
	mysql_query("INSERT INTO $cnt_table VALUES ($id, 0)") or die(mysql_error());
	$cnt = 0;
}
if (isset($_GET['inc'])) { // increment
	$user_ip = $_SERVER['REMOTE_ADDR'];
	$query = "SELECT UNIX_TIMESTAMP(last_view) FROM $ip_table WHERE id=$id AND ip=\"$user_ip\"";
	($reply = mysql_query($query)) or die(mysql_error());
	$last_view = mysql_fetch_array($reply, MYSQL_NUM);
	$now = time(); 
	if (!$last_view) 
		$query = "INSERT INTO $ip_table VALUES ($id, \"$user_ip\", FROM_UNIXTIME($now))";
	else if ($now - $last_view[0] > 20) // secs
		$query = "UPDATE $ip_table SET last_view=FROM_UNIXTIME($now) WHERE id=$id AND ip=\"$user_ip\"";
	else {
		echo $cnt;
		mysql_close();
		exit;
	}
	mysql_query($query) or die(mysql_error());

	$query = "UPDATE $cnt_table SET count = count + 1 WHERE id=$id";
	mysql_query($query) or die(mysql_error());
	$cnt++;
}

echo $cnt;

mysql_close();
?> 