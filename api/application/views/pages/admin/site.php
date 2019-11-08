<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
<![endif]--><!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8">
<![endif]--><!--[if IE 8]>
<html class="no-js lt-ie9">
<![endif]--><!--[if gt IE 8]><!-->
<html lang="es" class="no-js">
<!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>{TITLE}</title>
  <!--
  Este sitio ha sido desarrollado por Difraxion Group.
  Tel. +52 01 (477) 198 09 65
  E-mail: ventas@reed.com.mx
  www.difraxion.com
  León, Guanajuato
-->
<meta name="description" content="{DESCRIPTION}">
<meta name="keywords" content="{KEYWORDS}">
<meta name="author" content="Difraxion">
<meta name="robots" content="all">
<meta name="geo.placename" content="México">
<meta name="viewport" content="width=device-width">
<meta property="og:title" content="{TITLE}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{SITE}">
<meta property="og:description" content="{META}">
<meta property="og:image" content="{DIR}assets/img/{IMAGE_SITE}">
<meta property="og:url" content="{URL}">

<link rel="stylesheet" href="{DIR}assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="{DIR}assets/css/bootstrapValidator.min.css" type="text/css">
<link rel="stylesheet" href="{DIR}assets/css/jquery.dataTables.min.css" type="text/css">
<link rel="stylesheet" href="{DIR}assets/css/dataTables.bootstrap.min.css" type="text/css">
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- Material Kit CSS -->
<link href="{DIR}assets/material-dark/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
<link rel="stylesheet" href="{DIR}assets/css/all.min.css" type="text/css">
<link rel="stylesheet" href="{DIR}assets/css/admin.css" type="text/css">
<link rel="stylesheet" href="{DIR}assets/css/main.css" type="text/css">

<link rel="shortcut icon" href="{DIR}assets/img/{FAVICON}" type="image/ico">
<script src="{DIR}assets/js/modernizr.min.js"></script>
</head>
<body class="dark-edition">
  <div class="wrapper ">
    {MENU}
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item">

            </li>
            <!-- your navbar here -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <!-- your content here -->
        {CONTENT}
      </div>
    </div>
  </div>
</div>

<!--   Core JS Files   -->
<input type="hidden" value="{DIR}" id="hdn_baseurl">
<script src="{DIR}assets/material-dark/js/core/jquery.min.js"></script>
<script src="{DIR}assets/material-dark/js/core/popper.min.js"></script>
<script src="{DIR}assets/material-dark/js/core/bootstrap-material-design.min.js"></script>
<script src="https://unpkg.com/default-passive-events"></script>
<script src="{DIR}assets/material-dark/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="{DIR}assets/material-dark/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="{DIR}assets/material-dark/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{DIR}assets/material-dark/js/material-dashboard.js?v=2.1.0"></script>
<script src="{DIR}assets/assets/js/admin.js"></script>
<script src="{DIR}assets/assets/js/main.js"></script>

{ALERT}
</body>
</html>
