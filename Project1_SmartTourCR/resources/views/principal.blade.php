<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>SmartTourCR</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  {!!Html::style("css/bootstrap.min.css")!!}
  {!!Html::style("/css/animate.min.css")!!}
  {!!Html::style("/css/light-bootstrap-dashboard.css")!!}
  {!!Html::style("/css/demo.css")!!}
  {!!Html::style("css/pe-icon-7-stroke.css")!!}
  {!!Html::style("http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css")!!}
  {!!Html::style("http://fonts.googleapis.com/css?family=Roboto:400,700,300")!!}


  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCa9WLI7LVnM_xRTAribEwIx_KTTdSYKHI"></script>

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

  var latitud = +document.getElementById('latitud').value;
  var longitud = +document.getElementById('longitud').value;
  var imagen = "atractivos/"+document.getElementById('imagen').value;
  var descripcion = document.getElementById('descripcion').value;
  var nombre = document.getElementById('nombre').value;
  //document.getElementById('latitud').value = longitud;
  //document.getElementById('longitud').value = latitud;

  var contentString =

        '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<img src="'+imagen+'" alt="" style="width:500px; height: 200px;"/>'+
        '<h1 id="firstHeading" class="firstHeading">'+nombre+'</h1>'+
        '<div id="bodyContent">'+
        '<p><b>'+nombre+'</b>,<br> '+descripcion+
        '</p>'+
        '</div>'+
        '</div>';


    markers[0] = new google.maps.Marker({
      position: new google.maps.LatLng(latitud, longitud),
      title:nombre,
      animation: google.maps.Animation.DROP
    });
    markers[0].setMap(map);
    var infowindow;
    markers[0].addListener('click', function(){
    infowindow = new google.maps.InfoWindow({
    content: contentString,
    position: new google.maps.LatLng(markers[0].position.lat(), markers[0].position.lng())
    });
    infowindow.open(map, markers[0]);
    });
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
        <a href="{!!URL::to("/")!!}">
          <i class="pe-7s-home"></i>
          <p>Inicio</p>
        </a>
      </li>
      <li>
        <a href="{!!URL::to("quienesSomos")!!}">
          <i class="pe-7s-user"></i>
          <p>Quienes somos?</p>
        </a>
      </li>
        @if (Auth::user())
      <li>
        <a href="{!!URL::to("verAtractivos")!!}">
          <i class="pe-7s-map-marker"></i>
          <p>Atractivo</p>
        </a>
      </li>
      <li>
        <a href="{!!URL::to("verLugares")!!}">
          <i class="pe-7s-map"></i>
          <p>Lugar</p>
        </a>
      </li>
      @endif
    </ul>
  </div>
</div>

<div class="main-panel">
  <nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
                      <li><a href="{{ url('/login') }}">Iniciar Sesion</a></li>

                  @else
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                          </ul>
                      </li>
                  @endif
      </ul>
    </div>

  </nav>


  @yield('content')



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

<!--<script type="text/javascript">
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
</script>-->

</html>
