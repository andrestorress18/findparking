<script>
    $(function(){
        $("#adicionar").on('click',function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        });
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
        $("#adicionarUsu").on('click',function(){
            $("#tablaUsu tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tablaUsu");
        });
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });
</script>
<form enctype="multipart/form-data" method="POST" autocomplete="off">
	<div class="form-row align-items-center">
	  	<div class="col-sm-6 my-1">
	  		<div class="form-group">
			    <label for="parq_nom">Nombre del parqueadero:</label>
	    		<input type="text" name="parq_nom" class="form-control" id="add_parq_nom"  required autocomplete="off"> 
	    	</div>
	  	</div>
	  	<div class="col-sm-3 my-1">
	  		<div class="form-group">
			    <label for="parq_log">Longitud:</label>
	    		<input type="text" name="parq_log" class="form-control" id="add_parq_log"  required autocomplete="off"> 
	    	</div>
	  	</div>
	  	<div class="col-sm-3 my-1">
	  		<div class="form-group">
			    <label for="parq_lat">Latitud:</label>
	    		<input type="text" name="parq_lat" class="form-control" id="add_parq_lat"  required autocomplete="off"> 
	    	</div>
	  	</div>
	</div>
	<div class="form-row align-items-center">
		<div class="col-sm-12 my-1">
	  		<div class="form-group">
			    <label for="parq_des">Descripción:</label>
			    <textarea name="parq_des" class="form-control" id="add_parq_des"></textarea>
	    	</div>
	  	</div>
	</div>
	<div class="form-row align-items-center">
		<div class="col-sm-3 my-1">
	  		<div class="form-group">
			    <label for="parq_tar">Tarifa hora:</label>
	    		<input type="text" name="parq_tar" class="form-control" id="add_parq_tar"  required autocomplete="off"> 
	    	</div>
	  	</div>	  	
		<div class="col-sm-9 my-1">
            <div class="form-group">
		        <label>Cargar imagen</label>
		        <div class="input-group add-image-preview">
		            <input type="text" class="form-control image-preview-filename" id="add_parq_fot" disabled="disabled">
		            <span class="input-group-btn">
		                <button type="button" class="btn btn-secondary image-preview-clear" id="add-image-preview-clear" style="display:none;">
		                    <span class="fa fa-times"></span> Quitar
		                </button>
		                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
		                <div class="btn btn-secondary image-preview-input" id="add-image-preview-input" data-placement="top">
		                    <span class="fa fa-upload"></span>
		                    <span class="image-preview-input-title" id="add-input-img-title">Subir</span>
		                    <input type="file" accept="image/png, image/jpeg, image/gif" id="add-inp-usa_img" name="parq_fot" required />
		                </div>
		            </span>
		        </div>
		    </div>
        </div>
    </div>
    <div class="form-row align-items-center">
    	<div class="col-sm-11 my-1"><label for="parq_cap">Agregar cupos al parqueadero:</label></div>
    	<div class="col-sm-1 my-1">
			<button id="adicionar" type="button" class="form-control btn-primary"><i class="fas fa-plus"></i></button>  
		</div> 
    	<div class="col-sm-12 my-1">
			<table id="tabla">
		        <tr class="fila-fija">
		            <td>
		                <select class="form-control" required name="cupa_cupo_fk[]" >
			                <option value="">Seleccione el cupo</option>
			                <?php
			                    $cupos      = new parqueaderoController();
			                    $cupos_data = $cupos->sel_cupo();
			                    $num_cupos    = count($cupos_data);
			                    for ($regist = 0; $regist < $num_cupos; $regist++) {
			                        echo '<option value="' . $cupos_data[$regist]['cupo_cod'] . '" >' . $cupos_data[$regist]['cupo_ref']."</option>";
			                    }
			                ?>
			            </select>
		            </td>
		            <td>
		            	<select class="form-control" id="add_cupa_cub" onchange="seleccion(this)" required name="cupa_cub[]" >
		            		<option value="0">Cubierto</option>
		               		<option value="1">No cubierto</option>
		                </select>
		            </td>
		            <td>
		                <input type="text" name="cupa_dim[]" placeholder="Dimensiones (Metros)" class="form-control" id="add_cupa_dim"  required> 
		            </td>
		            <td class="eliminar"><button type="button" class="btn btn-cir-uno usua-col"><i class="fa fa-times"></i></button></td>
		        </tr>
		    </table>
		</div>	
    </div>
    <div class="form-row align-items-center">
    	<label for="parq_cap">Agregar usuarios al parqueadero:</label>
    	<div class="col-sm-9 my-1">
			<table id="tablaUsu">
		        <tr class="fila-fija">
		            <td>
		                <select class="form-control" id="add_usua_fk" onchange="seleccion(this)" required name="gest_usua_fk[]" >
		                    <option value="">Seleccione el usuario</option>
		                    <?php
		                        $usuario      = new UsuarioController();
		                        $usuario_data = $usuario->sel();
		                        $num_usuario   = count($usuario_data);
		                        for ($regist = 0; $regist < $num_usuario; $regist++) {
		                            echo '<option value="' . $usuario_data[$regist]['usua_cod'] . '" >'.$usuario_data[$regist]['usua_nom'] .' - '. $usuario_data[$regist]['usua_rol']."</option>";
		                        }
		                    ?>
		                </select>
		            </td>
		            <td class="eliminar"><button type="button" class="btn btn-cir-uno usua-col"><i class="fa fa-times"></i></button></td>
		        </tr>
		    </table>
		</div>
		<div class="col-sm-3 my-1">
			<button id="adicionarUsu" type="button" class="form-control btn-primary"><i class="fas fa-plus"></i>  Adicionar</button>  
		</div>  	
    </div>
    <button type="submit" class="btn btn-success">Registrar</button>
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
</script>