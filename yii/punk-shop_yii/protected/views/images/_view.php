<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_id')); ?>:</b>
	<?php echo CHtml::encode($data->good_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('src')); ?>:</b>
	<?php echo CHtml::encode($data->src); ?>
	<br />


</div>