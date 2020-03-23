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
<title>Resultados | Find Parking</title>
<div class="cont-pad-tre">
	<div class="contenedor-flex cont-just-sbet">
		<div class="cont-cuat">
			<div id="donutchart" class="grafi-cont"></div>
		</div>
		<div class="cont-seis">
			<div id="curve_chart" class="grafi-cont" style="width: 100%; height: 400px"></div>
		</div>
	</div>
	<div class="container-tabla">
	<table id="tbl_resultados" class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col">Codigo</th>
	      <th scope="col">Descripción</th>
	      <th scope="col">Valor</th>
	      <th scope="col">Tipo</th>
	      <th scope="col">Cuenta</th>
	      <th scope="col">Usuario</th>
	      <th scope="col">Periodo</th>
	      <th scope="col">Estado</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <th scope="row">1</th>
	      <td>Venta de productos A</td>
	      <td>1.220.000</td>
	      <td>4 - Ingresos</td>
	      <td>41 - Operacionales</td>
	      <td>Andres Torres</td>
	      <td>20/11/2019 - 20/11/2019</td>
	      <td>Pendiente</td>
	    </tr>
	    <tr>
	      <th scope="row">2</th>
	      <td>Venta de productos A</td>
	      <td>1.220.000</td>
	      <td>4 - Ingresos</td>
	      <td>41 - Operacionales</td>
	      <td>Andres Torres</td>
	      <td>20/11/2019 - 20/11/2019</td>
	      <td>Pendiente</td>
	    </tr>
	    <tr>
	      <th scope="row">3</th>
	      <td>Venta de productos A</td>
	      <td>1.220.000</td>
	      <td>4 - Ingresos</td>
	      <td>41 - Operacionales</td>
	      <td>Andres Torres</td>
	      <td>20/11/2019 - 20/11/2019</td>
	      <td>Pendiente</td>
	    </tr>
	    <tr>
	      <th scope="row">4</th>
	      <td>Venta de productos A</td>
	      <td>1.220.000</td>
	      <td>4 - Ingresos</td>
	      <td>41 - Operacionales</td>
	      <td>Andres Torres</td>
	      <td>20/11/2019 - 20/11/2019</td>
	      <td>Pendiente</td>
	    </tr>
	    <tr>
	      <th scope="row">5</th>
	      <td>Venta de productos A</td>
	      <td>1.220.000</td>
	      <td>4 - Ingresos</td>
	      <td>41 - Operacionales</td>
	      <td>Andres Torres</td>
	      <td>20/11/2019 - 20/11/2019</td>
	      <td>Pendiente</td>
	    </tr>
	    <tr>
	      <th scope="row">6</th>
	      <td>Venta de productos A</td>
	      <td>1.220.000</td>
	      <td>4 - Ingresos</td>
	      <td>41 - Operacionales</td>
	      <td>Andres Torres</td>
	      <td>20/11/2019 - 20/11/2019</td>
	      <td>Pendiente</td>
	    </tr>
	    <tr>
	      <th scope="row">7</th>
	      <td>Venta de productos A</td>
	      <td>1.220.000</td>
	      <td>4 - Ingresos</td>
	      <td>41 - Operacionales</td>
	      <td>Andres Torres</td>
	      <td>20/11/2019 - 20/11/2019</td>
	      <td>Pendiente</td>
	    </tr>
	    <tr>
	      <th scope="row">8</th>
	      <td>Venta de productos A</td>
	      <td>1.220.000</td>
	      <td>4 - Ingresos</td>
	      <td>41 - Operacionales</td>
	      <td>Andres Torres</td>
	      <td>20/11/2019 - 20/11/2019</td>
	      <td>Pendiente</td>
	    </tr>
	    <tr>
	      <th scope="row">9</th>
	      <td>Venta de productos A</td>
	      <td>1.220.000</td>
	      <td>4 - Ingresos</td>
	      <td>41 - Operacionales</td>
	      <td>Andres Torres</td>
	      <td>20/11/2019 - 20/11/2019</td>
	      <td>Pendiente</td>
	    </tr>
	  </tbody>
	</table>
</div>
</div>
<script>
	$(document).ready(function () {
	  $('#tbl_resultados').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	});
</script>
	

