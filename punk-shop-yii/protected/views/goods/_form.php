<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'goods-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, являются обязательными.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--</div class="row">
		<?php //echo $form->labelEx($model,'owner_id'); ?>
		<?php //echo $form->textField($model,'owner_id'); ?>
		<?php //echo $form->error($model,'owner_id'); ?>
	</div>-->

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'date'); ?>
		<?php //echo $form->textField($model,'date'); ?>
		<?php //echo $form->error($model,'date'); ?>
	</div>-->

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'actual'); ?>
		<?php //echo $form->textField($model,'actual'); ?>
		<?php //echo $form->error($model,'actual'); ?>
	</div>-->
        <div class="row">
		<?php echo $form->labelEx($model,'Тип объявления'); ?>
		<?php echo $form->dropDownList($model,'type', Type::items('id')); ?> 
		<?php echo $form->error($model,'type'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'Заголовок объявления'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
        
	<div class="row">
      <?php echo $form->labelEx($model,'Категория'); ?>
      <?php echo $form->dropDownList($model,'category_id',  Categories::items('id')); ?>
      <?php echo $form->error($model,'category'); ?>
	</div>
	
	<div class="row">
		<?php $this->widget('CMultiFileUpload', array(
            'name' => 'Images',
            'accept' => 'jpeg|jpg|gif|png',
				'max' => 5,
            'duplicate' => 'Duplicate file', 
            'denied' => 'Invalid file type',
		)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Описание'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Цена:'); ?>
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'price'); ?>
                <?php echo "р."?>
	</div>

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'views'); ?>
		<?php //echo $form->textField($model,'views'); ?>
		<?php //echo $form->error($model,'views'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Отправить' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
