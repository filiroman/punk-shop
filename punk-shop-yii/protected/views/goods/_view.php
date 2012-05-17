<div class="view">

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>-->
	<!--<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>-->
	<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_id')); ?>:</b>
	<?php 
		//создаем переменную для обращения к юзеру из модуля
		$uss=Yii::app()->getModule('user')->user($data->owner_id);
	?>
	<?php echo CHtml::encode($uss->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('actual')); ?>:</b>
	<?php echo CHtml::encode($data->actual); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode(Categories::item('id',$data->category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price.' руб.'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode(Type::item('id',$data->type)); ?>
<img id="user_img" src="/punk-shop/punk-shop-yii/img/ava.jpg" height="220" width="176" />
	<br />
	
<!--<?php // echo $data->img; ?>-->

<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('views')); ?>:</b>
	<?php echo CHtml::encode($data->views); ?>
	<br />-->

</div>
