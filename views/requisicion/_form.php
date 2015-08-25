<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;
use app\controllers\PDO;
//use kartik\money\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Requisicion */
/* @var $form yii\widgets\ActiveForm */
?>
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
    <div class="requisicion-form well">
        
    <?php $form = ActiveForm::begin(['action' => ['requisicion/create']]); ?>
        <div class="row">
            <div class="col-sm-2">
                <?= $form->field($model, 'folio')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'cliente_did')->dropDownList(ArrayHelper::map(app\models\Cliente::find()->asArray()->all(), 'id', 'nombre'), ["prompt"=>"Seleccione"]) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'departamento')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-2">
                <?= $form->field($model, 'fecha_f')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($model, 'comentarios')->textarea(['rows' => 3]) ?>
            </div>
        </div>
        <h1>Articulos</h1>  
    <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Unidad</th>
                    <th>Observaciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(key,item) in items">
                    <td class="col-sm-2">
                        <div class="col-sm-12" ng-class="{true: 'error', false: ''}[item.error.cantidad]">
                            <input id="item_{{key}}" name="detalle[{{key}}][cantidad]" ng-keypress="enter(item, $event)" type="text" ng-model="item.cantidad" class="form-control" />
                        </div>
                    </td>
                    <td>
                        <span class="control-group" ng-class="{true: 'error', false: ''}[item.error.articulo]">
                            <input class="articulo" type="hidden" ui-select2="articulosOptions" name="detalle[{{key}}][articulo]" ng-model="item.articulo" />
                        </span>
                    </td>
                    <td>
                        {{item.articulo.unidad}}
                    </td>
                    <td>
                        <div class="col-sm-12">
                            <input name="detalle[{{key}}][observaciones]" ng-keypress="enter(item, $event)" type="text" ng-model="item.observaciones" class="form-control" />
                        </div>                      
                    </td>
                    <td>
                        <button ng-click="cancelar(item, $event)" class="btn btn-mini btn-danger">Cancelar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <a ng-click="agregar()" href="" class="btn btn-primary pull-right"><i class="fa fa-plus">&nbsp;</i></a>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['onClick'=>"return confirm('Estas seguro?')",'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

<!--
<tr ng-repeat="(key,item) in items">
    <td class="col-xs-1">
        <span class="control-group" ng-class="{true: 'error', false: ''}[item.error.cantidad]">
            <input id="item_{{key}}" name="detalle[{{key}}][cantidad]" ng-keypress="enter(item, $event)" type="text" ng-model="item.cantidad" class="input-mini" />
        </span>
    </td>
    <td>
        <span class="control-group" ng-class="{true: 'error', false: ''}[item.error.articulo]">
            <input class="articulo" type="hidden" ui-select2="articulosOptions" name="detalle[{{key}}][articulo]" ng-model="item.articulo" />
        </span>
    </td>
    <td>
        {{item.articulo.unidad}}
    </td>
    <td>
        <input name="detalle[{{key}}][observaciones]" ng-keypress="enter(item, $event)" type="text" ng-model="item.observaciones" />
    </td>
    <td>
        <button ng-click="cancelar(item, $event)" class="btn btn-mini btn-danger">Cancelar</button>
    </td>
</tr>
-->
