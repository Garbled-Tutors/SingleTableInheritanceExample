<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => $this->form_name,
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model,'password_repeat',array('size'=>60)); ?>
		<?php echo $form->error($model,'password_repeat'); ?>
	</div>

	<?php if ($this->gather_personal_information) { ?>
		<div class="row">
			<?php echo $form->labelEx($model,'first_name'); ?>
			<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>60)); ?>
			<?php echo $form->error($model,'first_name'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'last_name'); ?>
			<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>60)); ?>
			<?php echo $form->error($model,'last_name'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'address'); ?>
			<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>60)); ?>
			<?php echo $form->error($model,'address'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'city'); ?>
			<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>60)); ?>
			<?php echo $form->error($model,'city'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'state'); ?>
			<?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
			<?php echo $form->error($model,'state'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'zip'); ?>
			<?php echo $form->textField($model,'zip',array('size'=>5,'maxlength'=>5)); ?>
			<?php echo $form->error($model,'zip'); ?>
		</div>
	<?php } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
