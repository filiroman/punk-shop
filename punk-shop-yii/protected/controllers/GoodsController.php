<?php

class GoodsController extends Controller
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
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','update'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Goods;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		// Создает директорию для изображений
		if(!is_dir(Yii::getPathOfAlias('webroot').'/img/Goods')) 
		{
			mkdir(Yii::getPathOfAlias('webroot').'/img/Goods', 0755);
		}

		if(isset($_POST['Goods']))
		{
			$model->attributes=$_POST['Goods'];
			$images = CUploadedFile::getInstancesByName('Images');
			
			$succ = $model->save();
			
			if (isset($images) && count($images) > 0) {
			
                // Сохраняем каждое изображение
                foreach ($images as $image => $pic) {
                    $file = /*Yii::getPathOfAlias('webroot').'/img/Goods/'.*/ $model->id.'_'.$pic->name;
                    //echo $file;
                    //die();
                    if ($pic->saveAs($file)) {
                        
                        $img_add = new Images;
                        $img_add->src = $file;
                        $img_add->good_id = $model->id; 
                        $img_add->save(); // DONE
                    }
                    //else
                        // handle the errors here, if you want
                }
         }
			if($succ)
				$this->redirect(array('view','id'=>$model->id));
		}
				
		$this->render('create',array(
			'model'=>$model,
		));
	}
	/*public function actionCreate(){
        $model=new Images;
        if(isset($_POST['Images'])){
            $model->attributes=$_POST['Images'];
            $model->image=CUploadedFile::getInstance($model,'image');
            if($model->save()){
                $model->image->saveAs('../');
                // перенаправляем на страницу, где выводим сообщение об
                // успешной загрузке
            }
        }
        $this->render('create', array('model'=>$model));
    }*/

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
		
		// Создает директорию для изображений
		if(!is_dir(Yii::getPathOfAlias('webroot').'/img/Goods')) 
		{
			mkdir(Yii::getPathOfAlias('webroot').'/img/Goods', 0755);
		}

		if(isset($_POST['Goods']))
		{
			$model->attributes=$_POST['Goods'];
			$images = CUploadedFile::getInstancesByName('images');
			
			if (isset($images) && count($images) > 0) {
			
                // Сохраняем каждое изображение
                foreach ($images as $image => $pic) {
                    $file = Yii::getPathOfAlias('webroot').'/img/Goods/'.$model->id.'_'.$pic->name;
                    if ($pic->saveAs($file)) {
                        
                        $img_add = new Images();
                        $img_add->src = $file;
                        $img_add->good_id = $model->id; 
 
                        $img_add->save(); // DONE
                    }
                    //else
                        // handle the errors here, if you want
                }
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		    }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//Сначала мы создаём критерий запроса для получения списка записей.
                // Критерий включает
                //  сортировку по времени их обновления в обратном порядке
                $criteria=new CDbCriteria(array(
                    'order'=>'date DESC',
                 ));
                //Используя критерий мы создаём провайдер данных, нужный для трёх целей. 
                //Во-первых, он занимается постраничной разбивкой данных. 
                //Мы задаём количество результатов на страницу равным 5. 
                //Во-вторых, данные сортируются в соответствии с запросом пользователя. 
                //И, наконец, провайдер отдаёт разбитые на страницы отсортированные данные
                // виджетам или отображению.
		$dataProvider=new CActiveDataProvider('Goods',array(
                                'pagination'=>array(
                                'pageSize'=>5,
                                 ),
                                'criteria'=>$criteria,
                ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Goods('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Goods']))
			$model->attributes=$_GET['Goods'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Goods::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='goods-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
