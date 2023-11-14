<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Flatkit - HTML Version | Bootstrap 4 Web App Kit with AngularJS</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../public/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="../public/images/logo.png">
  
  <!-- style -->
  <link rel="stylesheet" href="../public/css/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="../public/css/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="../public/fonts/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../public/css/material-design-icons/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../public/css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css ../public/styles/app.min.css -->
  <link rel="stylesheet" href="../public/css/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="../public/css/styles/font.css" type="text/css" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.5/sweetalert2.min.css" integrity="sha512-InYSgxgTnnt8BG3Yy0GcpSnorz5gxHvT6OEoRWj91Gg+RvNdCiAharnBe+XFIDS754Kd9TekdjXw3V7TAgh6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->
  <div class="center-block w-xxl w-auto-xs p-y-md">
    <div class="navbar">
      <div class="pull-center">
          <a class="navbar-brand">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24" height="24">
	            <path d="M 4 4 L 44 4 L 44 44 Z" fill="#a88add"></path>
	            <path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)"></path>
	            <path d="M 4 4 L 24 4 L 4  44 Z" fill="#0cc2aa"></path>
            </svg>
            <img src="../public/images/logo.png" alt="." class="hide">
            <span class="hidden-folded inline">Flatkit</span>
          </a>
        <div ui-include="'../views/blocks/navbar.brand.html'"></div>
      </div>
    </div>
    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
      <div class="m-b text-sm">
        Registrate Con Tu Cuenta
      </div>
      <form name="form" id="Acceso">
        <div class="md-form-group">
          <label>Usuario</label>
          <input type="text" class="md-input" id="usuario" placeholder="Ingrese su Usuario" required>
        </div>
        <div class="md-form-group">
          <label>Contraseña</label>
          <input type="password" class="md-input" id="contrasenia" placeholder="Ingrese su Contraseña" required>
        </div>      
        <button type="button" class="btn primary btn-block p-x-md" onclick="verificar()">Ingresar</button>
      </form>
    </div>

    <div class="p-v-lg text-center">
      <div class="m-b"><a ui-sref="access.forgot-password" href="forgot-password.html" class="text-primary _600">Olvidaste tu Contraseña?</a></div>
      <div>No tienes una cuenta? <a ui-sref="access.signup" href="articulo.php" class="text-primary _600">Registrate</a></div>
    </div>
  </div>

<!-- ############ LAYOUT END-->

  </div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
  <script src="../libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="../libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="../libs/jquery/underscore/underscore-min.js"></script>
  <script src="../libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="../libs/jquery/PACE/pace.min.js"></script>

  <script src="scripts/config.lazyload.js"></script>

  <script src="scripts/palette.js"></script>
  <script src="scripts/ui-load.js"></script>
  <script src="scripts/ui-jp.js"></script>
  <script src="scripts/ui-include.js"></script>
  <script src="scripts/ui-device.js"></script>
  <script src="scripts/ui-form.js"></script>
  <script src="scripts/ui-nav.js"></script>
  <script src="scripts/ui-screenfull.js"></script>
  <script src="scripts/ui-scroll-to.js"></script>
  <script src="scripts/ui-toggle-class.js"></script>

  <script src="scripts/app.js"></script>

  <!-- ajax -->
  <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
  <script src="scripts/ajax.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.5/sweetalert2.min.js" integrity="sha512-jt82OWotwBkVkh5JKtP573lNuKiPWjycJcDBtQJ3BkMTzu1dyu4ckGGFmDPxw/wgbKnX9kWeOn+06T41BeWitQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- endbuild -->
<script type="text/javascript" src="scripts/login.js"></script>
</body>
</html>
