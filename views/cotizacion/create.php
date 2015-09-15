<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\cotizacion */

$this->title = 'Crear Cotizacion';
$this->params['breadcrumbs'][] = ['label' => 'Cotizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-crear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'detalle' => $detalle,
    ]) ?>

</div>
