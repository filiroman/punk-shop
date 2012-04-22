<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/advt.css"/>
</head>

<body>
	<?php 
	$auth=false;
	include "include/index_head.php" ?>

	<div id="main">
	
		<?php include "include/search_categories.php" ?>
		
		<div id="item">
			
			<p id="item_name"><a href="item_info.php">Холодильник</a></p> 			
			<span style="float:left;margin:0 5px 0 10px;">разместил</span><p id="item_author"><a href="user_info.php">Василий</a></p><p id="item_date">14.03.2012</p></br>
			<img id="item_img" src="img/pic3.jpg">
			<img id="item_img_mini" src="img/pic3.jpg">
			<img id="item_img_mini" src="img/pic3_2.jpg">
			<img id="item_img_mini" src="img/pic3_3.jpg">
			<img id="item_img_mini" src="img/pic3_4.jpg">
			<p id="item_description">Холодильник Бирюза в отличном состоянии. Рабочая морозилка. Самовывоз. 15ка</p>
			<p id="item_price">цена: <span style="font-size:15px;font-weight:bold">2100</span>р</p>
			<p id="item_contact">8-911-1234567</p>
			<p id="item_contact">email@mail.ru</p>
			
		</div>

	</div>
	
	<?php include "include/index_foot.php" ?>
</body>
</html>
