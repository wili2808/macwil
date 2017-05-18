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
            <a href="<?php echo base_url('sesion');?>" class="btn btn-link navbar-toggle collapsed">Ingresá/Registrate</a>
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
            
            <form class="navbar-form navbar-right" role="search">
                <a id="btn_sesion" href="<?php echo base_url('sesion');?>" class="btn btn-default">Ingresá/Registrate</a>
                <div class="form-group">
                    <input type="search" class="form-control" placeholder="Buscar">
                </div> 
            </form>
        </div>
        
    </div>
</nav>