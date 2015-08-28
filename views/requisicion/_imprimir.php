<h2>Requisición</h2>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">			
			<tbody>
				<tr>
					<td><strong>Cliente</strong></td>
					<td><strong>Departamento</strong></td>
					<td><strong>Folio: </strong><?php echo $requisicion->folio; ?></td>
				</tr>
				<tr>
					<td style="width:38%;"><?php echo $requisicion->cliente->nombre; ?></td>
					<td style="width:38%;"><?php echo $requisicion->departamento; ?></td>
					<td style="width:24%;"><strong>Fecha: </strong><?php echo date("d-m-Y", strtotime($requisicion->fecha_f)); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="row">	
	<div class="col-sm-12">		
		<table class="table table-striped table-bordered table-hover table-condensed">
			<thead class="thead">
				<tr>
					<th>No.</th>
					<th>Cantidad</th>
					<th>Artículo</th>
					<th>Unidad</th>
					<th>Observaciones</th>
				</tr>
			</thead>
			<tbody>
				<?php $c=0; foreach($detalleRequisicion as $detalle){ $c++;?>
				<tr>
					<td style="width:10%;"><?php echo $c;?></td>	
					<td style="width:15%;"><?php echo $detalle->cantidad;?></td>	
					<td style="width:25%;"><?php echo $detalle->articulo->nombre;?></td>
					<td style="width:15%;"><?php echo $detalle->articulo->unidad;?></td>
					<td style="width:35%;"><?php echo $detalle->comentarios;?></td>				
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<table class="table table-bordered table-condensed">
			<tr>
				<td style="width:20%;"><strong>Comentarios</strong></td>
				<td style="width:80%;" class="col-lg-10"><?php echo $requisicion->comentarios; ?></td>
			</tr>
		</table>
	</div>
</div>