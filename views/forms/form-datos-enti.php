<?php 
$empresa_controller = new EmpresaController();
$empresa = $empresa_controller->get(); 
$num_empre = empty($empresa) ? 0 : count($empresa); 
for ($n = 0; $n < $num_empre; $n++) {
 ?>
<div class="form-row align-items-center container-flex">
    <div class="container-flex cont-just-cen img-user">
    	<img src="<?php echo $empresa[$n]['enti_img'] ?>" class="rounded mx-auto d-block" width="180" height="180" alt="">
    </div>
    <div class="info-user">
		<div class="form-row align-items-center">
		    <div class="col-sm-7 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">Nombre</div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $empresa[$n]['enti_nom'] ?>">
		        </div>
		    </div>
		    <div class="col-sm-5 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">NIT</div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $empresa[$n]['enti_nit'] ?>">
		        </div>
		    </div>
		</div>
		<div class="form-row align-items-center">
		    <div class="col-sm-12 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">Correo</div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $empresa[$n]['enti_ema'] ?>">
		        </div>
		    </div>
		</div>
		<div class="form-row align-items-center">
			<div class="col-sm-6 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">Tipo</div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $empresa[$n]['enti_tip'] ?>">
		        </div>
			</div>
		    <div class="col-sm-6 my-1">
		        <div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">Ubicación</div>
					</div>
					<input type="text" disabled class="form-control" value="<?php echo $empresa[$n]['enti_ciu'].', '. $empresa[$n]['enti_pai']; ?>">
		        </div>
			</div>
		</div>
    </div>
</div>
<?php } ?>