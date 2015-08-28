<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\RequisicionSearch $searchModel
 */

$this->title = 'Requisición';
$this->params['breadcrumbs'][] = $this->title;
?>

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#form" aria-expanded="false" aria-controls="form" style="margin-bottom:10px;">
  Nuevo
</button>
<div class="collapse" id="form">
    <?= $this->render('_form',['model'=>$model]) ?>
</div>

<table class="table table-striped table-bordered tabla dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>No.</td>
      <th>Folio</th>
      <th>Cliente</th>
      <th>Comentarios</th>
      <th>Estatus</th>
      <th>Fecha</th>       
      <th>Acciones</th>   
    </tr>
  </thead>
  <tbody>
    <?php $c = 0; foreach ($requisiciones as $req) {$c++; ?> 
    <tr>
      <td class="col-sm-1"><?= $c ?></td>
      <td class="col-sm-2"><?= $req->folio ?></td>
      <td class="col-sm-2"><?= $req->cliente->nombre ?></td>
      <td class="col-sm-2"><?= $req->comentarios ?></td>
      <td class="col-sm-2"><?php if($req->estatus_did == 1){ ?><span class="label label-warning"><?= $req->estatus->requisicion ?></span><?php } ?></td>    
      <td class="col-sm-2"><?= $req->fecha_f ?></td>        
      <td class="col-sm-1">
        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Acciones <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><?= Html::a('<span class="fa fa-eye"> Ver</span>',['requisicion/view','id'=>$req->id])?></li>
            <li><?= Html::a('<span class="fa fa-pencil"> Editar</span>',['requisicion/update','id'=>$req->id])?></li>
            <li><?= Html::a('<span class="fa fa-print"> Imprimir</span>',['requisicion/imprimir','id'=>$req->id])?></li>
            <li><?= Html::a('<span class="fa fa-paper-plane"> Cotizar</span>',['requisicion/cotizar','id'=>$req->id])?></li>
          </ul>
        </div>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>