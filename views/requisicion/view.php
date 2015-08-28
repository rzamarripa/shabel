<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Requisicion */

$this->title = "Requisición";
$this->params['breadcrumbs'][] = ['label' => 'Requisición', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requisicion-view">

    <h1><?= "Requisición: " . Html::encode($model->folio) . " de " . Html::encode($model->cliente->nombre) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /* Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'folio',
            [
	            "attribute"=>"fecha_f",
	            "value"=>date("d-m-Y", strtotime($model->fecha_f)),
            ],
            [
	            "attribute"=>"cliente_did",
	            "value"=>$model->cliente->nombre,
            ],
            'departamento',
            'comentarios:ntext',
            [
	            "attribute"=>"estatus_did",
	            "value"=>$model->estatus->nombre,
            ],
            [
	            "attribute"=>"usuario_aid",
	            "value"=>$model->usuario->username,
            ],
        ],
    ]) ?>
    
    
    <table class="table table-striped table-bordered tabla dt-responsive nowrap" cellspacing="0" width="100%">
		  <thead>
		    <tr>
		      <th>Cantidad</th>
		      <th>Artículo</th>
		      <th>Comentarios</th>            
		      <th>Acciones</th>   
		    </tr>
		  </thead>
		  <tbody>
		    <?php foreach ($detalle as $req) { ?> 
		    <tr>
		      <td><?= $req->cantidad ?></td>
		      <td><?= $req->articulo->nombre ?></td>
		      <td><?= $req->comentarios ?></td>
		      <td>
		      	<?= Html::a('<span class="fa fa-pencil"></span>',['requisicion/update','id'=>$req->id],['class'=>'btn btn-default btn-sm'])?>
		      </td>
		    </tr>
		    <?php }?>
		  </tbody>
		</table>

</div>
