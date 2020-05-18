<title>Registro | Find Parking</title>
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
		$datos = array(
	        0  => 'comp_cod',
	        1 => 'comp_cupo_fk',
	        2 => 'cupo_ref',
	        3 => 'cupa_cod',
	        4 => 'comp_fin',
	        5 => 'comp_hin',
	        6 => 'comp_fsa',
	        7 => 'comp_hsa',
	        8 => 'comp_val',
	        9 => 'vehi_con',
	        10 => 'vehi_pla',
	        11 => 'vehi_col'
	       	        
	    );
	    $num_tit = empty($datos) ? 0 : count($datos);
	    $modal = new FunctionModel();
	    $modal->ventana_modal("add",$datos, "", "Añadir registro", "form-regist-add");
	    $modal->ventana_modal("edi",$datos, "", "Editar registro", "form-regist-edi");
	    $modal->ventana_modal("del",$datos, "", "Eliminar registro", "form-regist-del");
	    $modal->ventana_modal("comp", $datos, "", "Generar comprobante", "form-regist-fact");
	    $modal->ventana_modal("view", $datos, "", "Generar comprobante", "form-regist-view");
	}
	$result_controller = new RegistroController();
	$parq_id = (!empty($_SESSION['parq_id']))?$_SESSION['parq_id']:'';
	$result = $result_controller->sel('',$parq_id); 
	$num_result = empty($result) ? 0 : count($result); 
	if ($num_result!=0) {
		$datos = array_keys($result[0]);
	}
	 ?>
	<div class="container-tabla">
		<table id="tbl_cuentas" class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Conductor</th>
					<th scope="col">Placa</th>
					<th scope="col">Color</th>
					<th scope="col">Cupo</th>
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
						<td><?php echo $result[$m]['vehi_col']; ?></td>
						<td><?php echo $result[$m]['cupo_ref']; ?></td>
						<td><?php echo $result[$m]['comp_fin'].' '.$result[$m]['comp_hin']; ?></td>
						<td><?php echo $result[$m]['comp_fsa'].' '.$result[$m]['comp_hsa']; ?></td>
						<td>$ <?php echo number_format($result[$m]['comp_val'], 0, '.', '.'); ?></td>
			      		<td>
			      	    <?php if ($_SESSION['usua_rol'] == "Operario" AND empty($result[$m]['comp_hsa']) ) {
			      		echo '<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Modal-comp" data-cupo_ref="' . $result[$m]['cupo_ref'] . '" data-name="' . $result[$m]['comp_cod'] . '" ';
			      			for ($i=0; $i < $num_tit; $i++) { 
								echo 'data-'.$datos[$i].'="'.$result[$m][$datos[$i]].'" ';
							}
			      		echo '><i class="fa fa-dollar-sign"></i> Facturar</button>';	
			      	 	}?>	
				      	<?php if ($_SESSION['usua_rol'] == "Operario") {?>
					      	<!--<button type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></button>-->
					      	<?php
					      	if (!empty($result[$m]['comp_hsa'])) {
					      	 	echo '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal-view" data-cupo_ref="' . $result[$m]['cupo_ref'] . '" data-name="' . $result[$m]['comp_cod'] . '" ';
				      			for ($i=0; $i < $num_tit; $i++) { 
									echo 'data-'.$datos[$i].'="'.$result[$m][$datos[$i]].'" ';
								}
				      			echo '><i class="fa fa-eye"></i></button>';
					      	 } 
					      	}
					      	if ($_SESSION['usua_rol'] == "Administrador") {
					      	echo '<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal-del" data-name="'.$result[$m]['comp_cod'].'" data-cupa_cod="'.$result[$m]['cupa_cod'].'" data-comp_cod="'.$result[$m]['comp_cod'].'" ><i class="fa fa-trash-alt"></i></button>';
					      	 ?>
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
	function startTime(){
		today=new Date();
		h=today.getHours();
		m=today.getMinutes();
		s=today.getSeconds();
		m=checkTime(m);
		s=checkTime(s);
		document.getElementById('relojInput').value=h+":"+m+":"+s;
		document.getElementById('relojSalida').value=h+":"+m+":"+s;
		
		t=setTimeout('startTime()',500);}
		function checkTime(i){
			if (i<10) {
				i="0" + i;
			}return i;
		}
  	window.onload=function(){
	startTime();
	}
</script>