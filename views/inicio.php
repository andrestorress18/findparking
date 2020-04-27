<title>Inicio | Find Parking</title>
<div class="header-cont header-inicio">
	<div class="header-color">
		<div class="menu-top">
			<div class="header-logo">
				<img src="./public/img/system/find parking-w.png" alt="">
			</div>
			<ul class="menu-prin">				
				<li><a href="inicio" title="">Inicio</a></li>
				<li><a href="mapa-parking" title="">Mapa de parqueaderos</a></li>
				<li>
				<?php if ($_SESSION['Sesion'] == true) {
					echo "<a class='btn-sesion' href='escritorio' title=''>Administrar</a>";
				}else{
					echo "<a class='btn-sesion' href='login' title=''>Iniciar Sesión</a>";
				} ?>
				</li>
			</ul>
		</div>
		<div class="bar-title">
			<div class="cont-left">
				<h1 class="tit-uno">Plataforma de administración<br>y visualización de parqueaderos publicos</h1>
				<p>¡No te pierdas, encuentra la mejor opción!</p>
			</div>
			<div class="cont-left">
				<img class="img-banner" src="./public/img/system/parking.png" alt="">
			</div>			
		</div>
	</div>
</div>
<div class="width-100-pto cont-flex cont-just-saro cont-app">
		<h1>Caracteristicas básicas</h1>
		<div class="width-100-pto cont-flex cont-just-saro">
			<div class="width-70-pto">
				<ul class="cont-cara-items">
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-shield-alt"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Seguridad</h3>
						</div>
					</li>
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-file-invoice-dollar"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Digital</h3>
						</div>
					</li>
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-mail-bulk"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Correo Electronico</h3>
						</div>
					</li>
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-history"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Historial</h3>
						</div>
					</li>
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-map-marked-alt"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Ubicación</h3>
						</div>
					</li>
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-users"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Multiusuario</h3>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<div class="vs-cont-quien">
	<div class="vs-quien">
		<div class="vs-left">
			<h2>Find Parking</h2>
			<p>El propósito del software contable Find Parking a desarrollar, es brindar una eficiente solución a las diferentes empresas que generar una contabilidad básica de su producción, de una manera viable y fácil a adquirir a dichos usuarios, satisfaciendo la necesidad de almacenar información de vital importancia para sus finanzas, y que se compone básicamente por diferentes funciones que permiten mostrar cálculos de las cuentas registradas.</p>
		</div>
		<div class="vs-right">
			<img src="public/img/system/find parking-h.png" alt="">
		</div>
	</div>
</div>
