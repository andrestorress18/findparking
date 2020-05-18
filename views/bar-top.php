<div class="menu-top">
	<div class="bar-top-logo">
		<img src="public/img/system/find parking-y.png" alt="">
	</div>
	<div class="menu-option">		
		<div class="usu-option">
			<div id="usu-menu"  class="usu-menu">
				<input  name="view-menu" id="view-menu">
    			<label for="view-menu">
    				<div class="usu-photo">
						<img src="<?php echo $_SESSION['usua_img']; ?>" alt="">
					</div>
					<?php echo $_SESSION['usua_nom']; ?>
					<i class="fa fa-ellipsis-v"></i>
				</label>
				<div class="sub-menu">
					<ul class="list">
						<li><button class="btn-cpas" type="button" data-toggle="modal" data-name="" data-target="#Modal-datos-user" >
								<i class="fas fa-user"></i>Datos de usuario
							</button>
						</li>
						<li><button class="btn-cpas" type="button" data-toggle="modal" data-name="" data-target="#Modal-pass" >
								<i class="fas fa-key"></i>Cambio de contraseña
							</button>
						</li>
						<li><button class="btn-cpas" type="button" data-toggle="modal" data-name="" data-target="#Modal-empresa" >
								<i class="fas fa-building"></i>Datos de empresa
							</button>
						</li>
						<li><a href="ayuda" ><i class="fa fa-question-circle"></i><div class="btn-bars-resp">Manual de usuario</div></a>
						</li>
						<li><a href="cerrar" ><i class="fas fa-power-off"></i>Cerrar sesión</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
 	$modal = new FunctionModel();
 	$modal->ventana_modal("empresa","", "lg", "Información de empresa", "form-datos-enti");
    $modal->ventana_modal("pass","", "", "Cambiar Contraseña", "form-password");		
    $modal->ventana_modal("datos-user","", "lg", "Datos de usuario", "form-datos-user");		
 ?>