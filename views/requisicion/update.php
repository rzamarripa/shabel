<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Requisicion */

$this->title = 'Actualizar Requisición: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Requisición', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requisicion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'detalle'=> $detalle,
    ]) ?>

</div>
