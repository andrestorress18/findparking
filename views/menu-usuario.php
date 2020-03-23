<input for="btn-bars" id="btn-bars" type="checkbox">
<label for="btn-bars"><i class="fa fa-bars"></i></label>
<div class="menu-left">
	<div>
		<div class="menu-cab">
			<div class="menu-cab-img">
				<img src="./public/img/system/find parking-h.png" alt="">
			</div>
		</div>
		<div class="menu-usu">
			<div class="menu-usu-img">
				<div class="usu-img">
					<img src="<?php echo $_SESSION['usua_img']; ?>" alt="">
				</div>
				<span class="usu-rol"><?php echo substr($_SESSION['usua_nom'], 0, 1); ?></span>
			</div>
			<div class="menu-usu-text btn-bars-resp">
				<div>
				    Bienvenido<br/>
				    <span class="usu-nom"><?php echo $_SESSION['usua_nom']; ?></span>
			    </div>
			</div>
		</div>
		<ul class="menu">
			<li class="menu-item"><a href="inicio" ><div class="item-icon"><span class="fa fa-home"></span></div><div class="btn-bars-resp">Inicio</div></a></li>
			<li class="menu-item <?php echo ($_GET['r']=='escritorio')?'item-select':'';?>"><a href="escritorio" ><div class="item-icon"><span class="fa fa-chart-pie"></span></div><div class="btn-bars-resp">Escritorio</div></a></li>
			<li class="menu-item <?php echo ($_GET['r']=='registro')?'item-select':'';?>"><a href="registro" ><div class="item-icon"><span class="fa fa-car"></span></div><div class="btn-bars-resp">Registro</div></a></li>
			<li class="menu-item <?php echo ($_GET['r']=='facturar')?'item-select':'';?>"><a href="facturar" ><div class="item-icon"><span class="fa fa-dollar-sign"></span></div><div class="btn-bars-resp">Facturar</div></a></li>			
			<?php if ($_SESSION['usua_rol'] == "Super administrador" OR $_SESSION['usua_rol'] == "Administrador") {?>
				<li class="menu-item <?php echo ($_GET['r']=='parqueaderos')?'item-select':'';?>"><a href="inventario" ><div class="item-icon"><span class="fa fa-parking"></span></div><div class="btn-bars-resp">Parqueaderos</div></a></li>
				<li class="menu-item <?php echo ($_GET['r']=='usuarios')?'item-select':'';?>"><a href="usuarios" ><div class="item-icon"><span class="fa fa-users"></span></div><div class="btn-bars-resp">Usuarios</div></a></li>
			<?php } ?>
			<li class="menu-item <?php echo ($_GET['r']=='ayuda')?'item-select':'';?>"><a href="ayuda" ><div class="item-icon"><span class="fa fa-info-circle"></span></div><div class="btn-bars-resp">Ayuda</div></a></li>		
			
		</div>
	<div class="copyright">
		<div class="copyright-img">
		  <img src="./public/img/system/findParking-ico.png">
		</div>
		<div class="btn-bars-resp">
			 <a href="/findParking.com" title="">FindParking © <?php echo date("Y"); ?></a> <!--| <a href="https://develtec.net">Develtec</a>-->
		</div>
	</div>
</div>
