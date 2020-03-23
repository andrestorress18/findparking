<form enctype="multipart/form-data" method="POST">
	<input type="hidden" name="usua_cod" id="edi_usua_cod">
    <div class="form-row align-items-center">
      <div class="col-sm-8 my-1">
      	<div class="form-group">
	    	<label for="usua_nom">Nombre</label>
		    <input type="text" name="usua_nom" class="form-control" id="edi_usua_nom" required>
	    </div>
      </div>
      <div class="col-sm-4 my-1">
      	<div class="form-group">
	    	<label for="usua_ced">Cedula</label>
		    <input type="text" name="usua_ced" class="form-control" id="edi_usua_ced" required pattern="[0-9]{6,12}" title="Cedula es un campo numerico">
	    </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-sm-6 my-1">
      	<div class="form-group">
	    	<label for="usua_ema">Correo electronico</label>
		    <input type="email" name="usua_ema" class="form-control" id="edi_usua_ema" required pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" title="example@example.com">
	    </div>
      </div>
      <div class="col-sm-6 my-1">
      	<div class="form-group">
	    	<label for="usua_pas">Contraseña</label>
	    	<input type="password" name="usua_pas" class="form-control" id="New_usua_pas">
	    	<div class="input-group mb-3">
			    <input type="password" class="form-control" id="edi_usua_pas" required disabled>
			    <div class="input-group-append">
			    	<input type="button" id="edi-pas"  class="btn btn-secondary image-preview-input" value="Editar">
			  	</div>
			</div>
	    </div>
      </div>
    </div>
    <div class="form-row align-items-center">
        <div class="col-sm-12 my-1">
            <div class="form-group">
		        <label>Cargar imagen</label>
		        <div class="input-group edi-image-preview">
		            <input type="text" class="form-control image-preview-filename" id="edi_usua_img" disabled="disabled">
		            <input type="button" id="edi-img"  class="input-group-btn btn btn-secondary image-preview-input" value="Cambiar imagen">
		            <span hidden id="spn-inp-file" class="input-group-btn">
		                <button type="button" class="btn btn-secondary image-preview-clear" id="edi-image-preview-clear" style="display:none;">
		                    <span class="fa fa-times"></span> Quitar
		                </button>
		                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
		                <div class="btn btn-secondary image-preview-input" id="edi-image-preview-input" data-placement="bottom">
		                    <span class="fa fa-upload"></span>
		                    <span class="image-preview-input-title" id="edi-input-img-title">Subir</span>
					        <input type="file" accept="image/png, image/jpeg, image/gif" id="usua_img" name="usua_img" required />
		                </div>
		            </span>
		        </div>
		    </div>
        </div>
    </div>
	<button type="submit" id="btn_guardar" class="btn btn-success">Guardar</button>
	<input type="hidden" name="crud" value="edi">
</form>
<script type="text/javascript">
	function limpiar_edi(){
		$('.edi-image-preview').attr("data-content","").popover('hide');
        $('#edi_usua_img').val("");
        $('#edi-image-preview-clear').hide();
        $('#edi-image-preview-input input:file').val("");
        $("#edi-input-img-title").text("Subir");
	};
	function cargar_listas() {
		document.getElementById('btn_guardar').disabled = false;
		document.getElementById("New_usua_pas").required = false;
		inp = document.getElementById("New_usua_pas");
		inp.value = '';
		inp.hidden = true;
		document.getElementById("edi_usua_pas").hidden = false;
		document.getElementById("edi-pas").hidden = false;
		document.getElementById("spn-inp-file").hidden = true;
		document.getElementById("edi-img").hidden = false;
		document.getElementById("usua_img").required = false;
     	document.ready = document.getElementById("usua_enti_fk").value = document.getElementById("edi_usua_enti_fk").value;
     	document.ready = document.getElementById("usua_est").value = document.getElementById("edi_usua_est").value;
     	document.ready = document.getElementById("usua_rol").value = document.getElementById("edi_usua_rol").value;
     	var path = document.getElementById("edi_usua_img").value
     	document.ready = document.getElementById("edi_usua_img").value = path.split('/').reverse()[0];
	};
	$(document).on('click', '#edi-img', function(){ 
		  document.getElementById("spn-inp-file").hidden = false;
		  document.getElementById("edi-img").hidden = true;
		  document.getElementById("usua_img").required = true;
		  document.getElementById("edi_usua_img").value = '';
	});
	$(document).on('click', '#edi-pas', function(){ 
		  inp = document.getElementById("New_usua_pas");
		  inp.value = '';
		  inp.hidden = false;
		  document.getElementById("New_usua_pas").required = true;
		  document.getElementById("edi_usua_pas").hidden = true;
		  document.getElementById("edi-pas").hidden = true;
	});
	document.getElementById('New_usua_pas').addEventListener('input', function(evt) {
	    const usua_pas = evt.target,
	    inp = document.getElementById('New_usua_pas'),
	    btn = document.getElementById('btn_guardar'),
	    regex = /^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ]/;
	    btn.disabled = false;
	    inp.setAttribute("style", "");
      	$('#New_usua_pas').popover({
	        trigger:'focus',
	        html:true,
	        placement:'auto'
	    });
	    if (regex.test(usua_pas.value)) {
	      $('#New_usua_pas').attr("data-content","").popover('hide');
	      inp.setAttribute("style", "");
	      btn.disabled = false;
	    } else {
	    	if (document.getElementById("New_usua_pas").hidden == false) {
			    $('#New_usua_pas').attr("data-content","<p style='color:red;'>Minimo una letra mayuscula, una minuscula y un numero<p>").popover('show');
			    inp.setAttribute("style", "box-shadow:0px 0px 10px 0px rgba(255,0,0,1);border-color: rgba(255,0,0,1)");
		      	btn.disabled = true;	    		
	    	}
	    }
	});
</script>