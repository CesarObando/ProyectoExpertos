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

</head>
<body>

  <div class="wrapper">
    <div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">

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
          <i class="pe-7s-map"></i>
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
  </div>
</nav>

<div class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- Insertar aquí lo visible al usuario-->

    </div>
    <div class="footer">
      <hr>
      <div class="stats">
        <i class="fa fa-history"></i> Updated 3 minutes ago
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
