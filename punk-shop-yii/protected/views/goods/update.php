<?php
$this->breadcrumbs=array(
	'Goods'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Списко товаров', 'url'=>array('index')),
	array('label'=>'Создать товар', 'url'=>array('create')),
	array('label'=>'Просмотр товара', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление товарами', 'url'=>array('admin')),
);
?>

<!--<h1>Обновить товар <?php echo $model->id; ?></h1>-->
<h1>Обновить товар - <?php echo $model->title; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
