<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Requisicion */

$this->title = 'Crear Requisicion';
$this->params['breadcrumbs'][] = ['label' => 'Requisicions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requisicion-crear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
