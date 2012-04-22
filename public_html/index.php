<?php

/**
 * @author NoName
 *
 * Основной исполняемый файл нашего проетка
 *
 */
ini_set('display_errors', 1);
//это инклуд
require '../bootstrap.php';
?>

<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>

<body>
	<?php
	$auth=false;
	include "include/index_head.php" ?>

	<div id="main">

		<?php include "include/search_categories.php" ?>

		<div id="result">

			<div class="item">
				<img class="item_img" src="img/pic1.jpg">
				<p class="item_name"><a href="item_info.php">Новый диван</a></p></br>
				<p class="item_date">20.03.2012</p>
				<p class="item_author"><a href="user_info.php">Ольга</a></p></br>
				<p class="item_price">цена: <span style="font-size:15px;font-weight:bold">5000</span>р</p>
				<p class="item_description">Новый раскладной диван. В отличном состоянии. Самовывоз</p></br>
			</div>

			<div class="item">
				<img class="item_img" src="img/pic2.jpg">
				<p class="item_name"><a href="item_info.php">монитор Acer V193HQVBb</a></p></br>
				<p class="item_date">15.03.2012</p>
				<p class="item_author"><a href="user_info.php">Дмитрий</a></p></br>
				<p class="item_price">цена: <span style="font-size:15px;font-weight:bold">3600</span>р</p>
				<p class="item_description">монитор Acer V193HQVBb, 1366x768, 10000:1, 200cd/m^2, 5ms, черный</p></br>
			</div>

			<div class="item">
				<img class="item_img" src="img/pic3.jpg">
				<p class="item_name"><a href="item_info.php">Холодильник</a></p></br>
				<p class="item_date">14.03.2012</p>
				<p class="item_author"><a href="user_info.php">Василий</a></p></br>
				<p class="item_price">цена: <span style="font-size:15px;font-weight:bold">2100</span>р</p>
				<p class="item_description">Холодильник Бирюза в отличном состоянии. Морозилка рабочая</p></br>
			</div>

			<div class="item">
				<img class="item_img" src="img/pic4.jpg">
				<p class="item_name"><a href="item_info.php">Ночь веcелого студента</a></p></br>
				<p class="item_date">10.03.2012</p>
				<p class="item_author"><a href="user_info.php">Blackout</a></p></br>
				<p class="item_price">цена: <span style="font-size:15px;font-weight:bold">100</span>р</p>
				<p class="item_description">Ночь Веселого Студента 30 марта в Blackout!
Вас ждет: фри-бар девушкам до часу + умопомрачительный коктейль для всех, выступление DJ KEFIR, DJ COOL, эксклюзивное видео с вечеринки, конкурсы и многое другое!</p></br>
			</div>

		</div>

	</div>

	<?php include "include/index_foot.php" ?>
</body>

</html>
