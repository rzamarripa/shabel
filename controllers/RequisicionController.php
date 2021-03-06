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
use app\models\ReqPorProveedor;
use app\models\Proveedor;
use yii\helpers\ArrayHelper;

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
        $requisiciones = Requisicion::find()->where('empresa_did=:empresaId',['empresaId'=>Yii::$app->session->get('empresa_did')])->all();
        return $this->render('index', [
            'model'=>$model,'requisiciones'=>$requisiciones
        ]);
    }
  
  /* public function actionCotizacion($requisicion_did){
        $model= new requisicion();
        $model->requisicion_did = $requisicion_did;
$requisicion = requisicion::find()->where('requisicion_did = :requisicion_did',['requisicion_did'=>$requisicion_did])->all();
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $id = $model->id;
           $model= new requisicion();
            return $this->redirect(['requisicion', 'model' => $model, 'requisicion'=>$requisicion,'id' => $id,'id'=> $id]);
        } else {
            return $this->render('requisicion', ['model'=>$model,'requisicion'=>$requisicion]);
        }
    }
}



 

    /**
     * Displays a single Requisicion model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $detalleRequisicion = detalleRequisicion::find()->where('requisicion_did = :id',['id'=>$id])->all();
        return $this->render('view', [
					'requisicion' => $this->findModel($id),
					'detalleRequisicion'=>$detalleRequisicion]
				);
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
     comentarios, estatus_did, usuario_aid, empresa_did)
     VALUES (:folio, :fecha_f, :cliente_did, :departamento,
     :comentarios, :estatus_did, :usuario_aid, :empresa_did)");
    $comandoRequisicion->bindValue(":folio", $requisicion['folio'],PDO::PARAM_STR);
    $comandoRequisicion->bindValue(":fecha_f",$requisicion['fecha_f'],PDO::PARAM_STR);
    $comandoRequisicion->bindValue(":cliente_did",$requisicion['cliente_did'],PDO::PARAM_INT);
    $comandoRequisicion->bindValue(":departamento",$requisicion['departamento'],PDO::PARAM_STR);
    $comandoRequisicion->bindValue(":comentarios",$requisicion['comentarios'],PDO::PARAM_STR);
    $comandoRequisicion->bindValue(":estatus_did",1,PDO::PARAM_INT);
    $comandoRequisicion->bindValue(":usuario_aid",Yii::$app->user->id,PDO::PARAM_INT);
    $comandoRequisicion->bindValue(":empresa_did",Yii::$app->session->get('empresa_did'),PDO::PARAM_INT);
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
       }
      }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(isset($_POST['Requisicion']))
        {
            $conection = Yii::$app->db;
            try
            {
                $requisicion = $_POST['Requisicion'];
                $conection = Yii::$app->db;
                $transaction = $conection->beginTransaction();
                $comandoRequisicion = $conection->createCommand("UPDATE Requisicion SET
                    folio = :folio,
                    fecha_f = :fecha_f,
                    cliente_did = :cliente_did,
                    departamento = :departamento,
                    comentarios = :comentarios,
                    estatus_did = :estatus_did,
                    usuario_aid = :usuario_aid,
                    empresa_did = :empresa_did
                    WHERE id = " . $id);
                $comandoRequisicion->bindValue(":folio", $requisicion['folio'],PDO::PARAM_STR);
                $comandoRequisicion->bindValue(":fecha_f",$requisicion['fecha_f'],PDO::PARAM_STR);
                $comandoRequisicion->bindValue(":cliente_did",$requisicion['cliente_did'],PDO::PARAM_INT);
                $comandoRequisicion->bindValue(":departamento",$requisicion['departamento'],PDO::PARAM_STR);
                $comandoRequisicion->bindValue(":comentarios",$requisicion['comentarios'],PDO::PARAM_STR);
                $comandoRequisicion->bindValue(":estatus_did",$requisicion['estatus_did'],PDO::PARAM_INT);
                $comandoRequisicion->bindValue(":usuario_aid",$requisicion['usuario_aid'],PDO::PARAM_INT);
                $comandoRequisicion->bindValue(":empresa_did",Yii::$app->session->get('empresa_did'),PDO::PARAM_INT);
                $comandoRequisicion->execute();
                    $detalleRequisicion = $_POST['detalle'];
                    $comandoEliminaDetalle = $conection->createCommand("DELETE FROM DetalleRequisicion WHERE requisicion_did = " . $id);
                    $comandoEliminaDetalle->execute();
                    foreach($detalleRequisicion as $detalle)
                    {
                        $comandoInsertaDetalle = $conection->createCommand("INSERT INTO DetalleRequisicion
                            (cantidad, articulo_aid, comentarios, requisicion_did)
                            VALUES(:cantidad, :articulo_aid, :comentarios, :requisicion_did)");
                        $comandoInsertaDetalle->bindValue(":cantidad", $detalle['cantidad'],PDO::PARAM_STR);
                        $comandoInsertaDetalle->bindValue(":articulo_aid",$detalle['articulo'],PDO::PARAM_STR);
                        $comandoInsertaDetalle->bindValue(":comentarios",$detalle['comentarios'],PDO::PARAM_STR);
                        $comandoInsertaDetalle->bindValue(":requisicion_did",$id,PDO::PARAM_STR);
                        $comandoInsertaDetalle->execute();
                    }

                $conection->createCommand("INSERT INTO Actividad (descripcion, usuario) Values ('Ha actualizado una requisición', '" . Yii::$app->user->id . "')")->execute();
                $transaction->commit();
                $this->redirect(array('view','id'=>$id));
            }
            catch(Exception $e)
            {
                echo '<pre>';print_r($e); echo "</pre>";
                exit;
                $transaction->rollBack();
                Yii::$app->user->setFlash('warning', '<strong>Hubo un error al actualizar la requisición!</strong>');
            }
        }else{
        $detalle = DetalleRequisicion::find()->asArray()->where("requisicion_did = " . $id)->all();
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
        $pdf->content = $this->renderPartial('_imprimir',['detalleRequisicion'=>$detalleRequisicion,'requisicion'=>$requisicion]);
        return $pdf->render();
    }
    public function actionEnviarRequisicion($id)
    {

        $model = new ReqPorProveedor;
        if(isset($_POST['proveedor'])){
            $proveedores = $_POST['proveedor'];
            foreach ($proveedores as $proveedor) {
                $model = new ReqPorProveedor;
                $model->requisicion_did = $id;
                $model->proveedor_did = $proveedor;
                $model->save();
            }
            return $this->redirect(['requisicion/index']); 
        }
        $data = ArrayHelper::map(Proveedor::find()->asArray()->all(), 'id', 'nombre');
        return $this->render('enviar-requisicion',['model'=>$model,'data'=>$data,'id'=>$id]);
    }
}
