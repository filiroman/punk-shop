<?php
$this->breadcrumbs=array(
	'Объявления',
);

$this->menu=array(
	array('label'=>'Создать объявление', 'url'=>array('create')),
	array('label'=>'Управление объявлениями', 'url'=>array('admin')),
);
?>

<h1>Объявления</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
