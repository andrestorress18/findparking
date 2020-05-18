
<form enctype="multipart/form-data" method="POST" autocomplete="off">
	<div class="form-row align-items-center">
	  	<div class="col-sm-6 my-1">
	  		<div class="form-group">
			    <label for="vehi_con">Nombre del conductor:</label>
	    		<input type="text" name="vehi_con" class="form-control" id="vehi_con"  required autocomplete="off"> 
	    	</div>
	  	</div>
	  	<div class="col-sm-3 my-1">
	  		<div class="form-group">
			    <label for="vehi_pla">Placa:</label>
	    		<input type="text" name="vehi_pla" class="form-control" id="vehi_pla"  required autocomplete="off"> 
	    	</div>
	  	</div>
	  	<div class="col-sm-3 my-1">
	  		<div class="form-group">
			    <label for="vehi_col">Color:</label>
	    		<input type="text" name="vehi_col" class="form-control" id="vehi_col"  required autocomplete="off"> 
	    	</div>
	  	</div>
	</div>
	<div class="form-row align-items-center">
	  	<div class="col-sm-4 my-1">
	  		<div class="form-group">
	    		<label for="comp_cupo_fk">Cupo</label>
			    <select name="comp_cupo_fk" class="form-control" id="add_comp_cupo_fk" required>
			    	<option value="">Seleccione el cupo </option>
					<?php
                    $cupos      = new ParqueaderoController();
                    $cupos_data = $cupos->sel_cupo($_SESSION['parq_id'],'0');
                    $num_cupos    = count($cupos_data);
                    for ($Y = 0; $Y < $num_cupos; $Y++) {
                        echo '<option value="' . $cupos_data[$Y]['cupa_cod'] . '" >' . $cupos_data[$Y]['cupo_ref']."</option>";
                    }
                ?>
			</select>
	    	</div>
	  	</div>
	  	<div class="col-sm-4 my-1">
	  		<div class="form-group">
	    		<label for="comp_fec">Fecha ingreso</label>
			    <input type="date"  name="comp_fin" readonly class="form-control" id="comp_fin" value="<?php echo date("Y-m-d"); ?>" required autocomplete="off">
	    	</div>
	    </div>
		<div class="col-sm-4 my-1">
	  		<div class="form-group">
	    		<label for="comp_hin">Hora ingreso</label>
				<input type="time" id="relojInput" class="form-control" readonly name="comp_hin" value="" placeholder=""> 
	  		</div>
	  	</div>
	</div>
    <button type="submit" class="btn btn-success">Registrar</button>
    <input type="hidden" name="crud" value="add">
</form>
