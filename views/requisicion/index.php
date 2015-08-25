<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\RequisicionSearch $searchModel
 */

$this->title = 'Requisicion';
$this->params['breadcrumbs'][] = $this->title;
?>

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#form" aria-expanded="false" aria-controls="form" style="margin-bottom:10px;">
  Nuevo
</button>
<div class="collapse" id="form">
    <?= $this->render('_form',['model'=>$model]) ?>
</div>
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Folio</th>
            <th>Comentarios</th>
            <th>Acciones</th>   
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requisiciones as $req) {?> 
        <tr>
            <td><?= $req->folio ?></td>
            <td><?= $req->comentarios ?></td>
            <td>
            <?= Html::a('<span class="fa fa-pencil"></span>',['requisicion/update','id'=>$req->id],['class'=>'btn btn-default btn-sm'])?>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>