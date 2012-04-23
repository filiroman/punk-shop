 <!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/item_add.css"/>
</head>

<body>
	<?php 
	$auth=true;
	include "include/index_head.php" ?>
	
	<div id="main">
	
		<?php include "include/search_categories.php" ?>
		
		<div id="good">
			
			<form id="new_item" method="post" action="item_add_action.php">
				Название<input name="title" type="text"></br>
				Описание</br><textarea id="description" name="description" type="text" ></textarea><br>
				
				Цена<input id="price" name="price" type="text">
				<select id="category" name="category" size="1">
					<option selected="selected" value="default">Категория</option>
					<option value="">Электроника</option>
					<option value="">Мебель</option>
					<option value="">Книги</option>
					<option value="">Бытовая техника</option>
					<option value="">Услуги</option>
					<option value="">Другое</option>
					<option value="">Объявления</option>
				</select></br>
				Изображение<input style="width:250px;" type="file"></input></br>
				<input id="btn" type="submit">
			</form>
		</div>
		

	</div>
	
	<?php include "include/index_foot.php" ?>
</body>

</html>
