<?php 
print('<title>Registro | Find Parking</title>');
 ?>
 <?php
$puc_controller = new RegistroController();
$puc = $puc_controller->get(); 
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
	$result = $result_controller->get(); 
	$num_result = empty($result) ? 0 : count($result); 

	$datos = 1;
	$modal = new FunctionModel();
	$modal->ventana_modal("fact", $datos, "", "Generar factura", "form-facturar");
	 ?>
	<div class="container-tabla">
		<table id="tbl_cuentas" class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Conductor</th>
					<th scope="col">Placa:</th>
					<th scope="col">Fecha</th>
					<th scope="col">Hora</th>
					<th scope="col">Estado</th>
					<th scope="col">Opciones</th>
			    </tr>
			</thead>
			<tbody>
				<?php 
				for ($m = 0; $m < $num_result; $m++) {?>
			    <tr>
			      <th scope="row"><?php echo $result[$m]['cuen_id']; ?></th>
						<td><?php echo $result[$m]['cuen_des']; ?></td>
						<td><?php echo $result[$m]['cuen_valo']; ?></td>
						<td><?php echo $result[$m]['usua_nom']; ?></td>
						<td><?php echo $result[$m]['cuen_fec']; ?></td>
						<td><?php echo $result[$m]['esta_nom']; ?></td>
			      		<td>
			      	    <?php if ($_SESSION['usua_rol'] == "Super administrador" OR $_SESSION['usua_rol'] == "Administrador") {
			      		echo '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal-fact" data-fact_id="' . $result[$m]['cuen_id'] . '" data-name="' . $result[$m]['cuen_des'] . '" data-cuen_des="' . $result[$m]['cuen_des'] . '" data-fact_pla="'.$result[$m]['cuen_valo'].'" ><i class="fa fa-dollar-sign"></i>Facturar</button>';	
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