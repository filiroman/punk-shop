<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/user_add.css"/>
</head>

<body>
	<?php 
	$auth=false;
	include "include/index_head.php" ?>

	<div id="main">
		<p>Регистрация</p>
		<form method="post" action="user_add_action.php">
			<input id="user_email" name="email" type="text" placeholder="Email"><br>
			<input id="user_name" name="name" type="text" placeholder="Name"><br>
			<!--<input id="telephone" name="telephone" type="text" placeholder="Phone number"><br>!-->
			<input id="user_password" name="password" type="password" placeholder="Password"><br>
			
			<input id="reg_button" type="submit" value="Зарегистрировать"><br>
		</form>
		
	</div>

	<?php include "include/index_foot.php" ?>
</body>


</html>
