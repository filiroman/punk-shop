

<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Профиль");
$this->breadcrumbs=array(
	UserModule::t("Профиль"),
);
?><h2><?php echo UserModule::t('Ваш профиль'); ?></h2>
<?php echo $this->renderPartial('menu'); ?>


<?php $ava = CHtml::encode($model->avatar);
//var_dump($ava);
echo '<img id="user_img" src='."$ava".'height="220" width="176" />';
?>
<!-- <img src="<?php //$model->getAttributeLabel('img') ?> height="220" width="176"/> -->


<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>
</th>
    <td><?php echo CHtml::encode($model->username); ?>
</td>
</tr>
<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>
<tr>
	<th class="label"><?php echo CHtml::encode(UserModule::t($field->title)); ?>
</th>
    <td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?>
</td>
</tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
?>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</th>
    <td><?php echo CHtml::encode($model->email); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
</th>
    <td><?php echo date("d.m.Y",$model->createtime); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit')); ?>
</th>
    <td><?php echo date("d.m.Y",$model->lastvisit); ?>
</td>
</tr>
<!--<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
</th>
    <td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status));
    ?>
</td>
</tr>-->
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('about')); ?>
</th>
    <td><?php echo CHtml::encode($model->about);
    //var_dump($model->about);
    ?>
</td>
</tr>
</table>
