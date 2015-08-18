<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Empleado */

$this->title = 'Crear Empleado - Crear Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-crear">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
