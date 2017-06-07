<div class="container">
	<div class="row">
        <div class="col-sm-2 col-md-2">
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
                                    <a href="<?php echo base_url('registro_panel');?>">Registrar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('lista_usuarios');?>">Activos</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('lista_eliminados');?>">Eliminados</a>
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
                                    <a href="<?php echo base_url('insertar_producto');?>">Agregar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('productos');?>">Activos</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('productos_eliminados'); ?>">Eliminados</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('productos_uniformes'); ?>">Uniformes</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('productos_prendas'); ?>">Prendas</a>
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