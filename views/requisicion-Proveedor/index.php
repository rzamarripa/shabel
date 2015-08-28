<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\helpers\ArrayHelper;
?>

<div class="site-index">

    <div class="body-content">
        <PRE>
         </PRE>
        <div class="row">
            <div class="col-lg-12">
	            <table class="table table-stripped">
                    <table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Requisiciones</th>
            <th>Proveedores</th>
              <th>Acciones</th>
            
        
        </tr>
    </thead>
<tbody>
    <?php foreach ($RequisicionProveedor as $reqp) { ?> 
    <tr>
      <td><?= $reqp->requisicionid ?></td>
      <td><?= $reqp->proveedores->id ?></td>        
      <td>
      	<?= Html::a('<span class="fa fa-pencil"></span>',['requisicion-proveedor/update','id'=>$reqp->id],['class'=>'btn btn-default btn-sm'])?>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>