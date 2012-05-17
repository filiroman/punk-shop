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
	

	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	 <script>
		$(document).ready(function() {
		/* This is basic - uses default settings */
		  $("a.single_image").fancybox();
		/* Apply fancybox to multiple items */
		  $("a.group").fancybox({
			'transitionIn'  :  'elastic',
			'transitionOut'  :  'elastic',
			'speedIn'    :  600, 
			'speedOut'    :  200, 
			'overlayShow'  :  false
		  });
		});
	</script>
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
					<?php
						$arr = Categories::items('id');
						//var_dump($arr);
						echo "<select id='search_category' name='category' size='1'>
								<option selected='selected' value='default'>Во всех категориях</option>";
						foreach ($arr as $value){
							echo "<option value='$value'>$value</option>";
							
						//Категории  в списке поиска
						
						}
						echo" </select>";
					?>
					<input id="search_button" type="submit" value="Искать">
				</form>
			</div>
		</div>
	</div><!-- header -->

<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(

//array('label'=>'Главная', 'url'=>array('/site/index')),
array('url'=>array('/goods/'),'label'=>'Объявления'),
array('url'=>array('/categories/'),'label'=>'Категории', 'visible'=>Yii::app()->getModule('user')->isAdmin()),
array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Личный кабинет"), 'visible'=>!Yii::app()->user->isGuest),
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
		Copyright &copy; <?php echo date('Y'); ?> webspsu.<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>

</html>
