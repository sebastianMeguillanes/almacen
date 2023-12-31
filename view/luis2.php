
  <?php
  include_once("header.php");
  ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
              <i class="material-icons">&#xe5d2;</i>
            </a>
            <!-- / -->
        
            <!-- Page title - Bind to $state's title -->
            <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
        
            <!-- navbar collapse -->
            <div class="collapse navbar-collapse" id="collapse">
              <!-- link and dropdown -->
              <ul class="nav navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link" href data-toggle="dropdown">
                    <i class="fa fa-fw fa-plus text-muted"></i>
                    <span>Nuevo</span>
                  </a>
                  <div ui-include="'../views/blocks/dropdown.new.html'"></div>
                </li>
              </ul>
        
              <div ui-include="'../views/blocks/navbar.form.html'"></div>
              <!-- / -->
            </div>
            <!-- / navbar collapse -->
        
            <!-- navbar right -->
            <ul class="nav navbar-nav ml-auto flex-row">
              <li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link mr-2" href data-toggle="dropdown">
                  <i class="material-icons">&#xe7f5;</i>
                  <span class="label label-sm up warn">3</span>
                </a>
                <div ui-include="'../views/blocks/dropdown.notification.html'"></div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                  <span class="avatar w-32">
                    <img src="../public/images/a0.jpg" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div ui-include="'../views/blocks/dropdown.user.html'"></div>
              </li>
              <li class="nav-item hidden-md-up">
                <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
                  <i class="material-icons">&#xe5d4;</i>
                </a>
              </li>
            </ul>
            <!-- / navbar right -->
        </div>
    </div>
    <div class="app-footer">
      <div class="p-2 text-xs">
        <div class="pull-right text-muted py-1">
          &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love v1.1.3</span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
          <a class="nav-link" href="../">About</a>
          <a class="nav-link" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Get it</a>
        </div>
      </div>
    </div>
    <div ui-view class="app-body" id="view">

<!-- ############ PAGE START-->
<div class="p-a white lt box-shadow">
	<div class="row">
		<div class="col-sm-6">
			<h4 class="mb-0 _300">Welcome to Flatkit</h4>
			<small class="text-muted">Bootstrap <strong>4</strong> Web App Kit with AngularJS</small>
		</div>
		<div class="col-sm-6 text-sm-right">
			<div class="m-y-sm">
				<span class="m-r-sm">Start manage:</span>
				<div class="btn-group dropdown">
		          <button class="btn white btn-sm ">Projects</button>
		          <button class="btn white btn-sm dropdown-toggle" data-toggle="dropdown"></button>
		          <div class="dropdown-menu dropdown-menu-scale pull-right">
		            <a class="dropdown-item" href>Members</a>
		            <a class="dropdown-item" href>Tasks</a>
		            <a class="dropdown-item" href>Inbox</a>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item">Profile</a>
		          </div>
		        </div>
	        </div>
		</div>
	</div>
</div>
<div class="padding">



	<div class="row">


	    <div class="col-sm-6 col-md-4">
			<div class="box">
				<div class="box-header">
					<h3>Tasks</h3>
					<small>20 finished, 5 remaining</small>
					<p>
Un sistema de inventarios es una herramienta que permite gestionar y controlar de manera eficiente los productos y materiales de una empresa. Proporciona información actualizada sobre el inventario disponible, incluyendo cantidades, ubicación, movimientos y valores, lo que facilita la planificación de compras, la gestión de la producción y la toma de decisiones estratégicas. Además, ayuda a minimizar los costos al evitar la escasez o el exceso de inventario, optimiza los tiempos de entrega y mejora la satisfacción del cliente al garantizar la disponibilidad de productos cuando se necesiten. En resumen, un sistema de inventarios automatiza y simplifica la gestión de inventario, permitiendo una mejor planificación y control de los recursos de una empresa.</p>
				</div>
		  	</div>
		</div>
	    <div class="col-sm-12 col-md-4">
	    	<div class="box">
							
				<div class="container" style="transform: scale(1);">
				<div class="container">
				<div class="box-header">
					<h3>Anuncios</h3>
					<small>3 disponibles</small>
				</div>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
					<div class="item active">
						<img src="https://scontent.flpb2-2.fna.fbcdn.net/v/t39.30808-6/350125628_1321351215395229_1364817054986074436_n.jpg?_nc_cat=106&cb=99be929b-3346023f&ccb=1-7&_nc_sid=730e14&_nc_ohc=QteDod0xhuQAX9NKYH5&_nc_ht=scontent.flpb2-2.fna&oh=00_AfBd1yGhqowZW6jlHKkz_40ij1J59y_np-57hJc-PdS_fg&oe=6480A644" alt="Los Angeles" style="width:100%;">
					</div>

					<div class="item">
						<img src="https://scontent.flpb2-1.fna.fbcdn.net/v/t39.30808-6/348869216_111461051966264_4345581767442546246_n.jpg?_nc_cat=102&cb=99be929b-3346023f&ccb=1-7&_nc_sid=730e14&_nc_ohc=Yj6RPLNtqLkAX9BOlzB&_nc_ht=scontent.flpb2-1.fna&oh=00_AfDxazdIfCbJQSrQLDsiq2Qv7ObpXXEBdXoiNTPeBamIyA&oe=647F1264" alt="Chicago" style="width:100%;">
					</div>
					
					<div class="item">
						<img src="https://scontent.flpb2-2.fna.fbcdn.net/v/t39.30808-6/344309683_971175787287452_5280137235552887688_n.jpg?_nc_cat=103&cb=99be929b-3346023f&ccb=1-7&_nc_sid=730e14&_nc_ohc=BxdH8DrtZ7cAX8E5VUb&_nc_ht=scontent.flpb2-2.fna&oh=00_AfAJnoR7fYmgWMrmF8BNSqnbbiv2b_ZSqVRnilk7wc_PiA&oe=64807B2B" alt="New york" style="width:100%;">
					</div>
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
					</a>
				</div>
				</div>

				<!-- Resto del código del carrusel -->
			</div>


			</div>
	    </div>
	</div>
</div>

<?php
include_once("footer.php");
?>