<?php
$this->breadcrumbs=array(
	'Объявления'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Списко объявлений', 'url'=>array('index')),
	array('label'=>'Управление объявлениями', 'url'=>array('admin')),
);
?>

<h1>Create Goods</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
