<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	<script type="text/javascript" language="javascript" src="lytebox_v5.5/lytebox.js"></script>
	<link rel="stylesheet" href="lytebox_v5.5/lytebox.css" type="text/css" media="screen" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/index">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png">
			</a>			
			<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
			<div id="search">
				<form method="post" action="search.php">
					<input id="search_text" name="search_text" type="text" placeholder="Поиск">
					<select id="search_category" name="category" size="1">
						<option selected="selected" value="default">Во всех категориях</option>
						<option value="">Электроника</option>
						<option value="">Мебель</option>
						<option value="">Книги</option>
						<option value="">Бытовая техника</option>
						<option value="">Услуги</option>
						<option value="">Другое</option>
						<option value="">Объявления</option>
					</select>
					<input id="search_button" type="submit" value="Искать">
				</form>
			</div>
		</div>
	</div><!-- header -->

<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(

array('label'=>'Главная', 'url'=>array('/site/index')),
array('url'=>array('/goods/'),'label'=>'Товары'),
array('url'=>array('/categories/'),'label'=>'Создать категорию', 'visible'=>Yii::app()->getModule('user')->isAdmin()),
array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Профиль"), 'visible'=>!Yii::app()->user->isGuest),
array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Регистрация"), 'visible'=>Yii::app()->user->isGuest),
array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Вход"), 'visible'=>Yii::app()->user->isGuest),
array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Выход").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),

			),


		));

 ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Punk-shop Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
