<?php
if ($_SESSION['usua_rol']<>"Administrador") {
	$controller  = new ViewController();
	$controller->load_view('error401');
}else{ ?>
<title>Parqueaderos | Find Parking</title>
<div class="container-cab">
	<h3>Parquedaros</h3>
	<div class="contenedor-flex">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal-add">
		  Agregar parqueadero
		</button>
	</div>
</div>
<div class="cont-pad-tre">
	<?php 
	if (isset($_GET['success'])) {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$_GET['success'].'</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
		}
		if (isset($_GET['error'])) {
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>'.$_GET['error'].'</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
		}
	$result_controller = new ParqueaderoController();
	$result = $result_controller->sel(); 
	$datos = array_keys($result[0]);
	$num_result = empty($result) ? 0 : count($result); 
	if ($_GET['r'] == 'parqueaderos' && !isset($_POST['crud'])) {
	    $modal = new FunctionModel();
	    $modal->ventana_modal("add",$datos, "", "Añadir Parqueadero", "form-parking-add");
	    $modal->ventana_modal("edi",$datos, "", "Editar Parqueadero", "form-parking-edi");
	    $modal->ventana_modal("del",$datos, "", "Eliminar Parqueadero", "form-parking-del");
	}
	
	
	 ?>
	<div class="container-tabla">
		<table id="tbl_cuentas" class="table table-striped">
		  	<thead>
		    	<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Descripción</th>
					<th scope="col">Tarifa</th>
					<th scope="col">Longitud</th>
					<th scope="col">Latitud</th>
					<th scope="col">Opciones</th>
			    </tr>
		  </thead>
		  <tbody>
		  	<?php for ($m = 0; $m < $num_result; $m++) {?>
			    <tr>
			    	<th scope="row"><?php echo $result[$m]['parq_id']; ?></th>
					<td><?php echo $result[$m]['parq_nom']; ?></td>
					<td><?php echo $result[$m]['parq_des']; ?></td>
					<td>$ <?php echo number_format($result[$m]['parq_tar'], 0, '.', '.'); ?></td>
					<td><?php echo $result[$m]['parq_log']; ?></td>
					<td><?php echo $result[$m]['parq_lat']; ?></td>
		      		<td>
		      		<div class="cont-flex">
		      	    <?php 
		      		echo '<button type="button" class="btn btn-warning btn-sm" title="Modificar" data-toggle="modal" data-target="#Modal-parq" data-parq_id="' . $result[$m]['parq_id'] . '" data-name="' . $result[$m]['parq_nom'] . '" data-parq_des="' . $result[$m]['parq_des'] . '" data-parq_tar="'.$result[$m]['parq_tar'].'" ><i class="fa fa-pencil-alt"></i></button>';
		      		echo '<button type="button" class="btn btn-danger btn-sm" title="Eliminar" data-toggle="modal" data-target="#Modal-del" data-name="'.$result[$m]['parq_nom'].'" 
					data-parq_id="'.$result[$m]['parq_id'].'" ';
					for ($i=0; $i < $num_result; $i++) { 
						echo 'data-'.$datos[$i].'="'.$result[$m][$datos[$i]].'" ';
					}
					echo '><i class="fa fa-trash"></i></button>';	
					 ?>
					 </div>
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
<<?php } ?>