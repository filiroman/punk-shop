<?php
	session_start();
	$_SESSION['id']=NULL;
	header("Location: index.php"); exit();
?>