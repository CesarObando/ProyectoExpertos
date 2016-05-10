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
        <a href="user.html">
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
      <form name="filtros" action="" method="post" class="form-group">
        <div class="form-inline">
          <select name="lugar" id="lugar" class="form-control" tabindex="9" data-settings='{"wrapperClass":"flat"}' onchange="ponerMarcadores()">
            <option value="0">San José</option>
            <option value="1">Alajuela</option>
            <option value="2">Cartago</option>
            <option value="3">Guanacaste</option>
          </select>
          <br>
          <label class="h4" for="opciones">Buscar por:</label>
          <select name="opciones" value="Todos" class="form-control">
            <option value="Precio">Precio</option>
            <option value="Distancia">Distancia</option>
            <option value="Clima">Clima</option>
            <option value="Duración">Duración</option>
          </select>
          <input type="text" name="filtro" class="form-control">
        </div>
        <div id="mapa" style="width: 1000px; height: 450px;"></div>
      </form>


      <!-- Insertar aquí lo visible al usuario-->

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
