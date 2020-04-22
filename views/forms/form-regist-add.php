<form enctype="multipart/form-data" method="POST" autocomplete="off">
	<div class="form-row align-items-center">
	  	<div class="col-sm-12 my-1">
	  		<div class="form-group">
			    <label for="cuen_des">Nombre del conductor:</label>
	    		<input type="text" name="cuen_des" class="form-control" id="add_cuen_des"  required autocomplete="off"> 
	    	</div>
	  	</div>
	  	
	</div>
	<div class="form-row align-items-center">
		<div class="col-sm-4 my-1">
	  		<div class="form-group">
			    <label for="cuen_val">Placa:</label>
	    		<input type="text" name="cuen_val" class="form-control" id="add_cuen_val"  required autocomplete="off"> 
	    	</div>
	  	</div>
	  	<div class="col-sm-4 my-1">
	  		<div class="form-group">
	    		<label for="cuen_est">Cupo</label>
			    <select name="usua_est" class="form-control" id="add_usua_est" required>
					<option value="">Seleccione</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
					<option value="4" >4</option>
					<option value="5" >5</option>
					<option value="6" >6</option>
					<option value="7" >7</option>
					<option value="8" >8</option>
			</select>
	    	</div>
	  	</div>
	  	<div class="col-sm-4 my-1">
	  		<div class="form-group">
	    		<label for="cuen_est">Fecha</label>
			    <input type="date" name="cuen_fec" disabled="true" class="form-control" id="add_cuen_fec" value="<?php echo date("Y-m-d"); ?>" required autocomplete="off">
	    	</div>
	  	</div>
	</div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
    <button type="button" class="btn btn-primary">Registrar</button>
</form>