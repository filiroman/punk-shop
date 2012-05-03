<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "mydb";
$cnt_table = "view_count";
$ip_table = "ip_filter";

mysql_connect($hostname, $username, $password) or die("Не могу создать соединение");
mysql_select_db($dbName) or die(mysql_error()); 

mysql_query("CREATE TABLE $cnt_table (
         id int NOT NULL,
		 count int DEFAULT '0',
		 PRIMARY KEY (id))") or die("Не могу добавить таблицу $cnt_table");
mysql_query("CREATE TABLE $ip_table (
         id int NOT NULL,
		 ip varchar(15) NOT NULL,
		 last_view datetime,
		 PRIMARY KEY (id, ip))") or die("Не могу добавить таблицу $ip_table");
echo 'ok';
?>