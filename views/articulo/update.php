<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */

$this->title = 'Update Articulo: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Articulo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Articulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>