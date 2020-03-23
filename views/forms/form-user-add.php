<form enctype="multipart/form-data" method="POST" autocomplete="off">
    <div class="form-row align-items-center">
      <div class="col-sm-8 my-1">
      	<div class="form-group">
	    	<label for="usua_nom">Nombre</label>
		    <input type="text" name="usua_nom" class="form-control" id="add_usua_nom" required>
	    </div>
      </div>
      <div class="col-sm-4 my-1">
      	<div class="form-group">
	    	<label for="usua_ced">Cedula</label>
		    <input type="text" name="usua_ced" class="form-control" id="add_usua_ced" required pattern="[0-9]{6,12}" title="Cedula es un campo numerico">
	    </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-sm-6 my-1">
      	<div class="form-group">
	    	<label for="usua_est">Estado</label>
		    <select name="usua_est" class="form-control" id="add_usua_est" required>
				<option value="">Seleccione</option>
				<option value="Activo" >Activo</option>
				<option value="Inactivo" >Inactivo</option>
			</select>
	    </div>
      </div>
      <div class="col-sm-6 my-1">
      	<div class="form-group">
	    	<label for="usua_rol">Rol</label>
		    <select name="usua_rol" class="form-control" id="add_usua_rol" required>
				<option value="">Seleccione</option>
				<option value="Operario" >Operario</option>
				<option value="Administrador" >Administrador</option>
			</select>
	    </div>
      </div>
  </div>
    <div class="form-row align-items-center">
      <div class="col-sm-8 my-1">
      	<div class="form-group">
	    	<label for="usua_ema">Correo electronico</label>
		    <input type="email" name="usua_ema" class="form-control" id="add_usua_ema" required pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" title="example@example.com" autocomplete="off">
	    </div>
      </div>
      <div class="col-sm-4 my-1">
      	<div class="form-group">
	    	<label for="usua_pas">Contraseña</label>
		    <input type="password" name="usua_pas" class="form-control" id="add_usua_pas"  required autocomplete="off"> 
	    </div>
      </div>
    </div>      	
    <div class="form-row align-items-center">
        <div class="col-sm-12 my-1">
            <div class="form-group">
		        <label>Cargar imagen</label>
		        <div class="input-group add-image-preview">
		            <input type="text" class="form-control image-preview-filename" id="add_usua_img" disabled="disabled">
		            <span class="input-group-btn">
		                <button type="button" class="btn btn-secondary image-preview-clear" id="add-image-preview-clear" style="display:none;">
		                    <span class="fa fa-times"></span> Quitar
		                </button>
		                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
		                <div class="btn btn-secondary image-preview-input" id="add-image-preview-input" data-placement="top">
		                    <span class="fa fa-upload"></span>
		                    <span class="image-preview-input-title" id="add-input-img-title">Subir</span>
		                    <input type="file" accept="image/png, image/jpeg, image/gif" id="add-inp-usa_img" name="usua_img" required />
		                </div>
		            </span>
		        </div>
		    </div>
        </div>
    </div>
	<button type="submit" id="add-btn_guardar" class="btn btn-success">Guardar</button>
	<input type="hidden" name="crud" value="add">
</form>
<script type="text/javascript">
	function limpiar_add(){
		$('.add-image-preview').attr("data-content","").popover('hide');
        $('#add_usua_img').val("");
        $('#add-image-preview-clear').hide();
        $('#add-image-preview-input input:file').val("");
        $("#add-input-img-title").text("Subir");
	};
	document.getElementById('add_usua_pas').addEventListener('input', function(evt) {
	    const usua_pas = evt.target,
	    inp = document.getElementById('add_usua_pas')
	    btn = document.getElementById('add-btn_guardar'),
	    regex = /^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ]/;
	    btn.disabled = true;
	    inp.setAttribute("style", "");
      	$('#add_usua_pas').popover({
	        trigger:'focus',
	        html:true,
	        placement:'auto'
	    });
	    if (regex.test(usua_pas.value)) {
	      $('#add_usua_pas').attr("data-content","").popover('hide');
	      inp.setAttribute("style", "");
	      btn.disabled = false;
	    } else {
		    $('#add_usua_pas').attr("data-content","<p style='color:red;'>Minimo una letra mayuscula, una minuscula y un numero<p>").popover('show');
		    inp.setAttribute("style", "box-shadow:0px 0px 10px 0px rgba(255,0,0,1);border-color: rgba(255,0,0,1)");
	      	btn.disabled = true;
	    }
	});
</script>