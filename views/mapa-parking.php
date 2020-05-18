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
    <div class="form-busqueda d-flex align-items-start flex-column bd-highlight mb-3">
        <div class="p-2 bd-highlight">
          <div class="busq-logo">
            <img src="./public/img/system/find parking-w.png" alt="">
          </div>
          <div class="busq-menu">
            <ul>
              <li><a href="inicio"><i class="fa fa-home"></i></a></li>
              <li><a href="escritorio"><i class="fa fa-cogs"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="busq-info p-2 bd-highlight">
          <h6>Busqueda rápida de parqueaderos</h6>
           <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
            <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
              aria-label="Search">
            <i class="fas fa-search" aria-hidden="true"></i>
          </form>
        </div>
        <div class="mt-auto p-2 bd-highlight">
          <table>
            <tbody>
              <tr>
                <td style="padding: 0px 10px 0px 0px"><img src="./public/img/system/udec-logo.png" width="100" alt=""></td>
                <td style="border-left: 1px solid #fff; color: #fff;padding: 0px 0px 0px 10px">Copyright © FindParking 2020</td>
              </tr>
            </tbody>
          </table>
          
        </div>
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