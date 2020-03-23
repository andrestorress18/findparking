<div class="form-row align-items-center container-flex">
    <div class="container-flex cont-just-cen img-user">
    	<img src="<?php echo $_SESSION['usua_img'] ?>" class="rounded mx-auto d-block" width="180" height="180" alt="">
    </div>
    <div class="info-user">
		<div class="form-row align-items-center">
		    <div class="col-sm-7 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">Nombre</div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $_SESSION['usua_nom'] ?>">
		        </div>
		    </div>
		    <div class="col-sm-5 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">Cedula</div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $_SESSION['usua_ced'] ?>">
		        </div>
		    </div>
		</div>
		<div class="form-row align-items-center">
		    <div class="col-sm-12 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">Correo</div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $_SESSION['usua_ema'] ?>">
		        </div>
		    </div>
		</div>
		<div class="form-row align-items-center">
			<div class="col-sm-6 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">Celular</div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $_SESSION['usua_tel'] ?>">
		        </div>
			</div>
		    <div class="col-sm-6 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">Dirección</div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $_SESSION['usua_dir'] ?>">
		        </div>
			</div>
		</div>
    </div>
</div>