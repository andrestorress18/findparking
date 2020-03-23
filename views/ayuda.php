<?php
print('<title>Categorias | Find Parking</title>');

$cuentas_controller = new CuentasController();
$cuentas_desc_controller = new CuentasController();
$cuentas = $cuentas_controller->getCategoria(); 
$num_cuent = empty($cuentas) ? 0 : count($cuentas); 
?>
<div class="cont-pad-tre">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<?php 
		for ($n = 0; $n < $num_cuent; $n++) {
			echo "<li class='nav-item'>
	    <a class='nav-link ";
	    echo (0 == $n) ? 'active' : '';
	    echo "' id='tab_".$cuentas[$n]['catp_id']."-tab' data-toggle='tab' href='#tab_".$cuentas[$n]['catp_id']."' role='tab' aria-controls='".$cuentas[$n]['catp_nombre']."' aria-selected='";
	    echo (0 == $n) ? 'true' : 'false';
	    echo "'>".$cuentas[$n]['catp_nombre']."</a>
	  </li>";
		}?>
	 <!-- <li class="nav-item">
	    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoriaPUC">Agregar</button>
	  </li>-->
	</ul>
<!-- Modal -->
<div class="modal fade" id="categoriaPUC" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Crear Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row align-items-center">
        	<div class="col-sm-4 my-1">
	      		<div class="form-group">
				    <label for="cpuc_cod">Codigo:</label>
		    		<input type="number" name="cpuc_cod" class="form-control" id="add_cpuc_cod"  required autocomplete="off"> 
		    	</div>
	      	</div>
	      	<div class="col-sm-8 my-1">
		      	<div class="form-group">
			    	<label for="cuen_puc">Tipo de cuenta</label>
				    <select name="cuen_puc" class="form-control" id="add_cuen_puc" required>
						<option value="">Seleccione</option>
						<option value="Operario" >Operario</option>
						<option value="Administrador" >Administrador</option>
					</select>
		    	</div>
		    </div>
	      	<div class="col-sm-12 my-1">
	      		<div class="form-group">
				    <label for="cpuc_des">Descripción de la cuenta:</label>
		    		<input type="text" name="cpuc_des" class="form-control" id="add_cpuc_des"  required autocomplete="off"> 
		    	</div>
	      	</div>	      	
	  	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
        <button type="button" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
	<div class="tab-content" id="myTabContent">
		<?php 
		for ($m = 0; $m < $num_cuent; $m++) {
			echo "<div class='tab-pane fade show ";
			echo (0 == $m) ? 'active' : '';
			echo "' id='tab_".$cuentas[$m]['catp_id']."' role='tabpanel' aria-labelledby='tab_".$cuentas[$m]['catp_id']."-tab'>
<div class='container-tabla'><table id='tbl_cate_".$cuentas[$m]['catp_id']."' class='table table-striped'>
  <thead>
    <tr>
      <th scope='col'>Codigo</th>
      <th scope='col'>Descripción</th>
    </tr>
  </thead>
  <tbody>";
  $cuentas_desc_controller = new CuentasController();
  $cuentas_desc = $cuentas_desc_controller->get($cuentas[$m]['catp_id']); 
$num_cuent_desc = empty($cuentas_desc) ? 0 : count($cuentas_desc); 
for ($x = 0; $x < $num_cuent_desc; $x++) {
	echo "<tr>
      <td>".$cuentas_desc[$x]['cpuc_id']."</td>
      <td>".$cuentas_desc[$x]['cpuc_des']."</td>
    </tr>";
}
echo "
  </tbody>
</table></div>
<script>
	$(document).ready(function () {
	  $('#tbl_cate_".$cuentas[$m]['catp_id']."').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	});
</script>

	  </div>";
		}?>
	</div>
</div>

