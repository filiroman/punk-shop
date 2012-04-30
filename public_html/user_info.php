<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/user_info.css"/>
</head>

<body>
	<?php 
	$auth=true;
	include "include/index_head.php" ?>
	
	<div id="main">
	
		<?php include "include/search_categories.php" ?>
		
		<div id="user">
			<div id="img"><img src="img/ava.jpg"></div>
			<p id="user_name">Василий</p>
			
			<p id="contact">Контакты:</p>
			<p class="user_contact">8-911-1234567</p>
			<p class="user_contact">email@mail.ru</p>
			
			<p id="info">Информация:</p>			
			<p class="user_description">Живу в 15ке.</p>
			<a class="hrefs" href="user_edit_info.php">Редактировать данные</a></br>
			<p style="margin:10px;font-weight:bold;">Текущие продажи:</p>
			<p class="good_name"><a href="item_info.php">Холодильник</a></p> 			
			
			
		</div>


	</div>
	
	<?php include "include/index_foot.php" ?>

</body>


</html>
