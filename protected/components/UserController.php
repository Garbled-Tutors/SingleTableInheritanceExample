<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('/layouts/user_view',array(
			'model'=>$this->loadModel($id),
			'class_name'=>$this->class_name,
			'plural_class_name'=>$this->plural_class_name,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new $this->class_name;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST[$this->class_name]))
		{
			$model->attributes=$_POST[$this->class_name];
			$model->role = $this->lower_case_class_name;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('/layouts/user_create',array(
			'model'=>$model,
			'plural_class_name'=>$this->plural_class_name,
			'class_name'=>$this->class_name
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))//TODO: Figure how how to change this to Student, Teacher or Admin depending on which child class is being used
		{
			$model->attributes=$_POST['User'];
			$model->role = $this->lower_case_class_name;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('/layouts/user_update',array(
			'model'=>$model,
			'class_name' => $this->class_name,
			'lower_case_class_name' => $this->lower_case_class_name,
			'plural_class_name' => $this->plural_class_name,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider($this->class_name);
		$this->render('/layouts/user_index',array(
			'dataProvider'=>$dataProvider,
			'class_name' => $this->class_name,
			'lower_case_class_name' => $this->lower_case_class_name,
			'plural_class_name' => $this->plural_class_name,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new $this->class_name('/layouts/user_search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[$this->class_name]))
			$model->attributes=$_GET[$this->class_name];

		$this->render('/layouts/user_admin',array(
			'model'=>$model,
			'class_name'=>$this->class_name,
			'plural_class_name'=>$this->plural_class_name,
			'lower_case_class_name'=>$this->lower_case_class_name,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Teacher the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$class = $this->class_name;
		$model = $class::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Teacher $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']=== ($this->lower_case_class_name . '-form') )
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
