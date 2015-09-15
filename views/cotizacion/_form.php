<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\cotizacion */
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

<div class="cotizacion-form">
    <div class="col-sm-12 well">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'folio')->textInput(['readOnly' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'cliente_did')->dropDownList(ArrayHelper::map(app\models\Cliente::find()->asArray()->all(), 'id', 'nombre'), ["prompt"=>"Seleccione" ]) ?>
        </div>
        <div class="col-sm-2 pull-right">
            <?= $form->field($model, 'fecha_f')->widget(\yii\jui\DatePicker::classname(), [
                            //'language' => 'ru',
                            'dateFormat' => 'yyyy-MM-dd',
                        ])->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <?php // $form->field($model, 'porcentaje')->textInput(['value'=>'0']) ?>
            <label for="porcentaje">Porcentaje General</label>
            <input id="porcentaje" class="form-control" type="number" name="Cotizacion[porcentaje]" ng-model="porcentajeGeneral" min="0"/>
        </div>
        <div class="form-group col-sm-3">
            <?php // $form->field($model, 'subtotal')->textInput(['value'=>'{{ getTotal()[0] }}','readOnly'=>true]) ?>
            <label for="subtotal">Subtotal</label>
            <input id="subtotal" class="form-control" type="text" name="Cotizacion[subtotal]" value="{{ getTotal()[0] }}" ng-cloak readOnly/>
        </div>
        <div class="form-group col-sm-3">
            <?php //$form->field($model, 'iva')->textInput(['value'=>'{{ getTotal()[1] }}','readOnly'=>true]) ?>
            <label for="iva">Iva</label>
            <input id="iva" class="form-control" type="text" name="Cotizacion[iva]" value="{{ getTotal()[1] }}" ng-cloak readOnly/>
        </div>
        <div class="form-group col-sm-3">
            <?php // $form->field($model, 'total')->textInput(['value'=>'{{ getTotal()[2] }}','readOnly'=>true, ]) ?>
            <label for="total">Total</label>
            <input id="total" class="form-control" type="text" name="Cotizacion[total]" value="{{ getTotal()[2] }}" ng-cloak readOnly/>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'comentarios')->textarea(['rows' => 3]) ?>
        </div>
    </div>
    <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Proveedor</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Observaciones</th>
                    <th>Precio Unit.</th>
                    <th>Porcentaje</th>
                    <th>Precio U.Final</th>
                    <th>Importe</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(key,item) in items">
                    <td class="col-sm-2">
                        <span class="control-group" ng-class="{true: 'error', false: ''}[item.error.proveedor]">
                            <input class="proveedor" type="hidden" ui-select2="proveedoresOptions" name="detalle[{{key}}][proveedor]" ng-model="item.proveedor" />
                        </span>
                    </td>
                    <td class="col-sm-1">
                        <div class="col-sm-12" ng-class="{true: 'error', false: ''}[item.error.cantidad]">
                            <input id="item_{{key}}" name="detalle[{{key}}][cantidad]" ng-keypress="enter(item, $event)" type="text" ng-model="item.cantidad" class="form-control" />
                        </div>
                    </td>
                    <td class="col-sm-2">
                        <span class="control-group" ng-class="{true: 'error', false: ''}[item.error.articulo]">
                            <input class="articulo" type="hidden" ui-select2="articulosOptions" name="detalle[{{key}}][articulo]" ng-model="item.articulo" />
                        </span>
                    </td>
                    <td class="col-sm-2">
                        <div class="col-sm-12">
                            <input name="detalle[{{key}}][comentarios]" ng-keypress="enter(item, $event)" type="text" ng-model="item.comentarios" class="form-control" />
                        </div>                      
                    </td>
                    <td class="col-sm-1">
                        <div>
                            <input id="item_{{key}}" name="detalle[{{key}}][precioUnitario]" ng-keypress="enter(item, $event)" type="number" ng-model="item.precioUnitario" class="form-control" min="0"  />
                        </div>
                    </td>
                    <td class="col-sm-1">
                        <div>
                            <input id="item_{{key}}" name="detalle[{{key}}][porcentaje]" ng-keypress="enter(item, $event)" type="number" ng-model="item.porcentaje" class="form-control" min="0"/>
                        </div>
                    </td>
                    <td class="col-sm-1">
                        <div>
                            <input id="item_{{key}}" name="detalle[{{key}}][precioFinal]" ng-keypress="enter(item, $event)" type="number" ng-model="item.precioFinal" class="form-control" min="0" value="{{getTotal()}}" readOnly />
                        </div>
                    </td>
                    <td class="col-sm-1">
                        <div>
                            <input id="item_{{key}}" name="detalle[{{key}}][importe]" ng-keypress="enter(item, $event)" type="number" ng-model="item.importe" class="form-control" min="0" value="{{getTotal()}}" readonly/>
                        </div>
                    </td>
                    <td class="col-sm-1">
                        <button ng-click="cancelar(item, $event)" class="btn btn-mini btn-danger">Cancelar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <a ng-click="agregar()" href="" class="btn btn-primary pull-right"><i class="fa fa-plus">&nbsp;</i></a>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <div>
</div>
</div>