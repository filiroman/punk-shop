<?php
$this->breadcrumbs=array(
	'Goods',
);

$this->menu=array(
	array('label'=>'Создать товар', 'url'=>array('create')),
	array('label'=>'Управление товаром', 'url'=>array('admin')),
);
?>

<h1>Товары</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
