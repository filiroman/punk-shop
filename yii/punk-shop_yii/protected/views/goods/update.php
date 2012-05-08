<?php
$this->breadcrumbs=array(
	'Goods'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Goods', 'url'=>array('index')),
	array('label'=>'Create Goods', 'url'=>array('create')),
	array('label'=>'View Goods', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Goods', 'url'=>array('admin')),
);
?>

<h1>Update Goods <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>