<?php 
print('<title>Registro | Find Parking</title>');
 ?>
 <?php
$puc_controller = new CuentasController();
$puc = $puc_controller->get(); 
$num_puc = empty($puc) ? 0 : count($puc); 
?>
<div class="container-cab">
	<h3>Facturar</h3>
	<div class="contenedor-flex">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCuenta">
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
	}?>


<!-- Modal -->
<div class="modal fade" id="addCuenta" tabindex="-1" role="dialog" aria-labelledby="addCuentaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-row align-items-center">
	      	<div class="col-sm-8 my-1">
	      		<div class="form-group">
				    <label for="cuen_des">Conductor:</label>
		    		<input type="text" name="cuen_des" class="form-control" id="add_cuen_des"  required autocomplete="off"> 
		    	</div>
	      	</div>
	      	<div class="col-sm-4 my-1">
	      		<div class="form-group">
				    <label for="cuen_val">Placa:</label>
		    		<input type="text" name="cuen_val" class="form-control" id="add_cuen_val"  required autocomplete="off"> 
		    	</div>
	      	</div>
	  	</div>
        <div class="form-row align-items-center">
	      	<div class="col-sm-6 my-1">
	      		<div class="form-group">
		    		<label for="cuen_est">Fecha</label>
				    <input type="date" name="cuen_fec" class="form-control" id="add_cuen_fec"  required autocomplete="off">
		    	</div>
	      	</div>
	      	<div class="col-sm-6 my-1">
	      		<div class="form-group">
		    		<label for="cuen_est">Hora de ingreso</label>
				    <input type="time" name="cuen_fec" class="form-control" id="add_cuen_fec"  required autocomplete="off">
		    	</div>
	      	</div>
	  	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
        <button type="button" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
<?php 
$result_controller = new CuentasController();
$result = $result_controller->get_resultados(); 
$num_result = empty($result) ? 0 : count($result); 

$datos = array(
        0  => 'fact_id',
        1 => 'fpag_val',
        2 => 'fpag_sal',
        3 => 'fpag_pen'
    );
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