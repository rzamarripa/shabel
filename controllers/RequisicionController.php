<?php

namespace app\controllers;

use Yii;
use app\models\Requisicion;
use app\models\RequisicionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\mssql\PDO;
use app\models\DetalleRequisicion;
use kartik\mpdf\Pdf;

/**
 * RequisicionController implements the CRUD actions for Requisicion model.
 */
class RequisicionController extends Controller
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
     * Lists all Requisicion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Requisicion();
        $model->fecha_f = date("Y-m-d");
        $requisiciones = Requisicion::find()->all();
        return $this->render('index', [
            'model'=>$model,'requisiciones'=>$requisiciones
        ]);
    }

    /**
     * Displays a single Requisicion model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Requisicion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
	    
	
                                                                                                            
		
        $model = new Requisicion();
       

        if(isset($_POST['Requisicion']) && isset($_POST['detalle']))
        {
         try
         {
        $requisicion = $_POST['Requisicion'];
        $conection = Yii::$app->db;
    $transaction = $conection->beginTransaction();
    $comandoRequisicion = $conection->createCommand("INSERT INTO Requisicion
     (folio, fecha_f, cliente_did, departamento,
     comentarios, estatus_did, usuario_aid)
     VALUES (:folio, :fecha_f, :cliente_did, :departamento,
     :comentarios, :estatus_did, :usuario_aid)");
    $comandoRequisicion->bindValue(":folio", $requisicion['folio'],PDO::PARAM_STR);
    $comandoRequisicion->bindValue(":fecha_f",$requisicion['fecha_f'],PDO::PARAM_STR);
    $comandoRequisicion->bindValue(":cliente_did",$requisicion['cliente_did'],PDO::PARAM_INT);
    $comandoRequisicion->bindValue(":departamento",$requisicion['departamento'],PDO::PARAM_STR);
    $comandoRequisicion->bindValue(":comentarios",$requisicion['comentarios'],PDO::PARAM_STR);
    $comandoRequisicion->bindValue(":estatus_did",1,PDO::PARAM_INT);
    $comandoRequisicion->bindValue(":usuario_aid",Yii::$app->user->id,PDO::PARAM_INT);
    if($comandoRequisicion->execute())
    {
     $requisicionId = Requisicion::find()->orderBy("id DESC")->one();

     $detalleRequisicion = $_POST['detalle'];
     foreach($detalleRequisicion as $detalle)
     {
      $comandoDetalle = $conection->createCommand("INSERT INTO DetalleRequisicion
       (cantidad, articulo_aid, comentarios, estatus_did, requisicion_did)
       VALUES(:cantidad, :articulo_aid, :comentarios, :estatus_did, :requisicion_did)");
      $comandoDetalle->bindValue(":cantidad", $detalle['cantidad'],PDO::PARAM_STR);
      $comandoDetalle->bindValue(":articulo_aid",$detalle['articulo'],PDO::PARAM_STR);
      $comandoDetalle->bindValue(":comentarios",$detalle['comentarios'],PDO::PARAM_STR);
      $comandoDetalle->bindValue(":estatus_did",1,PDO::PARAM_INT);
      $comandoDetalle->bindValue(":requisicion_did",$requisicionId->id,PDO::PARAM_STR);
      $comandoDetalle->execute();
     }
    }
    $conection->createCommand("insert into Actividad (descripcion, usuario) Values ('Ha creado una requisición', '" . Yii::$app->user->id . "')")->execute();
    $transaction->commit();
    if(isset($_GET["p"]))
     $this->redirect(array('proyecto/view','id'=>$_GET["p"]));
    $this->redirect(array('index'));
   }
   catch(Exception $e)
   {
    $transaction->rollBack();

    echo '<pre>';print_r($e); echo "</pre>";
    echo '<pre>';print_r($_POST); echo "</pre>";
    exit;
       }
      }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
		$detalle = DetalleRequisicion::find()->asArray()->where("requisicion_did = " . $id)->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'detalle'=> $detalle,
            ]);
        }
    }

    /**
     * Deletes an existing Requisicion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Requisicion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Requisicion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Requisicion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new Requisicion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionAutocompletesearch()
	{
	    $q = "%". $_GET['term'] ."%";
			$result = array();
	    if (!empty($q))
	    {
			$criteria=new CDbCriteria;
			$criteria->select=array('id', "CONCAT_WS(' ',nombre) as nombre");
			$criteria->condition="lower(CONCAT_WS(' ',nombre)) like lower(:nombre) ";
			$criteria->params=array(':nombre'=>$q);
			$criteria->limit='10';
	       	$cursor = Requisicion::model()->findAll($criteria);
			foreach ($cursor as $valor)
				$result[]=Array('label' => $valor->nombre,
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
    public function actionImprimir($id) {
    // get your HTML raw content without any layouts or scripts
        $requisicion = Requisicion::find()->where('id = :id',['id'=>$id])->one();
        $detalleRequisicion = detalleRequisicion::find()->where('requisicion_did = :id',['id'=>$id])->all();
        $pdf = Yii::$app->pdf;
        $pdf->cssFile = Yii::getAlias('@vendor') . "/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css";
        $pdf->content = $this->renderPartial('_imprimir',['detalleRequisicion'=>$detalleRequisicion,'requisicion'=>$requisicion]);
        return $pdf->render();
    }
}
