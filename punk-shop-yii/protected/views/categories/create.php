<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Управление категориями', 'url'=>array('admin')),
);
?>

<h1>Create Categories</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>