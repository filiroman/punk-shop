<div class="view">
	
	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>-->
	<!--<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>-->
	
	<a href=""><img class="item_img" src=""></a>
	<p class="item_category"><?php echo CHtml::encode(Categories::item('id',$data->category_id)); ?></p>
	
	<p class="item_name"><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></p>
	
	<?php $uss=Yii::app()->getModule('user')->user($data->owner_id); ?>
	
	<p class="item_date"><?php echo CHtml::encode($data->date); ?></p>
	
	<p class="item_author"><?php echo CHtml::encode($uss->username); ?></p>
	
	<p class="item_price">Цена: <span style="font-size:15px;font-weight:bold"><?php echo CHtml::encode($data->price); ?></span> руб.</p>
		
	<p class="item_description"><?php echo CHtml::encode($data->description); ?></p>
	
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode(Type::item('id',$data->type)); ?>
	<br />
	<!--<img id="user_img" src="/punk-shop/punk-shop-yii/img/ava.jpg" height="220" width="176" />-->
	<?php
	// echo $data->img; 
	?>

<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('views')); ?>:</b>
	<?php echo CHtml::encode($data->views); ?>
	<br />-->
	
</div>
