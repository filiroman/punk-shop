<?php
$this->breadcrumbs=array(
	'Categories',
);

$this->menu=array(
	array('label'=>'Create Categories', 'url'=>array('create')),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
?>

<h1>Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
