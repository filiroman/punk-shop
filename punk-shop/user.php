<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/user.css"/>
</head>

<body>
	<div id="header">
		<div id="logo">
			<a href="index.php"><img id="logo_img" src="img/logo.png"/><a>
			<h1>Punk shop</h1>
		</div>
		<div id="authorisation">
			<form method="post" action="login.php">
				<input id="email" name="email" type="text" placeholder="Email">
				<input id="password" name="password" type="password" placeholder="Пароль"><br>
				<span id="checkbox_text"><span><input id="cookie" name="cookie" type="checkbox">
				<input id="auth_button" type="submit" value="Войти">
			</form>
			<form action="reg.php">
				<input id="reg_button" type="submit" value="Регистрация">
			</form>
		</div>
	</div>

	<div id="main">
	
		<div id="search">
			<form id="search" method="post" action="search.php">
				<input id="search_text" name="search_text" type="text">
				<input id="search_button" type="submit" value="Искать">
			</form>
		</div>
		
		<div id="categories">
		<ul>
			<li><a href="">Бытовая техника</a></li>
			<li><a href="">Электроника</a></li>
			<li><a href="">Мебель</a></li>
			<li><a href="">Книги</a></li>
			<li><a href="">Услуги</a></li>
			<li><a href="">Другое</a></li>
			<li><a href="">Объявления</a></li>
		</ul>
		</div>
		
		<div id="user">
			<img src="img/pic.png">
			<p id="user_name">user name</p>
			<p id="user_contacts">contacts</p>
			<p id="user_description">some describing text</p>
		</div>


	</div>
	
	<div id="footer">
	
	</div>


</body>


</html>