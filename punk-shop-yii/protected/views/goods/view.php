<?php
$this->breadcrumbs=array(
	'Объявления'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список объявлений', 'url'=>array('index')),
	array('label'=>'Создать объявление', 'url'=>array('create')),
	array('label'=>'Обновить объявление', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить объявление', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление объявлениями', 'url'=>array('admin')),
);
?>

<!--<h1>Объявление № <?php echo $model->id; ?> -<?php echo $model->title; ?> </h1> -->
<h1><?php echo $model->title; ?> </h1>

<?php 
//создаем переменную для обращения к юзеру из модуля
$uss=Yii::app()->getModule('user')->user($model->owner_id);

//строим наш виджет, показывающий товар
//$model->getAttributeLabel('owner_id') - так обращаемся к соответвию названий мд табличными и заданными (owner_id = Владелец)
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		'label'=>$model->getAttributeLabel('owner_id'),
		'value'=>$uss->username,
		),
		array(
		'label'=>$model->getAttributeLabel('date'),
		'value'=>$model->date,
		),
		//array(
		//'label'=>'Актуальность',
		//'value'=>$model->actual,
		//),
		array(
		'label'=>$model->getAttributeLabel('category_id'),
		'value'=>Categories::item('id',$model->category_id),
		),
		array(
		'label'=>$model->getAttributeLabel('title'),
		'value'=>$model->title,
		),
		array(
		'label'=>$model->getAttributeLabel('description'),
		'value'=>$model->description,
		),
		array(
		'label'=>$model->getAttributeLabel('price'),
		'value'=>$model->price,
		),
		array(
		'label'=>$model->getAttributeLabel('type'),
		'value'=>Type::item('id',$model->type),
		),
		//array(
		//'label'=>'Количество просмотров',
		//'value'=>$model->views,
		//),
		array(
		'label'=>'Фото',
		'type'=>'image',
		'value'=>Yii::app()->baseUrl."/img/".'pic1.jpg',
		), 
	),
));
 ?>
