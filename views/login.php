<?php 
	$result_controller = new ParqueaderoController();
  $result = $result_controller->sel(); 
  $num_result = empty($result) ? 0 : count($result); 
  $usuario_controller = new UsuarioController();
  $usuario = $usuario_controller->sel(); 
  $num_usuario = empty($usuario) ? 0 : count($usuario); 
if ($_SESSION['Sesion'] == true) {
	$controller  = new ViewController();
	$controller->load_view_user('resultados');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta property="og:url" content="http://" />
	<meta property="og:title" content="" />
	<meta property="og:type" content="" />
	<meta property="og:description" content="" />
	<meta name="descripcion" content="" />
	<meta property="og:image" content="https://develtec.net/" />
	<meta name="theme-color" content="#ED3237">
	<meta name="keywords" content="jquery, css3, java, sliding, box, menu, cube, navigation, portfolio, thumbnails" />
	<link rel="icon" type="image/png" href="public/img/system/findParking-ico.png" />
	<meta name="viewport" content="width=device-width, user=scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" href="./public/css/all.min.css">
	<link rel="stylesheet" href="./public/css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="./public/js/jquery-min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="./public/js/findparking.js"></script>
	<link href="./public/css/datatables.min.css" rel="stylesheet">
	<script type="text/javascript" src="./public/js/datatables.min.js"></script>
</head>
<body>
	<title>Iniciar sesión | Find Parking</title>
	<div class="contenedor-fixed">
		<div class="contenedor-color">
			<div class="contenedor-login">
				<div class="login-form">
					<div class="container">
					  	<form method="post">
						  	<center>
						  		<div class="login-img">
						  			<img class="img-1" src="./public/img/system/find parking-h.png" width="100" alt="">
						  			<img class="img-2" src="./public/img/system/find parking-w.png" width="100" alt="">
						  		</div><br>
						        <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Correo"><br>
						        <input type="password" class="form-control" name="pass" id="inputPassword3" placeholder="Contraseña"><br>
						        <button type="submit" class="btn btn-primary">Ingresar</button>
								<?php if (!empty($_GET["error"])) {
								    $template = '
										<br><br><div class="alert alert-danger" role="alert>
											<div class="item  error">%s</div>
										</div>
									';

								    printf($template, $_GET['error']);
								}?>
							<center>
						</form>
					</div>
				</div>
			</div>				
			<div class="login-map">
				<style type="text/css" media="screen">
				  	#map {
				        height: 400px;
				    }  
				</style>
		    	<div id="map"></div>
		    	<script>
				    // Initialize and add the map
				    function initMap() {
				      // The location of Uluru
				      var center = {lat: 4.347035, lng: -74.362679};

				      var lugares =[
				      <?php 
				      $template_map = "";
				      for ($m = 0; $m < $num_result; $m++) {
				        $template_map .= "{lat: ".$result[$m]['parq_lat'].", lng: ".$result[$m]['parq_log']."},";  
				      }
				      $template_map = substr($template_map, 0, -1);
				      echo $template_map;
				       ?>
				        
				      ];
				      // The map, centered at Uluru
				      var map = new google.maps.Map(
				        document.getElementById('map'), {
				          zoom: 15, 
				          center: center
				        }
				      );
				      for (i = 0 ; i< lugares.length; i++) {

				        var marker = new google.maps.Marker(
				          {position: lugares[i], 
				            map: map}
				        );
				        marker.setIcon('./public/img/system/parking-ico-map.png');
				        var temInfo = {
				          content: '<div style="height: 150px;width:300px;">Información de prueba</div>'
				        }
				        var infoMarker = new google.maps.InfoWindow(temInfo);
				        google.maps.event.addListener(marker,'click',function(){
				          infoMarker.open(map,marker);
				        })
				      }
				    }
				  </script>
		    	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUn955lxF_sZt7ecu6WPg5ArJO8GwmrQs&callback=initMap" async defer></script>
			</div>
		</div>
	</div>
</body>
</html>

