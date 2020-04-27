<?php 
  $result_controller = new ParqueaderoController();
  $result = $result_controller->sel(); 
  $num_result = empty($result) ? 0 : count($result); 
  $usuario_controller = new UsuarioController();
  $usuario = $usuario_controller->sel(); 
  $num_usuario = empty($usuario) ? 0 : count($usuario); 
?>
<title>Mapa de parking | Find Parking</title>
  <style type="text/css" media="screen">
  #map {
        height: 100vh;
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUn955lxF_sZt7ecu6WPg5ArJO8GwmrQs&callback=initMap"
    async defer></script>