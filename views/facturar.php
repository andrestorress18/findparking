<?php
$puc_controller = new CuentasController();
$puc = $puc_controller->get(); 
$num_puc = empty($puc) ? 0 : count($puc); 

print('<title>Cuentas | Find Parking</title>');?>
<div class="container-cab">
	<h3>Cuentas empresariales</h3>
	<div class="contenedor-flex">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCuenta">
		  Agregar Cuenta
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
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-row align-items-center">
	      	<div class="col-sm-8 my-1">
	      		<div class="form-group">
				    <label for="cuen_des">Descripción de la cuenta:</label>
		    		<input type="text" name="cuen_des" class="form-control" id="add_cuen_des"  required autocomplete="off"> 
		    	</div>
	      	</div>
	      	<div class="col-sm-4 my-1">
	      		<div class="form-group">
				    <label for="cuen_val">Valor:</label>
		    		<input type="number" name="cuen_val" class="form-control" id="add_cuen_val"  required autocomplete="off"> 
		    	</div>
	      	</div>
	  	</div>
        <div class="form-row align-items-center">
	      	<div class="col-sm-4 my-1">
	      		<div class="form-group">
		    		<label for="cuen_est">Fecha</label>
				    <input type="date" name="cuen_fec" class="form-control" id="add_cuen_fec"  required autocomplete="off">
		    	</div>
	      	</div>
	      	<div class="col-sm-8 my-1">
	      		<div class="form-group">
			    	<label for="cuen_puc">Tipo de cuenta PUC</label>
				    <select name="cuen_puc" class="form-control" id="add_cuen_puc" required>
						<option value="">Seleccione una opción</option>
						<?php for ($i=0; $i < $num_puc; $i++) { 
							  	echo "<option value='".$puc[$i]['cpuc_id']."'>".$puc[$i]['cpuc_id']." - ".$puc[$i]['cpuc_des']."</option>";
							  } ?>
					</select>
		    	</div>
	      	</div>
	  	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
        <button type="button" class="btn btn-primary">Crear</button>
      </div>
    </div>
  </div>
</div>
<?php 
$result_controller = new CuentasController();
$result = $result_controller->get_resultados(); 
$num_result = empty($result) ? 0 : count($result); 
 ?>
<div class="container-tabla">
	<table id="tbl_cuentas" class="table table-striped">
  <thead>
    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Descripción</th>
	      <th scope="col">Valor</th>
	      <th scope="col">PUC</th>
	      <th scope="col">Usuario</th>
	      <th scope="col">Periodo</th>
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
	      <td><?php echo $result[$m]['catp_nombre']; ?></td>
	      <td><?php echo $result[$m]['usua_nom']; ?></td>
	      <td><?php echo $result[$m]['cuen_fec']; ?></td>
	      <td><?php echo $result[$m]['esta_nom']; ?></td>
      	<td>	
      		<?php if ($_SESSION['usua_rol'] == "Super administrador" OR $_SESSION['usua_rol'] == "Administrador") {?>
      		<button type="button" class="btn btn-warning">Verificar</button>
      	<?php }?>
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