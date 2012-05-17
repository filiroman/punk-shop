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
	<?php
		if (Yii::app()->user->isGuest){
			echo '<p>
			<center><h4>Приветствуем вас на нашем сайте!</h4></center>
			<br/>
			<font size="3">Здесь вы можете найти то, что всегда искали. </br>
			Купить, а ,может быть, и продать что-то.<br/>
			Регистрация займет всего пару минут, и это предоставит</br>
			вам множество новых возможностей, таких как:</br>
			<ul><li> Добавление\удаление объявлений</li>
			<li> Возможность общения с другими пользователями системы</li>
			<li> Просмотр статистики по размещенным объявлениями</li>
			</ul>
			Спасибо, что посетили нас!</br>
			<a href="index.php?r=user/registration">Зарегистрироваться</a>   Уже бывали у нас?
			<a href="index.php?r=user/login">Войти</a></font>
			</p>';
		}
			$this->widget("zii.widgets.CListView", array(
				      "dataProvider"=> $dataProvider,
				      "itemView"=>"../goods/_view",
			 ));
	?>
</div>
<script>

	aa= document.getElementsByTagName('a');
	for(i=0;i<aa.length;i++){
		aa[i].href=aa[i].href.replace('index.php?r=site/view&id','index.php?r=goods/view&id');
	}
</script>
