<?php $this->pageTitle=Yii::app()->name; ?>

<div id="categories">
	<ul>
	<?php
		$arr = Categories::items('id');
		foreach ($arr as $value)
			echo "<li><a href='$value'>$value</a></li>";
	?>
	</ul>
</div>

<div id="result">
	
	<!--<div class="item">
		
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
	</div>-->
	<p>
	<center><h4>Приветствуем вас на нашем сайте!</h4></center>
	<br/>
	<font size='3'>Здесь вы можете найти то, что всегда искали. </br>
	Купить, а ,может быть, и продать что-то.<br/>
	Регистрация займет всего пару минут, и это предоставит</br>
	вам множество новых возможностей, таких как:</br>
	<ul><li> Добавление\удаление объявлений</li>
	<li> Возможность общения с другими пользователями системы</li>
	<li> Просмотр статистики по размещенным объявлениями</li>
	</ul>
	Спасибо, что посетили нас!</br>
	<a href="index.php?r=user/registration">Зарегистрироваться</a></font>
	</p>
	<?php 
	//header("Location: index.php?r=goods"); exit();	
	/*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
	
</div>

