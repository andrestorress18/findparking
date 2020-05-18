<div class="form-row align-items-center container-flex">
	<?php if (empty($_SESSION['parq_fot'])) {?>
    <div class="container-flex cont-just-cen img-user">
    	<img src="public/img/system/findParking-ico.png" class="rounded mx-auto d-block" width="180" height="180" alt="">
    </div>
    <div class="info-user">
		<div class="form-row align-items-center">
		    <div class="col-sm-7 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>Nombre</b></div>
					</div>
					<input type="text" disabled class="form-control" value="FindParking">
		        </div>
		    </div>
		    <div class="col-sm-5 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>NIT</b></div>
					</div>
					<input type="text" disabled class="form-control" value="1234568985">
		        </div>
		    </div>
		</div>
		<div class="form-row align-items-center">
		    <div class="col-sm-12 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>Correo</b></div>
					</div>
					<input type="text" disabled class="form-control" value="info@findparking.com">
		        </div>
		    </div>
		</div>
		<div class="form-row align-items-center">
			<div class="col-sm-6 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>Tipo</b></div>
					</div>
					<input type="text" disabled class="form-control" value="Servicio publico">
		        </div>
			</div>
		    <div class="col-sm-6 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>Ubicación</b></div>
					</div>
					<input type="text" disabled class="form-control" value="Fusagasugá, Cundinamarca">
		        </div>
			</div>
		</div>
    </div>
	<?php }else{?>
	<div class="container-flex cont-just-cen img-user">
    	<img src="<?php echo $_SESSION['parq_fot'];?>" class="rounded mx-auto d-block" width="180" height="180" alt="">
    </div>
    <div class="info-user">
		<div class="form-row align-items-center">
		    <div class="col-sm-7 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>Parqueadero</b></div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $_SESSION['parq_nom']; ?>">
		        </div>
		    </div>
		    <div class="col-sm-5 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>Tarifa</b></div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $_SESSION['parq_tar']; ?>">
		        </div>
		    </div>
		</div>
		<div class="form-row align-items-center">
		    <div class="col-sm-12 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>Descripción</b></div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $_SESSION['parq_des']; ?>">
		        </div>
		    </div>
		</div>
	</div>
	<?php } ?>
</div>