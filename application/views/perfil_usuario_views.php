<div class="container">
	<div class="row">
        <div class="col-sm-2 col-md-2">
            <!--------------------------- Perfil de usuario logeado -------------------------------->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-user">
                        </span> Perfil de <b><?php echo $usuario; ?></b></a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
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
            <!--------------------------- Socios -------------------------------->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-list">
                        </span> Usuarios </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <a href="<?php echo base_url();?>">Usuarios</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!--------------------------- Socios -------------------------------->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-folder-open">
                        </span> Productos y Servicios</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
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
	        <!--------------------------- Socios -------------------------------->
	        
	    
	    
	    </div>
    </div>
</div>