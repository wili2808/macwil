<div class="container">
    <!---------------------------------------- Cabecera -------------------------------------->
    <h1 id="cabecera">Mac - Wil</h1>
    <!---------------------------------- Barra de Navegacion -------------------------------------->
    <nav id="navbar_top" class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false">
                    <span class="sr-only">Menú</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>     
                <a href="<?php echo base_url();?>" class="navbar-brand">MAC-WIL</a>
                <a href="<?php echo base_url('login');?>" class="btn btn-link navbar-toggle collapsed">Ingresá/Registrate</a>
            </div>  
            <div class="collapse navbar-collapse" id="navbar-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('consultas');?>">Consultas</a></li>
                    <li><a href="<?php echo base_url('comercializacion');?>">Comercialización</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos y Servicios<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('uniformes');?>">Uniformes Escolares</a></li>
                            <li><a href="<?php echo base_url('prendas');?>">Prendas en General</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url('serigrafia');?>">Serigrafia</a></li>
                            <li><a href="<?php echo base_url('bordados');?>">Bordados</a></li>
                            <li><a href="<?php echo base_url('sublimacion');?>">Sublimaciones</a></li>
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <?php if($this->session->userdata('login_ajax') != "TRUE"){ ?>
                        <li>
                            <a class="btn btn-default" role="button" data-toggle="modal" data-target=".forget-modal">Iniciar sesión</a>
                        </li>
                    <?php }else{?>
                        <li class="dropdown" id="sesion">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido 
                            <?= $this->session->userdata('usuario')?><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="#"><a type="button" href="<?php echo base_url('panel') ?>" role="button">Panel</a></li>
                                <li class="#"><a type="button" href="<?php echo base_url('logout_ajax') ?>" role="button">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title text-center">Bienvenidos</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="javascript:;" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username"><span class="glyphicon glyphicon-user"></span> Nombre de usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="usuario">
                        </div>
                        <div class="form-group">
                            <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Contraseña</label>
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="" checked>Recordarme</label>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-lg btn-primary btn-block" value="Iniciar" data-dismiss="modal">
                    </form>

                    <h3 class="text-center">No estas Registrado?</h3><br>
                    <a href="registro" class="btn btn-lg btn-primary btn-block">Registrate acá</a>
                </div>
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->
</div>