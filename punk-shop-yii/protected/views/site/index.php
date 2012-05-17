<?php $this->pageTitle=Yii::app()->name; ?>

<div id="categories">
	<ul>
	<?php foreach(Categories::getIdsWithTitles() as $category) { ?>
            <li>
                <a href="index.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['title']; ?></a>
            </li>            
        <?php } ?>
	</ul>
</div>

<div id="result">
	
    <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=> $dataProvider,
            'itemView'=>'../goods/_view',
    )); ?>
	
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
