<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>SmartTourCR</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />


  <!-- Bootstrap core CSS     -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Animation library for notifications   -->
  <link href="css/animate.min.css" rel="stylesheet"/>

  <!--  Light Bootstrap Table core CSS    -->
  <link href="css/light-bootstrap-dashboard.css" rel="stylesheet"/>


  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="css/demo.css" rel="stylesheet" />


  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />


  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAgFFn99x1e9TrjqmMXsoSLeuibt7L-IMc"></script>

  <script type="text/javascript">

  var map = null;
  var geocoder = null;
  var addresses = null;
  var current_address = 0;
  var geocode_results = new Array();
  var markers = new Array();
  var infowindows = new Array();
  var timeouts = 0;
  var max = 101;
  var geocodeWait = 1000; //wait a second betweeen requests


  function initialize()
  {
    var mapOptions = {
      'zoom': 8,
      'center': new google.maps.LatLng(9.905378, -84.096466),
      'mapTypeId': google.maps.MapTypeId.ROADMAP
    };
    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById("mapa"), mapOptions);
    poblarMarcadores();
  }

  function poblarMarcadores(){
    markers[0] = new google.maps.Marker({
      position: new google.maps.LatLng(9.941277, -84.079529),
      title:"Museo de los Niños",
      animation: google.maps.Animation.DROP
    });
    markers[1] = new google.maps.Marker({
      position: new google.maps.LatLng(9.934662, -84.081771),
      title:"Mercado Central",
      animation: google.maps.Animation.DROP
    });
    markers[2] = new google.maps.Marker({
      position: new google.maps.LatLng(9.933045, -84.084432),
      title:"Parque La Merced",
      animation: google.maps.Animation.DROP
    });
    markers[3] = new google.maps.Marker({
      position: new google.maps.LatLng(9.930086, -84.078467),
      title:"La avispa",
      animation: google.maps.Animation.DROP,
    });
//San Jose
    markers[4] = new google.maps.Marker({
      position: new google.maps.LatLng(10.014801, -84.213655),
      title:"Parque Juan Santamaria",
      animation: google.maps.Animation.DROP
    });
    markers[5] = new google.maps.Marker({
      position: new google.maps.LatLng(10.016027, -84.215865),
      title:"Mercado Central",
      animation: google.maps.Animation.DROP
    });
    markers[6] = new google.maps.Marker({
      position: new google.maps.LatLng(10.021519, -84.209331),
      title:"Estadio",
      animation: google.maps.Animation.DROP
    });
    markers[7] = new google.maps.Marker({
      position: new google.maps.LatLng(10.025027, -84.217421),
      title:"Carnes Y Parrillas",
      animation: google.maps.Animation.DROP,
    });
//Alajuela
  	markers[8] = new google.maps.Marker({
      position: new google.maps.LatLng(9.826962, -83.868484),
      title:"UCR",
      animation: google.maps.Animation.DROP
    });
    markers[9] = new google.maps.Marker({
      position: new google.maps.LatLng(9.836180, -83.841415),
      title:"Mirador Ujarras",
      animation: google.maps.Animation.DROP
    });
    markers[10] = new google.maps.Marker({
      position: new google.maps.LatLng(9.840485, -83.866375),
      title:"Paraíso",
      animation: google.maps.Animation.DROP
    });
    markers[11] = new google.maps.Marker({
      position: new google.maps.LatLng(9.827366, -83.829741),
      title:"Ujarras",
      animation: google.maps.Animation.DROP,
    });
//cartago
    markers[12] = new google.maps.Marker({
      position: new google.maps.LatLng(10.572534, -85.697610),
      title:"Playa la penca",
      animation: google.maps.Animation.DROP
    });
    markers[13] = new google.maps.Marker({
      position: new google.maps.LatLng(10.572650, -85.680111),
      title:"Playa hermosa",
      animation: google.maps.Animation.DROP
    });
    markers[14] = new google.maps.Marker({
      position: new google.maps.LatLng(10.577407, -85.676656),
      title:"Hotel el velero",
      animation: google.maps.Animation.DROP
    });
    markers[15] = new google.maps.Marker({
      position: new google.maps.LatLng(10.528831, -85.751071),
      title:"Playa Matapalo",
      animation: google.maps.Animation.DROP
    });
//Guanacaste
  }

  function ponerMarcadores(){
    initialize();
    var infowindow;
    lugar = document.getElementById('lugar').value;
    for (var i = lugar*4; i <= ((lugar*4)+3); i++) {
          markers[i].setMap(map);
    }
    for (var i = lugar*4; i <= ((lugar*4)+3); i++) {
        markers[i].addListener('click', function(){
          infowindow = new google.maps.InfoWindow({
            content:"Sitio Turistico Recomendado Por SmartTourCR",
            position: new google.maps.LatLng(markers[i-1].position.lat(), markers[i-1].position.lng())
          });
          infowindow.open(map, markers[i]);
        });
      }
  }
</script>



</head>
<body onload="initialize()">

  <div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="img/sidebar-5.jpg">

      <!--

      Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
      Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
      <div class="logo">
        <h3>Smart Tour CR</h3>
      </a>
    </div>

    <ul class="nav">
      <li class="active">
        <a href="dashboard.html">
          <i class="pe-7s-home"></i>
          <p>Inicio</p>
        </a>
      </li>
      <li>
        <a href="user.html">
          <i class="pe-7s-user"></i>
          <p>Quienes somos?</p>
        </a>
      </li>
      <li>
        <a href="{!!URL::to("insertarLugar")!!}">
          <i class="pe-7s-map-marker"></i>
          <p>Atractivo</p>
        </a>
      </li>
      <li>
        <a href="user.html">
          <i class="pe-7s-map"></i>
          <p>Lugar</p>
        </a>
      </li>
    </ul>
  </div>
</div>

<div class="main-panel">
  <nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#">
            Cerrar Sesión
          </a>
        </li>
      </ul>
    </div>

</nav>

<div class="content">
  <div class="container-fluid">
    <div class="row">


  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <form role="form">

            <div class="form-group">
              <label>Lugar</label>
              <select name="lugar" id="lugar" class="form-control" tabindex="9" onchange="ponerMarcadores()">
                <option value="0">San José</option>
                <option value="1">Alajuela</option>
                <option value="2">Cartago</option>
                <option value="3">Guanacaste</option>
              </select>
            </div>

            <div class="form-group">
              <label>Precio</label>
              <select name="lugar" id="lugar" class="form-control" tabindex="9">
                <option value="0">Gratis</option>
                <option value="1">1000-5000 colones</option>
                <option value="2">5000-10000 colones</option>
                <option value="3">10000-15000 colones</option>
              </select>
            </div>

            <div class="form-group">
              <label>Tipo de camino</label>
              <select name="lugar" id="lugar" class="form-control" tabindex="9">
                <option value="0">Asfaltado</option>
                <option value="1">Pedregoso</option>
                <option value="2">Lastre</option>
                <option value="3">Barro</option>
              </select>
            </div>

            <div class="form-group">
              <label>Duracion</label>
              <select name="lugar" id="lugar" class="form-control" tabindex="9">
                <option value="0">Menos de 1 hora</option>
                <option value="1">1-2 horas</option>
                <option value="2">2-3 horas</option>
                <option value="3">3-4 horas</option>
              </select>
            </div>

            <div class="form-group">
              <label>Clima</label>
              <select name="lugar" id="lugar" class="form-control" tabindex="9">
                <option value="0">Frío</option>
                <option value="1">Lluvioso</option>
                <option value="2">Soleado</option>
                <option value="3">Caliente</option>
              </select>
            </div>
          </form>

        </div>
        <div class="col-lg-6">
        <div id="mapa" style="width: 1000px; height: 450px;"></div>
      </div>
      </div>
    </div>
  </div>

</div>

    <footer class="footer">
      <div class="container-fluid">
        <nav class="pull-left">
          <ul>
            <li>
              <a href="#">
                Home
              </a>
            </li>
            <li>
              <a href="#">
                Company
              </a>
            </li>
            <li>
              <a href="#">
                Portfolio
              </a>
            </li>
            <li>
              <a href="#">
                Blog
              </a>
            </li>
          </ul>
        </nav>
        <p class="copyright pull-right">
          &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
        </p>
      </div>
    </footer>
</div>
</div>

</body>

<!--   Core JS Files   -->
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="js/demo.js"></script>

<script type="text/javascript">
$(document).ready(function(){

  demo.initChartist();

  $.notify({
    icon: 'pe-7s-gift',
    message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

  },{
    type: 'info',
    timer: 4000
  });

});
</script>

</html>
