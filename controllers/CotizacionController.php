<?php

namespace app\controllers;

use Yii;
use app\models\cotizacion;
use app\models\requisicion;
use app\models\DetalleRequisicion;
use app\models\cotizacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\mssql\PDO;
/**
 * CotizacionController implements the CRUD actions for cotizacion model.
 */
class CotizacionController extends Controller
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
     * Lists all cotizacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new cotizacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single cotizacion model.
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
     * Creates a new cotizacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        
        $model = new Cotizacion;
        if(isset($_POST['Cotizacion']) && isset($_POST['detalle']))
        {
            //echo '<pre>';print_r($_POST);echo '</pre>';exit;
         try
         {
        $cotizacion = $_POST['Cotizacion'];
        $conection = Yii::$app->db;
    $transaction = $conection->beginTransaction();
    $comandoCotizacion = $conection->createCommand("INSERT INTO Cotizacion
     (folio, fecha_f, cliente_did, porcentaje,
     comentarios, estatus_did, requisicion_did,usuario_aid, empresa_did, subtotal, iva, total)
     VALUES (:folio, :fecha_f, :cliente_did, :porcentaje,
     :comentarios, :estatus_did, :requisicion_did, :usuario_aid, :empresa_did, :subtotal, :iva, :total)");
    $comandoCotizacion->bindValue(":folio", $cotizacion['folio'],PDO::PARAM_STR);
    $comandoCotizacion->bindValue(":fecha_f",$cotizacion['fecha_f'],PDO::PARAM_STR);
    $comandoCotizacion->bindValue(":cliente_did",$cotizacion['cliente_did'],PDO::PARAM_INT);
    $comandoCotizacion->bindValue(":porcentaje",$cotizacion['porcentaje'],PDO::PARAM_INT);
    $comandoCotizacion->bindValue(":comentarios",$cotizacion['comentarios'],PDO::PARAM_STR);
    $comandoCotizacion->bindValue(":estatus_did",1,PDO::PARAM_INT);
    $comandoCotizacion->bindValue(":requisicion_did",$id,PDO::PARAM_INT);
    $comandoCotizacion->bindValue(":empresa_did",Yii::$app->session->get('empresa_did'),PDO::PARAM_INT);
    $comandoCotizacion->bindValue(":usuario_aid",Yii::$app->user->id,PDO::PARAM_INT);
    $comandoCotizacion->bindValue(":subtotal",$cotizacion['subtotal'],PDO::PARAM_INT);
    $comandoCotizacion->bindValue(":iva",$cotizacion['iva'],PDO::PARAM_INT);
    $comandoCotizacion->bindValue(":total",$cotizacion['total'],PDO::PARAM_INT);
    if($comandoCotizacion->execute())
    {
     $cotizacionId = Cotizacion::find()->orderBy("id DESC")->one();

     $detalleCotizacion = $_POST['detalle'];
     foreach($detalleCotizacion as $detalle)
     {
      $comandoDetalle = $conection->createCommand("INSERT INTO DetalleCotizacion
       (proveedor_aid, cantidad, articulo_aid, comentarios, estatus_did, cotizacion_did, importe, preciounitario, preciounitariofinal, porcentaje)
       VALUES(:proveedor_aid, :cantidad, :articulo_aid, :comentarios, :estatus_did, :cotizacion_did, :importe , :preciounitario, :preciounitariofinal, :porcentaje)");
      $comandoDetalle->bindValue(":proveedor_aid",$detalle['proveedor'],PDO::PARAM_STR);
      $comandoDetalle->bindValue(":cantidad", $detalle['cantidad'],PDO::PARAM_STR);
      $comandoDetalle->bindValue(":articulo_aid",$detalle['articulo'],PDO::PARAM_STR);
      $comandoDetalle->bindValue(":comentarios",$detalle['comentarios'],PDO::PARAM_STR);
      $comandoDetalle->bindValue(":estatus_did",1,PDO::PARAM_INT);
      $comandoDetalle->bindValue(":cotizacion_did",$cotizacionId->id,PDO::PARAM_INT);
      $comandoDetalle->bindValue(":importe", $detalle['importe'],PDO::PARAM_INT);
      $comandoDetalle->bindValue(":preciounitario", $detalle['precioUnitario'],PDO::PARAM_STR);
      $comandoDetalle->bindValue(":preciounitariofinal", $detalle['precioFinal'],PDO::PARAM_STR);
      $comandoDetalle->bindValue(":porcentaje", $detalle['porcentaje'],PDO::PARAM_INT);
      $comandoDetalle->execute();
     }
    }
    $transaction->commit();
   }
   catch(Exception $e)
   {
    $transaction->rollBack();
       }
        return $this->redirect(['index']);
        } else {
            $cotizacion = Requisicion::find()->where('id=:id',['id'=>$id])->one();
            $model->folio = $cotizacion->folio;
            $model->cliente_did = $cotizacion->cliente_did;
            $model->fecha_f = date("Y-m-d");
            $detalle = DetalleRequisicion::find()->asArray()->where("requisicion_did = " . $id)->all();
            return $this->render('create', [
                'model' => $model,
                'detalle' => $detalle,
            ]);
        }
    }

    /**
     * Updates an existing cotizacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $detalle = DetalleCotizacion::find()->asArray()->where("cotizacion_did = " . $id)->all();
            return $this->render('update', [
                'model' => $model,
                'detalle' => $detalle,
            ]);
        }
    }

    /**
     * Deletes an existing cotizacion model.
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
     * Finds the cotizacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return cotizacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = cotizacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
