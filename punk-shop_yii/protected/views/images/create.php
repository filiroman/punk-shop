<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Images', 'url'=>array('index')),
	array('label'=>'Manage Images', 'url'=>array('admin')),
);
?>

<h1>Create Images</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>