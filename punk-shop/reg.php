<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/reg.css"/>
</head>

<body>
	<div id="header">
		<div id="logo">
			<a href="index.php"><img id="logo_img" src="img/logo.png"/><a>
			<h1>Punk shop</h1>
		</div>
	
	</div>

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