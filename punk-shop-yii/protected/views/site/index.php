<?php $this->pageTitle=Yii::app()->name; ?>

<div id="categories">
	<ul>
	<?php
		$arr = Categories::items('id');
		foreach ($arr as $value)
			echo "<li><a href='$value'>$value</a></li>";
		/*<li><a href="">Бытовая техника</a></li>
		<li><a href="">Электроника</a></li>
		<li><a href="">Мебель</a></li>
		<li><a href="">Книги</a></li>
		<li><a href="">Услуги</a></li>
		<li><a href="">Другое</a></li>
		<li><a href="">Объявления</a></li>
		<li><a href="">Конспекты</a></li>*/
	?>
	</ul>
</div>

<div id="result">
	
	<div class="item">
		
		<a href="img/pic3.jpg" class="lytebox" data-title="My Title"><img class="item_img" src="img/pic3.jpg"></a>
		<p class="item_name"><a href="item_info.php">Холодильник</a></p></br>
		<p class="item_date">14.03.2012</p>
		<p class="item_author"><a href="user_info.php?id=23">Василий</a></p></br>
		<p class="item_price">цена: <span style="font-size:15px;font-weight:bold">2100</span>р</p>
		<p class="item_description">Холодильник Бирюза в отличном состоянии. Морозилка рабочая</p></br>
	</div>
	
	<div class="item">
		<a href="img/pic1.jpg" class="lytebox" data-title="My Title"><img class="item_img" src="img/pic1.jpg"></a>
		<p class="item_name"><a href="item_info.php">Новый диван</a></p></br>
		<p class="item_date">20.03.2012</p>
		<p class="item_author"><a href="user_info.php">Ольга</a></p></br>
		<p class="item_price">цена: <span style="font-size:15px;font-weight:bold">5000</span>р</p>
		<p class="item_description">Новый раскладной диван. В отличном состоянии. Самовывоз</p></br>
	</div>
	
	<div class="item">
		<a href="img/pic2.jpg" class="lytebox" data-title="My Title"><img class="item_img" src="img/pic2.jpg"></a>
		<p class="item_name"><a href="item_info.php">монитор Acer V193HQVBb</a></p></br>
		<p class="item_date">15.03.2012</p>
		<p class="item_author"><a href="user_info.php">Дмитрий</a></p></br>
		<p class="item_price">цена: <span style="font-size:15px;font-weight:bold">3600</span>р</p>
		<p class="item_description">монитор Acer V193HQVBb, 1366x768, 10000:1, 200cd/m^2, 5ms, черный</p></br>
	</div>
	
	<div class="item">
		<a href="img/pic4.jpg" class="lytebox" data-title="My Title"><img class="item_img" src="img/pic4.jpg"></a>
		<p class="item_name"><a href="item_info.php">Ночь веcелого студента</a></p></br>
		<p class="item_date">10.03.2012</p>
		<p class="item_author"><a href="user_info.php">Blackout</a></p></br>
		<p class="item_price">цена: <span style="font-size:15px;font-weight:bold">100</span>р</p>
		<p class="item_description">Ночь Веселого Студента 30 марта в Blackout!
Вас ждет: фри-бар девушкам до часу + умопомрачительный коктейль для всех, выступление DJ KEFIR, DJ COOL, эксклюзивное видео с вечеринки, конкурсы и многое другое!</p></br>
	</div>
	
</div>

<!--<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>
<p>А ТЕПЕРЬ ЗА РАБОТУ!</p>
<p>Что надо сделать сейчас</p>
<ul>
<li>Разобраться хотя бы примерно как работает это чудо + основательно в своей области</li>

<li>Применить наш прошлый дизайн к этому чуду. Вероятно с использованием view и form всяких
Возможно дизайн потерпит некоторые изменения, но оно и к лучшему. 
ЖЕЛАТЕЛЬНО чтобы остался доступ к кнопкам которые сейчас есть(регистрация, логин)</li>

<li>Дописать недостающие страницы для оформления товаров и их просмотра. Подозреваю что они будут не сложными, но с множеством полей для заполнения.
Читайте соответвующие ссылки на сайте, там написано про обработку такого рода и есть пример блога.</li>

<li>Заставить это страницы нормально работать. Чтобы все сохранялось в бд и нормально отображалось.</li>

<li>Разобраться с отсылкой на почту пользователю или придумать систему уведомлений.
Для этого пригодятся очередные расширения или использование текущего</li>

<li>Добавить заливку файлов на сервер.(для загрузки изображения товара к примеру). Сделать связь с публикацией товара и нашей БД</li>

<li>7. Переделать бд, используя punk-shop/protected/modules/user/data/ бд из нашего расширения + текущие необходимые изменения, если есть.
Пока достаточно будет стереть юзера и заменить его на все новые таблицы из дирректории выше.</li>

=========
<li>Выбирайте тему и приступайте. Осталось не так много времени.
Дописывайте что посчитаете нужным. </li>
</ul>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <tt><?php echo __FILE__; ?></tt></li>
	<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>-->
