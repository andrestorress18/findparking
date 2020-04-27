<?php 
print('<title>Registro | Find Parking</title>');
 ?>
 <?php
$puc_controller = new RegistroController();
$puc = $puc_controller->sel(); 
$num_puc = empty($puc) ? 0 : count($puc); 
?>
<div class="container-cab">
	<h3>Registro</h3>
	<div class="contenedor-flex">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal-add">
		  Registrar ingreso
		</button>
	</div>
</div>
<div class="cont-pad-tre"><?php
	if (isset($_GET['success'])) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$_GET['success'].'</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>';
	}
	if ($_GET['r'] == 'registro' && !isset($_POST['crud'])) {
		$datos = 1;
	    $modal = new FunctionModel();
	    $modal->ventana_modal("add",$datos, "", "Añadir registro", "form-regist-add");
	    $modal->ventana_modal("edi",$datos, "", "Editar registro", "form-regist-edi");
	    $modal->ventana_modal("del",$datos, "", "Eliminar registro", "form-regist-del");
	}
	$result_controller = new RegistroController();
	$result = $result_controller->sel(); 
	$num_result = empty($result) ? 0 : count($result); 
	if ($num_result!=0) {
		$datos = array_keys($result[0]);
	}
	
	$modal = new FunctionModel();
	$modal->ventana_modal("comp", $datos, "", "Generar comprobante", "form-facturar");
	 ?>
	<div class="container-tabla">
		<table id="tbl_cuentas" class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Conductor</th>
					<th scope="col">Placa</th>
					<th scope="col">Ingreso</th>
					<th scope="col">Salida</th>
					<th scope="col">Valor</th>
					<th scope="col">Opciones</th>
			    </tr>
			</thead>
			<tbody>
				<?php 
				for ($m = 0; $m < $num_result; $m++) {?>
			    <tr>
			      <th scope="row"><?php echo $result[$m]['comp_cod']; ?></th>
						<td><?php echo $result[$m]['vehi_con']; ?></td>
						<td><?php echo $result[$m]['vehi_pla']; ?></td>
						<td><?php echo $result[$m]['comp_fin'].' '.$result[$m]['comp_hin']; ?></td>
						<td><?php echo $result[$m]['comp_fsa'].' '.$result[$m]['comp_hsa']; ?></td>
						<td><?php echo $result[$m]['comp_val']; ?></td>
			      		<td>
			      	    <?php if ($_SESSION['usua_rol'] == "Super administrador" OR $_SESSION['usua_rol'] == "Administrador") {
			      		echo '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal-comp" data-comp_cod="' . $result[$m]['comp_cod'] . '" data-name="' . $result[$m]['comp_cod'] . '"  data-comp_fin="' . $result[$m]['comp_fin'] . '" data-comp_hin="' . $result[$m]['comp_hin'] . '" data-vehi_con="' . $result[$m]['vehi_con'] . '" data-vehi_pla="' . $result[$m]['vehi_pla'] . '" data-comp_cod="' . $result[$m]['comp_cod'] . '" data-comp_val="'.$result[$m]['comp_val'].'" ><i class="fa fa-dollar-sign"></i> Comprobante</button>';	
			      	 	}?>	
				      	<?php if ($_SESSION['usua_rol'] == "Operario") {?>
					      	<button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button>
					      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
				      	<?php }?>
				    	</td>
					 </tr>
			<?php } ?>

			</tbody>
		</table>
	</div>
</div>
<script>
	$(document).ready(function () {
	  $('#tbl_cuentas').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	});
</script>