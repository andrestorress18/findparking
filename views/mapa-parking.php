<title>Mapa de parking | Find Parking</title>
  <style type="text/css" media="screen">
  #map {
        height: 500px;
      }  
  </style>
    <div id="map"></div>
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