<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$plural_class_name,
);

$this->menu=array(
	array('label'=>'Create ' . $class_name, 'url'=>array('create')),
	array('label'=>'Manage ' . $class_name, 'url'=>array('admin')),
);
?>

<h1><? echo $plural_class_name; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'/layouts/_user_view',
)); ?>
