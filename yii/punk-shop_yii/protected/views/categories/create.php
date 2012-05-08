<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
?>

<h1>Create Categories</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>