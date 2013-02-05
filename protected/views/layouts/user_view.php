<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	$plural_class_name=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ' . $class_name, 'url'=>array('index')),
	array('label'=>'Create ' . $class_name, 'url'=>array('create')),
	array('label'=>'Update ' . $class_name, 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ' . $class_name, 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ' . $class_name, 'url'=>array('admin')),
);
?>

<h1>View <?php echo $class_name . ' #' . $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'role',
		'password_hash',
	),
)); ?>
