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
                            <h2>Articulo &nbsp;</h2>
                            <button class="md-btn md-raised green" onclick="registrar()">
                                <i class="fa fa-fw fa-plus text-muted"></i>
                                <span>Adicionar articulo</span>
                            </button>
                    </div>
                </div>
            </div>
            

            <div class="box" id="tablaListada">
                <div class="box-header">
                    <h2>Articulo informacion</h2>
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
                        <th  style="width:10%">N Articulo</th>
                        <th  style="width:25%">Nombre</th>
                        <th  style="width:20%">Codigo De Barras</th>
                        <th  style="width:10%">Stock</th>
                        <th  style="width:20%">Categoria</th>
                        <th  style="width:15%">Opciones</th>
                        
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
                                <h2>Registro de Nuevo Articulo</h2>
                            </div>
                            <div class="box-body">
                                <div class="row m-b">
                                    <div class="col-sm-6">
                                        <input type="hidden" class="form-control" id="idArticulo" data-parsley-id="151">
                                        <label>nombreArticulo </label>
                                        <input type="text" class="form-control" id="nombreArticulo" placeholder="nombreArticulo" required="" data-parsley-id="151">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>codigoBarra</label>
                                        <input type="text" class="form-control" id="codigoBarra" placeholder="codigoBarra" required="" data-parsley-id="151">
                                    </div>
                                </div>
                                <div class="row m-b">
                                    <div class="col-sm-6">
                                        <label>articuloStock</label>
                                        <input type="number" min="0" class="form-control" id="articuloStock" placeholder="articuloStock" required="" data-parsley-id="151">
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <label>Categoria:</label>
                                        <br>
                                        <select class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" id="categoria"></select>
                                    </div>


                                </div>
                             
                                <button class="md-btn md-raised green" type="button" onclick="guardar()">Guardar</button>
                                <button class="md-btn md-raised green" type="button" onclick="limpiarCampos()">limpia</button>
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
<script type="text/javascript" src="scripts/articulo.js"></script>