<?php 
	//$vivero_controller = new ViverosController();
	//$vivero = $vivero_controller->get($_GET['cod']);
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cuentas', 'Hours per Day'],
          ['Activo',    120000],
          ['Pasivo',      457100],
          ['Ingresos',  1748200],
          ['Gastos', 548100],
          ['Costos',   259000]
        ]);

        var options = {
          title: 'Estado de resultados',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
<title>Escritorio | Find Parking</title>
<div class="cont-pad-tre">
	<style type="text/css" media="screen">
  #map {
        height: 400px;
      }  
  </style>
  <div class="map-sec">
  	<div id="map"></div>
  	<b>Total de parqueaderos: </b> 52
  	<b>Disponibilidad: </b> 50%
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
	<div class="contenedor-flex cont-just-sbet">
		<div class="cont-cuat">
			<div id="donutchart" class="grafi-cont"></div>
		</div>
		<div class="cont-seis">
			<div id="curve_chart" class="grafi-cont" style="width: 100%; height: 400px"></div>
		</div>
	</div>
	<div class="container-tabla">
	
</div>
</div>
<script>
	$(document).ready(function () {
	  $('#tbl_resultados').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	});
</script>
	

