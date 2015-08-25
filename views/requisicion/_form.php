<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;
use yii\base\Model;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Requisicion */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular.min.js"></script>
<div ng-app="asdasd">
    <div ng-controller="RequisicionFormCtrl">
        <script type="text/javascript">
            window.first = window.first || {};
            window.first.data = window.first.data || {};
            <?php if (isset($detalle)) { ?>
                window.first.data.detalle = <?php echo json_encode($detalle); ?>;
            <?php } else { ?>
                window.first.data.detalle = null;
            <?php } ?>
        </script>
<div class="col-lg-4 well">

    <?php $form = ActiveForm::begin([
        'action' => ['requisicion/create'],
        'id'=>'requisicion-form',
        'enableAjaxValidation'=>true,
        'options' => array('onkeypress' => 'return event.keyCode != 13'),
        'options' => array(
            'validateOnSubmit' => true,
            'beforeValidate' => 'js:function (form) { return validateDetalle(form) }'
            )
        ]); ?>

    <?= $form->field($model, 'folio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_f')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
    ])->textInput(['autocomplete'=>false]) ?>

    <?= $form->field($model, 'cliente_did')->dropDownList(ArrayHelper::map(app\models\Cliente::find()->asArray()->all(), 'id', 'nombre')) ?>

    <?= $form->field($model, 'departamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentarios')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'estatus_did')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'usuario_aid')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'fechacreacion_ft')->widget(DateControl::classname(), ['type'=>DateControl::FORMAT_DATETIME,]); ?>
</div>
<div class="col-lg-8 well">
    <table class="table table-bordered table-striped">
    <thead>
            <tr>
                <th>Cantidad</th>
                <th>Articulo</th>
                <th>Comentario</th>
                <th>Acciones</th>
            </tr>
    </thead>
    <body>
        <tr ng-repeat="(key,item) in items">
            <td>
                <span class="control-group" ng-class="{true: 'error', false: ''}[item.error.cantidad]">
                <input id="item_{{key}}" ng-keypress="enter(item, $event)" type="text" name="detalle[{{key}}][cantidad]" ng-model="item.cantidad"/>
                </span>
            </td>
            <td>
                <span class="control-group" ng-class="{true: 'error', false: ''}[item.error.articulo]">
                <input type="text" name="detalle[{{key}}][articulo]" ng-model="item.articulo"/>
            </span>
            </td>
            <td><input name="detalle[{{key}}][comentarios]" ng-keypress="enter(item, $event)" type="text"  ng-model="item.comentarios"/></td>
            <td><button ng-click="cancelar(item, $event)" class="btn btn-mini btn-danger">Cancelar</button></td>
        </tr>
    </body>
    </table>
</div>
<div class="pull-left"><button type="button" class="btn btn-info" ng-click="agregar()"><li class="fa fa-plus"></li></button></div>
<div class="pull-right">
    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['onclick'=>"$('#requisicion-form').submit()",'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
</div>
