<title>Error 401 | Find Parking</title>
<div class="e401 container-flex cont-just-cen cont-ialg-cent" >
	<div class="container-e401">
		<img src="./public/img/system/findparking-error-401.png" alt="Recurso no encontrado" width="70%">
		<div class="e401-text">
			<h4>Usted no cuenta con los permisos para acceder a <b><?php echo $_GET['r']; ?></b>.</h4>
			<h6>Eso es todo lo que sabemos.</h6>
			<button type="button" class="btn btn-secondary btn-sm" onclick="history.back()"><i class="fa fa-chevron-left"></i> Regresar</button>
		</div>
	</div>	
</div>