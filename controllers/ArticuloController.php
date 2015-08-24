<?php

namespace app\controllers;

use Yii;
use app\models\Articulo;
use app\models\ArticuloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticuloController implements the CRUD actions for Articulo model.
 */
class ArticuloController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Articulo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticuloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articulo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Articulo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articulo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Articulo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Articulo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Articulo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articulo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articulo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionAutocompletesearch()
		{
		    $q = "%". $_GET['term'] ."%";
		 	$result = array();
		    if (!empty($q))
		    {
				$criteria=new CDbCriteria;
				//$criteria->select=array('id', "CONCAT_WS(' ',nombre) as nombre");
				$criteria->condition="lower(CONCAT_WS(' ',nombre)) like lower(:nombre) ";
				$criteria->params=array(':nombre'=>$q);
				$criteria->limit='10';
		       	$cursor = Articulo::model()->findAll($criteria);
				foreach ($cursor as $valor)	
					//print_r($valor);
					$result[]=Array('label' => $valor->nombre,  
					                'value' => $valor->nombre,
					                'id' => $valor->id, 
					                'unidad' => $valor->unidad);
		    }
		    echo json_encode($result);
		    Yii::app()->end();
		}
    
    public function actionGetajax() {
			$id = $_GET['id'];
			$model = $this->loadModel($id);
			$result = array(
				'id' => $model->id,
				'text' => $model->nombre,
				'unidad' => $model->unidad
			);
			echo json_encode($result);
			Yii::app()->end();
		}
}
