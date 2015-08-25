<?php

namespace app\controllers;

use Yii;
use app\models\Articulo;
use app\models\ArticuloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpleadoController implements the CRUD actions for Empleado model.
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
     * Lists all Empleado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model= new Articulo();
        $model->estatus_did = 1;
        //$model->fechaCreacion_ft =date('Y-m-d H:i:s');
        $Articulo = Articulo::find()->all();
        if (isset($_POST['Articulo'])){
            $model->load(Yii::$app->request->post());
            //echo "<pre>"; print_r($model); echo "</pre>"; exit;
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('index', ['model'=>$model,'Articulo'=>$Articulo]);
        }
    }

    /**
     * Displays a single Empleado model.
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
     * Creates a new Empleado model.
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
    
    public function actionCambiar(){

        $model = Articulo::find()->where('id=:id', ['id'=>$_GET["id"]])->one();
        
        $model->estatus_did = $_GET['estatus'];
        if($model->save()){
            return $this->redirect(['index']);
        }
    }


    /**
     * Updates an existing Empleado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
     public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('_form', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Empleado model.
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
     * Finds the Empleado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empleado the loaded model
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
    
    public function actionGetajax() {
			$id = $_GET['id'];
			$model = $this->loadModel($id);
			
			$result = array(
				'id' => $model->id,
				'text' => $model->nombre,
				'unidad' => $model->unidad
			);
			echo json_encode($result);
			Yii::$app->end();
		}
		
		public function actionAutocompletesearch()
		{
	    $q = "%". $_GET['term'] ."%";
			$result = array();
	    if (!empty($q))
	    {
				/*
					$criteria=new CDbCriteria;
					$criteria->select=array('id', "CONCAT_WS(' ',nombre) as nombre");				
					$criteria->condition="lower(CONCAT_WS(' ',nombre)) like lower(:nombre) ";
					$criteria->params=array(':nombre'=>$q);
					$criteria->limit='10';
				*/
		    $cursor = Articulo::find()->where("lower(CONCAT_WS(' ',nombre)) like lower(:nombre)",[":nombre"=>$q])->all();
				foreach ($cursor as $valor)	
				//print_r($valor);
				
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' 		=> $valor->id, 
				                'unidad'=> $valor->unidad);
	    }
	    echo json_encode($result);
			exit;
		}
		
/*
		public function actionAutocompletar($search = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select('id as id, nombre AS nombre')
                ->from('Articulo')
                ->where('nombre LIKE "%' . $search .'%"')
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => SubclaseIncidente::findOne($id)->subclase_incidente_nombre];
        }
        else {
            $out['results'] = ['id' => 0, 'text' => 'No se encontraron resultados para subclase'];
        }
        echo Json::encode($out);
    }
*/
		
		public function loadModel($id)
		{
			$model = Articulo::find()->where("id = " . $id)->one();
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}
}
?>