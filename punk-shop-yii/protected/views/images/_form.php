<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'images-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'good_id'); ?>
		<?php echo $form->textField($model,'good_id'); ?>
		<?php echo $form->error($model,'good_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'src'); ?>
		<?php echo $form->textField($model,'src',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'src'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->