<h2>Requisición</h2>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">			
			<tbody>
				<tr>
					<td ><strong>Cliente</strong></td>
					<td class="col-sm-2"><strong>Departamento</strong></td>
					<td class="col-sm-2"><strong>Folio: </strong><?php echo $requisicion->folio; ?></td>
				</tr>
				<tr>
					<td><?php echo $requisicion->cliente->nombre; ?></td>
					<td><?php echo $requisicion->departamento; ?></td>
					<td><strong>Fecha: </strong><?php echo date("d-m-Y", strtotime($requisicion->fecha_f)); ?></td>
				</tr>
				<tr>
					
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
					<td><?php echo $c;?></td>	
					<td><?php echo $detalle->cantidad;?></td>	
					<td><?php echo $detalle->articulo->nombre;?></td>
					<td><?php echo $detalle->articulo->unidad;?></td>
					<td><?php echo $detalle->comentarios;?></td>				
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<table class="table table-bordered table-condensed">
			<tr>
				<td class="col-lg-2"><strong>Comentario</strong></td>
				<td style="width:20%;" class="col-lg-10"><?php echo $requisicion->comentarios; ?></td>
			</tr>
		</table>
	</div>
</div>