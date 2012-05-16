<?php
$this->breadcrumbs=array(
	'Категории'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'Create Categories', 'url'=>array('create')),
	array('label'=>'Update Categories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Categories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
    //RUS
    //	array('label'=>'Список категорий', 'url'=>array('index')),
//	array('label'=>'Создать категории', 'url'=>array('create')),
//	array('label'=>'Обновить категории', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Удалить категории', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Управление категориями', 'url'=>array('admin')),
);
?>

<h1>Просмотр Категорий #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
