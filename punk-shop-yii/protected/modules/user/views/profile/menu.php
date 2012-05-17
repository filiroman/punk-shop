<ul class="actions">
<?php 
if(UserModule::isAdmin()) {
?>
<li><?php echo CHtml::link(UserModule::t('Управление позьзователем'),array('/user/admin')); ?></li>
<?php 
} else {
?>
<li><?php echo CHtml::link(UserModule::t('Список пользователей'),array('/user')); ?></li>
<?php
}
?>
<li><?php echo CHtml::link(UserModule::t('Профиль'),array('/user/profile')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Редактировать'),array('edit')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Изменить пароль'),array('changepassword')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Выход'),array('/user/logout')); ?></li>
</ul>