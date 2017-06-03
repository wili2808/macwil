<div class="container">
	<div class="row">
        <div class="col-sm-2 col-md-3">
            <!--------------------------- Perfil de usuario logeado -------------------------------->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePerfil"><span class="glyphicon glyphicon-user">
                        </span> Perfil de <b><?php echo $usuario; ?></b></a>
                    </h4>
                </div>
                <div id="collapsePerfil" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <a href="#">Mis Datos</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url();?>">Carrito</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('salir');?>">Cerrar Sesión</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!--------------------------- Usuarios -------------------------------->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseUsuarios"><span class="glyphicon glyphicon-list">
                        </span> Usuarios </a>
                    </h4>
                </div>
                <div id="collapseUsuarios" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('lista_usuarios');?>">Todos</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url();?>">Usuarios</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!--------------------------- Productos -------------------------------->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseProductos"><span class="glyphicon glyphicon-folder-open">
                        </span> Productos </a>
                    </h4>
                </div>
                <div id="collapseProductos" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('insertar_producto');?>">Agregar Producto</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url();?>">Uniformes</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url(); ?>">Prendas</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">Disponibles</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
	        <!--------------------------- Ventas -------------------------------->
	        <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseVentas"><span class="glyphicon glyphicon-folder-open">
                        </span> Ventas </a>
                    </h4>
                </div>
                <div id="collapseVentas" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <a href="<?php echo base_url();?>">..</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url(); ?>">...</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">...</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
	    
	    
	    </div>