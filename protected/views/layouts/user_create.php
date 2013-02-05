<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	$plural_class_name=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ' . $class_name, 'url'=>array('index')),
	array('label'=>'Manage ' . $class_name, 'url'=>array('admin')),
);
?>

<h1>Create <? echo $class_name; ?></h1>

<?php echo $this->renderPartial('/layouts/_user_form', array('model'=>$model)); ?>
