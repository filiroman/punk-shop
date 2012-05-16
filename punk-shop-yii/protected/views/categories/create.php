<?php
$this->breadcrumbs=array(
	'Категории'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Управление категориями', 'url'=>array('admin')),
);
?>

<h1>Создать категории</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
