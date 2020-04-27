<?php 
	$result_controller = new ParqueaderoController();
  $result = $result_controller->sel(); 
  $num_result = empty($result) ? 0 : count($result); 
  $usuario_controller = new UsuarioController();
  $usuario = $usuario_controller->sel(); 
  $num_usuario = empty($usuario) ? 0 : count($usuario); 
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<title>Escritorio | Find Parking</title>
<div class="cont-pad-tre">
	<style type="text/css" media="screen">
  #map {
        height: 400px;
      }  
  </style>
  <div class="esc-secc">
    <div class="esc-item">
      <div class="esc-tit">
        Parqueaderos registrados
        <i class="fa fa-parking"></i>
      </div>
      <div class="esc-text">
        <h1><?php echo $num_result ?></h1>
      </div>
    </div>
    <div class="esc-item">
      <div class="esc-tit">
        Usuarios registrados
        <i class="fa fa-users"></i>
      </div>
      <div class="esc-text">
        <h1><?php echo $num_usuario ?></h1>
      </div>
    </div>
    <div class="esc-item">
      <div class="widget">
        <div class="fecha">
          <p id="diaSemana" class="diaSemana"></p>
          <p id="dia" class="dia"></p>
          <p>de </p>
          <p id="mes" class="mes"></p>
          <p>del </p>
          <p id="year" class="year"></p>
        </div>
        <div class="reloj">
          <p id="horas" class="horas"></p>
          <p>:</p>
          <p id="minutos" class="minutos"></p>          
          <p>:</p>

          <div class="caja-segundos">
            <p id="ampm" class="ampm"></p>
            <p id="segundos" class="segundos"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="map-sec">
  	<div id="map"></div>
  </div>
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUn955lxF_sZt7ecu6WPg5ArJO8GwmrQs&callback=initMap"
    async defer></script>
</div>

<script>
	$(document).ready(function () {
	  $('#tbl_resultados').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	});
</script>
	

