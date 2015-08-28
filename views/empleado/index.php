
<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use yii\web\Controller;
    use app\models\Empleado;
?>



<div class="empleado-index">

   
 

    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#form" aria-expanded="false" aria-controls="form" style="margin-bottom:10px;">
  Nuevo
</button>

<?= Html::a('<span class="fa fa-print"> Imprimir</span>',['empleado/imprimir'],['class'=>'btn btn-default pull-right'])?>

<div class="collapse" id="form">
  <div class="well">
    <div class="Cliente-form">

     <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'apellidos')->textInput() ?>

    <?= $form->field($model, 'celular')->textInput() ?>

    <?= $form->field($model, 'puesto')->textInput() ?>

    <?= $form->field($model, 'direccion')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>

   <table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Puesto</th>
            <th>Dirección</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        <?php $c=0; foreach ($Empleado as $empleado) {$c++;?> 
        <tr>
            <td class='col-sm-1'><?= $c?></td>  
            <td><?= $empleado->nombre ?></td>        
            <td><?= $empleado->apellidos?></td>
            <td><?= $empleado->celular?></td>               
            <td><?= $empleado->puesto?></td>
            <td><?= $empleado->direccion?></td>
            
            <td>
                <?= Html::a('<span class="fa fa-pencil"></span>',['empleado/update','id'=>$empleado->id],['class'=>'btn btn-default']) ?>
                <?php if($empleado->estatus_did == 1){ echo Html::a('<span class="fa fa-trash-o"></span>',['empleado/cambiar','estatus'=>2,'id'=>$empleado->id],['class'=>'btn btn-danger']);
            }else{echo Html::a('<span class="fa fa-recycle"></span>',['empleado/cambiar','estatus'=>1,'id'=>$empleado->id],['class'=>'btn btn-success']);}?>
            </td></td>

            



           
        </tr>
        <?php }?>
    </tbody>
</table>

</div>
