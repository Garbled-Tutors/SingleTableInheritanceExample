<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	$plural_class_name=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ' . $class_name, 'url'=>array('index')),
	array('label'=>'Create ' . $class_name, 'url'=>array('create')),
	array('label'=>'View ' . $class_name, 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ' . $class_name, 'url'=>array('admin')),
);
?>

<h1>Update <?php echo $class_name . ' ' . $model->id; ?></h1>

<?php echo $this->renderPartial('/layouts/_user_form', array('model'=>$model)); ?>
