@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Map')])

@section('content')
<style type="text/css">

#map {
    margin-top:85px;
    margin-left: 50px;
    width:800px;
    height: 550px;
 }
 body {
height: 100%;
margin: 0;
padding: 0;
}
</style>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<body>
    
     <div class= 'container'>
    <div id="map"></div>
    </div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback.-->
   
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlIYYXEaZzs-6M9rSRgs-pGXlS0Mk9b64&callback=initMap&v=weekly"
      async
    ></script>
    </body>
  <script type="text/javascript">
    let map;
    function initMap() {
      var mapDiv = document.getElementById("map");
      var latlng = new google.maps.LatLng(8.477217, 124.645920);

      
    var options = {
        center: latlng,
        zoom:8, 
        scrollwheel: false,
      
        mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        mapTypeIds: ["roadmap", "satellite"],
      },
      
       
        
}
    var map = new google.maps.Map(mapDiv, options);
    var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title: 'This is Me'


    });
    }
    
  </script>


@endsection