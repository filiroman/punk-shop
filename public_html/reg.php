<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/reg.css"/>
</head>

<body>
	<?php 
	$auth=true;
	include "/include/header.php" ?>

	<div id="main">
		<p>Регистрация</p>
		<form method="post" action="new_user.php">
			<input id="email" name="email" type="text" placeholder="Email"><br>
			<input id="name" name="name" type="text" placeholder="Name"><br>
			<input id="telephone" name="telephone" type="text" placeholder="Phone number"><br>
			<input id="password" name="password" type="password" placeholder="Password"><br>
			
			<input id="reg_button" type="submit" value="Зарегистрировать"><br>
		</form>
		
	</div>
	
	<div id="footer">
	
	</div>


</body>


</html>