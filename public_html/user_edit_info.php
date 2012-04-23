<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/user_edit_info.css"/>
</head>

<body>
	<?php 
	$auth=true;
	include "include/index_head.php" ?>
	
	<div id="main">
	
		<?php include "include/search_categories.php" ?>
		
		<div id="user">
			<img src="img/ava.jpg">
			Имя <input value="Василий"></br>
			Email email@mail.ru</br> 
			Пароль <input></br> Подтвердите пароль<input> </br>
			Изображение <input type="file" value="img.."></input></br>
			Контактный email <input value="email@mail.ru"> </br>
			Телефон <input value="8-911-1234567"></br>
			Информация <textarea>Живу в 15ке</textarea></br>
			
			<button>сохранить</button>
			
			
		</div>


	</div>
	
	<?php include "include/index_foot.php" ?>

</body>


</html>
 