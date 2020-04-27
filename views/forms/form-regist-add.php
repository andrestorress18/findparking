
<form enctype="multipart/form-data" method="POST" autocomplete="off">
	<div class="form-row align-items-center">
	  	<div class="col-sm-8 my-1">
	  		<div class="form-group">
			    <label for="vehi_nom">Nombre del conductor:</label>
	    		<input type="text" name="vehi_nom" class="form-control" id="vehi_nom"  required autocomplete="off"> 
	    	</div>
	  	</div>
	  	<div class="col-sm-4 my-1">
	  		<div class="form-group">
			    <label for="vehi_pla">Placa:</label>
	    		<input type="text" name="vehi_pla" class="form-control" id="vehi_pla"  required autocomplete="off"> 
	    	</div>
	  	</div>
	</div>
	<div class="form-row align-items-center">
		<div class="col-sm-4 my-1">
	  		<div class="form-group">
			    <label for="vehi_col">Color:</label>
	    		<input type="text" name="vehi_col" class="form-control" id="vehi_col"  required autocomplete="off"> 
	    	</div>
	  	</div>
	  	<div class="col-sm-4 my-1">
	  		<div class="form-group">
	    		<label for="comp_cupo_fk">Cupo</label>
			    <select name="comp_cupo_fk" class="form-control" id="add_comp_cupo_fk" required>
					<?php
                    $cupos      = new parqueaderoController();
                    $cupos_data = $cupos->sel_cupo();
                    $num_cupos    = count($cupos_data);
                    for ($regist = 0; $regist < $num_cupos; $regist++) {
                        echo '<option value="' . $cupos_data[$regist]['cupo_cod'] . '" >' . $cupos_data[$regist]['cupo_ref']."</option>";
                    }
                ?>
			</select>
	    	</div>
	  	</div>
	  	<div class="col-sm-4 my-1">
	  		<div class="form-group">
	    		<label for="comp_fec">Fecha</label>
			    <input type="date" name="comp_fec" disabled="true" class="form-control" id="comp_fec" value="<?php echo date("Y-m-d"); ?>" required autocomplete="off">
	    	</div>
	  	</div>
	  	<div class="col-sm-4 my-1">
			<input type="text"  class="iReloj" name="comp_hin" size="10">  
		</div>
	</div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
    <button type="button" class="btn btn-primary">Registrar</button>
</form>
