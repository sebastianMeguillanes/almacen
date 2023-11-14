<?php
include_once("header.php");
?>

  <!-- Parte superior con el boton de adicionar a un nuevo Proveedor -->
<div id="content" class="app-content box-shadow-z0" role="main">



    <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">

            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
              <i class="material-icons">&#xe5d2;</i>
            </a>


            <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

            <div class="collapse navbar-collapse" id="collapse">
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
            </div>  
        </div>
    </div>



    <div ui-view class="app-body" id="view">
        <div class="padding">


            <div class="box" id="creacion">
                <div class="box-header">
                    <div class="page-title-box d-sm-flex" >
                            <h2>Utilitario &nbsp;</h2>
                            <button class="md-btn md-raised green" onclick="registrar()">
                                <i class="fa fa-fw fa-plus text-muted"></i>
                                <span>Adicionar Utilitario</span>
                            </button>
                    </div>
                </div>
            </div>
            

            

            <div class="box" id="tablaListada">
                <div class="box-header">
                    <h2>Lista de Utilitarios</h2>
                </div>

                <div class="table-responsive">
                    <table id="tabla" class="table table-striped b-t b-b">
                        <thead>
                        <tr>
                            <th  style="width:30%">Nombre</th>
                            <th  style="width:20%">Cantidad</th>
                            <th  style="width:20%">IngresoSalida</th>
                            <th  style="width:15%">Fecha</th>
                            <th  style="width:15%">Opciones</th>
                        </tr>
                        </thead>
                        <tbody id="contenidoTabla"> 

                        </tbody >
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>

            

            <!-- Inicio del registro de un nuevo Proveedor -->
            <div class="row" id="registroProveedor">
                <div class="col-sm-12">
                    <form ui-jp="parsley" novalidate="" id="formulario">
                        <div class="box">
                            <div class="box-header">
                                <h2>Registro de Nuevo Utilitario</h2>
                            </div>
                            <div class="box-body">
                                <div class="row m-b">
                                    <input type="hidden" class="form-control" id="id" data-parsley-id="151">
                                   
                                    <div class="col-sm-6">
                                        <label>Objeto</label>
                                        <br>
                                        <select class="form-select form-control" id="idobjeto">
                
                                        </select>
                                    </div>
                
                                    <div class="col-sm-6">
                                        <label>Cantidad</label>
                                        <input type="text" class="form-control" id="cantidad" placeholder="Ingrese la Cantidad" required="" data-parsley-id="151">
                                    </div>
                                </div>
                                <div class="row m-b">
                                   
                                    <div class="col-sm-6">
                                        <label>Ingreso:</label>
                                        <br>
                                        <select class="form-select form-control" id="ingresosalida">
                                            <option value="INGRESO">INGRESO</option>
                                            <option value="SALIDA">SALIDA</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Fecha</label>
                                        <input type="date" class="form-control" id="fecha" placeholder="Ingrese la fecha" required="" data-parsley-id="151">
                                    </div>
                                </div>
                               
                                <button class="md-btn md-raised green" type="button" onclick="guardar()">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>


<?php
include_once("footer.php");
?>
<script type="text/javascript" src="scripts/utilitario.js"></script>