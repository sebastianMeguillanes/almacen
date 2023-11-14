<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  session_start();
  if(!isset($_SESSION['nombrepersona']))
  {
    header("Location: login.php");
    exit();
  }
  ?>




<!-- by luis garcia -->


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
  <!-- build:css ../public/css/styles/app.min.css -->
  <link rel="stylesheet" href="../public/css/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="../public/css/styles/font.css" type="text/css" />
  <link rel="stylesheet" href="../public/fonts/roboto/font.css" type="text/css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.5/sweetalert2.min.css" integrity="sha512-InYSgxgTnnt8BG3Yy0GcpSnorz5gxHvT6OEoRWj91Gg+RvNdCiAharnBe+XFIDS754Kd9TekdjXw3V7TAgh6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



  <style>
    .material-symbols-outlined 
    {
      font-variation-settings:
      'FILL' 0,
      'wght' 200,
      'GRAD' 0,
      'opsz' 24
    }
</style>

  <link rel="stylesheet" href="../public/libs/jquery/select2/dist/css/select2.min.css" type="text/css" />
  <link rel="stylesheet" href="../public/libs/jquery/select2-bootstrap-theme/dist/select2-bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="../public/libs/jquery/select2-bootstrap-theme/dist/select2-bootstrap.4.css" type="text/css" />
</head>
<body>
  <div class="app" id="app">

  <?php
  $aux = $idusuario=isset($_SESSION['nombrepersona'])? $_SESSION['nombrepersona']:"Usuario";
  $espacio = strpos($aux, " ");
  if (is_numeric($espacio))
  {
    $usuario = substr($aux, 0, $espacio);
  }
  else
  {
    $usuario = $aux;
  }
  ?>

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside modal nav-dropdown">
  	<!-- fluid app aside -->
    <div class="left navside dark dk" data-layout="column">
  	  <div class="navbar no-radius">
        <!-- brand -->
        <a class="navbar-brand">
        	<div ui-include="'../public/images/logo.svg'"></div>
        	<img src="../public/images/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline">AlmacenUCB</span>
        </a>
        <!-- / brand -->
      </div>
      <div class="hide-scroll" data-flex>
          <nav class="scroll nav-light">
              <ul class="nav" ui-nav>
              <li>
                  <a>
                    <span class="nav-caret">
                        <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-icons">&#xe7fd;</i>
                    </span>
                    <span class="nav-text"><?=$usuario?></span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="../ajax/usuario.php?op=7">
                        <div style="display: flex;">
                            <div style="display: inline-block;">
                              <i class="material-symbols-outlined">&#xe9ba;</i>
                            </div>
                            <div style="display: inline-block;">
                              <span class="nav-text">Cerrar Sesion</span>
                            </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="escritorio.php" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe88a;</i>
                    </span>
                    <span class="nav-text">Escritorio</span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-symbols-outlined">&#xe1a1;</i>
                    </span>
                    <span class="nav-text">Almacenes</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="almacen.php" >
                        <span class="nav-text">Almacen</span>
                      </a>
                    </li>
                    <li>
                      <a href="existencia.php" >
                        <span class="nav-text">Existencias</span>
                      </a>
                    </li>
                    <li>
                      <a href="categoria.php" >
                        <span class="nav-text">Categoria</span>
                      </a>
                    </li>
                    <li>
                      <a href="articulo.php" >
                        <span class="nav-text">Articulo</span>
                      </a>
                    </li>
                    <li>
                      <a href="utilitario.php" >
                        <span class="nav-text">Utilitario</span>
                      </a>
                    </li>
                    <li>
                      <a href="locacion.php" >
                        <span class="nav-text">Locacion</span>
                      </a>
                    </li>
                    <li>
                      <a href="lote.php" >
                        <span class="nav-text">Lote</span>
                      </a>
                    </li>
                    <li>
                      <a href="objeto.php" >
                        <span class="nav-text">Objeto</span>
                      </a>
                    </li>

                  </ul>
                </li>




                <li>
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-icons">&#xe7f0;</i>
                    </span>
                    <span class="nav-text">Personal</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="proveedor.php" >
                        <span class="nav-text">Proveedor</span>
                      </a>
                    </li>
                  </ul>
                </li>

                
              </ul>
          </nav>
          <nav class="scroll nav-light">
              <ul class="nav" ui-nav>
                <li>
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-icons">&#xe8d3;</i>
                    </span>
                    <span class="nav-text">Autenticacion</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="usuario.php" >
                        <span class="nav-text">Usuarios</span>
                      </a>
                    </li>
                    <li>
                      <a href="rol.php" >
                        <span class="nav-text">Rol</span>
                      </a>
                    </li>
                    <li>
                      <a href="asistencia.php">
                        <span class="nav-text">Asistencia</span>
                      </a>
                    </li>
                    <li>
                      <a href="kardex.php">
                        <span class="nav-text">Kardex</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
          </nav>
      </div>
      <div class="b-t">
        <div class="nav-fold">
        	<a href="profile.html">
        	    <span class="pull-left">
        	      <img src="../public/images/a0.jpg" alt="..." class="w-40 img-circle">
        	    </span>
        	    <span class="clear hidden-folded p-x">
        	      <span class="block _500">Jean Reyes</span>
        	      <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>online</small>
        	    </span>
        	</a>
        </div>
      </div>
    </div>
  </div>
  <!-- / -->