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
			<div id="img"><img src="img/ava.jpg"></div>
			Имя <input value="Василий"></br>
			Email email@mail.ru</br> 
			Пароль <input></br> Подтвердите пароль<input> </br>
			Изображение <input style="border:none"type="file"></input></br>
			Контактный email <input value="email@mail.ru"> </br>
			Телефон <input value="8-911-1234567"></br>
			<span style="width:510px;float:left;margin:5px 0;">Информация</span> </br><textarea>Живу в 15ке</textarea></br>
			
			<button style="float:right;margin: 2px 0;">сохранить</button>
			
			
		</div>


	</div>
	
	<?php include "include/index_foot.php" ?>

</body>


</html>
 