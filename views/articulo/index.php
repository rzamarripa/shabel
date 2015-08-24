
<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use yii\web\Controller;
    use app\models\articulo;
?>



<div class="articulo-index">

   
 

    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#form" aria-expanded="false" aria-controls="form" style="margin-bottom:10px;">
  Nuevo
</button>
<div class="collapse" id="form">
  <div class="well">
    <div class="Articulo-form">

     <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput() ?>
    <?= $form->field($model, 'unidad')->textInput() ?>



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
            <th>Nombre</th>
            <th>Unidad</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Articulo as $Articulo) {?> 
        <tr>
            <td><?= $Articulo->nombre ?></td>        
            <td><?= $Articulo->unidad?></td>
            <td>
                <?= Html::a('<span class="fa fa-pencil"></span>',['articulo/update','id'=>$Articulo->id],['class'=>'btn btn-default']) ?>
                <?php if($Articulo->estatus_did == 1){ echo Html::a('<span class="fa fa-trash-o"></span>',['articulo/cambiar','estatus'=>2,'id'=>$Articulo->id],['class'=>'btn btn-danger']);
            }else{echo Html::a('<span class="fa fa-recycle"></span>',['articulo/cambiar','estatus'=>1,'id'=>$Articulo->id],['class'=>'btn btn-success']);}?>
            </td></td>

            



           
        </tr>
        <?php }?>
    </tbody>
</table>

</div>
