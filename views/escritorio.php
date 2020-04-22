<?php 
	//$vivero_controller = new ViverosController();
	//$vivero = $vivero_controller->get($_GET['cod']);
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
        Cupos disponibles
        <i class="fa fa-eye"></i>
      </div>
      <div class="esc-text">
        <h1>10</h1>
      </div>
    </div>
    <div class="esc-item">
      <div class="esc-tit">
        Vehiculos ingresados
        <i class="fa fa-car"></i>
      </div>
      <div class="esc-text">
        <h1>85</h1>
      </div>
    </div>
    <div class="esc-item">
      <div class="esc-tit">
        Ingresos del día
        <i class="fa fa-dollar-sign"></i>
      </div>
      <div class="esc-text">
        <h1>$ 157.000</h1>
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
    {lat: 4.347035, lng: -74.362679}, 
    {lat: 4.345929, lng: -74.357715},
    {lat: 4.342733, lng: -74.359978},
    {lat: 4.347828, lng: -74.359346},
    {lat: 4.339668, lng: -74.362548}
  ];
  // The map, centered at Uluru
  var map = new google.maps.Map(
    document.getElementById('map'), {
      zoom: 16, 
      center: center
    }
  );
  for (i = 0 ; i< lugares.length; i++) {

    var marker = new google.maps.Marker(
      {position: lugares[i], 
        map: map}
    );

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
	

