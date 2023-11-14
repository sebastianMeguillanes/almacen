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
                            <h2>Kardex &nbsp;</h2>
                            <button class="md-btn md-raised green" onclick="registrar()">
                                <i class="fa fa-fw fa-plus text-muted"></i>
                                <span>Adicionar Kardex</span>
                            </button>
                    </div>
                </div>
            </div>
            




            <div class="box" id="tablaListada">
                <div class="box-header">
                    <h2>Kardex informacion</h2>
                </div>
                <div class="table-responsive">
                    <table ui-jp="dataTable" ui-options="{
                        sAjaxSource: 'api/datatable.json',
                        aoColumns: [
                            { mData: 'engine' },
                            { mData: 'browser' },
                            { mData: 'platform' },
                            { mData: 'version' },
                            { mData: 'grade' }
                                    ]
                        }" class="table table-striped b-t b-b">
                    <thead>
                    <tr>
                        <th  style="width:20%">Almacen</th>
                        <th  style="width:20%">Articulo</th>
                        <th  style="width:15%">Cantidad</th>
                        <th  style="width:15%">Accion</th>
                        <th  style="width:10%">Fecha</th>
                        <th  style="width:20%">Opciones</th>
                    </tr>
                    </thead>
                        <tbody id="contenidoTabla">
                                    
                        </tbody>
                    </table>
                </div>
            </div>


            
            <!-- Inicio del registro de un nuevo categoria -->
            <div class="row" id="registroProveedor">
                <div class="col-sm-12">
                    <form ui-jp="parsley" novalidate="">
                        <div class="box">
                            <div class="box-header">
                                <h2>Registro de Nuevo Kardex</h2>
                            </div>
                            <div class="box-body">
                                <div class="row m-b">


                                <input type="hidden" class="form-control" id="idkardex" data-parsley-id="151">


                                    <div class="col-sm-6">
                                        <label>Almacen:</label>
                                        <br>
                                        <select class="form-control select2" id="idalmacen" ui-jp="select2" ui-options="{theme: 'bootstrap'}" >
                                            
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Articulo:</label>
                                        <br>
                                        <select class="form-control select2" id="idarticulo" ui-jp="select2" ui-options="{theme: 'bootstrap'}" >
                                
                                        </select>
                                    </div>

                                    
                              
                               
                                </div>

                                <div class="row m-b">
                                    
                                    <div class="col-sm-6">
                                        <label>Accion</label>
                                        <input type="text" class="form-control" id="accion" placeholder="Ingrese accion" required="" data-parsley-id="151">
                                    </div>

                                    <div class="col-sm-6">
                                        <label>fecha</label>
                                        <input type="date" class="form-control" id="fecha" placeholder="Ingrese accion" required="" data-parsley-id="151">
                                    </div>


                                </div>

                                <div class="row m-b">
                                    <div class="col-sm-6">
                                        <label>Cantidad</label>
                                        <input type="text" class="form-control" id="cantidad" placeholder="Ingrese accion" required="" data-parsley-id="151">
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
<script type="text/javascript" src="scripts/kardex.js"></script>