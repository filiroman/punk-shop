

<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Профиль");
$this->breadcrumbs=array(
	UserModule::t("Профиль"),
);
?><h2><?php echo UserModule::t('Ваш профиль'); ?></h2>
<div style="position:relative;float:right;right:100px;"><?php echo $this->renderPartial('menu'); ?></div>


<?php $ava = CHtml::encode($model->avatar);
//var_dump($ava);
echo '<img id="user_img" src="img/ava.jpg" height="220" width="176" />';
?>
<!-- <img src="<?php //$model->getAttributeLabel('img') ?> height="220" width="176"/> -->


<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>

<p id="user_name"><?php echo CHtml::encode($model->username); ?></p>


<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>

	

<span><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></span></br>


			<?php
			}//$profile->getAttribute($field->varname)
		}
?>
<p></p>
<p id="user_email"><?php echo CHtml::encode($model->email);?></p>
<p></p>

<span ><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?></span>
<p><?php echo date("d.m.Y",$model->createtime); ?></p>
<span><?php echo CHtml::encode($model->getAttributeLabel('lastvisit')); ?></span>
<p><?php echo date("d.m.Y",$model->lastvisit); ?></p>

<!--<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
</th>
    <td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status));
    ?>
</td>
</tr>-->

	<p><?php echo CHtml::encode($model->getAttributeLabel('about')); ?></p>

    <?php echo CHtml::encode($model->about);
    //var_dump($model->about);
    ?>

