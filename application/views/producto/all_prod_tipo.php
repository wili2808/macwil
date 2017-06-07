<div class="col-sm-10 col-md-10">
    <ul class="nav nav-tabs responsive nav-justified tabs_productos">
        <li class="active">
            <a href="#todos" data-toggle="tab">Todos</a>
        </li>
        <li>
            <a href="#uniformes" data-toggle="tab">Uniformes Escolares</a>
        </li>
        <li>
            <a href="productos_prendas" data-toggle="tab">Prendas en General</a>
        </li>
    </ul>


    <div class="tab-content responsive tabs_productos">
        <div class="tab-pane in active thumbnail" id="todos">
            <div class="well">
                <h1>Todos los productos</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Stock_minimo</th>
                            <th>Talle</th>
                            <th>Genero</th>
                            <th>Tipo</th>
                            <th>Imagen</th>
                            <th>Eliminado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productos->result() as $row){ ?>
                        <tr>
                            <td><?php echo $row->id;  ?></td>
                            <td><?php echo $row->nombre;  ?></td>
                            <td><?php echo $row->precio;  ?></td>
                            <td><?php echo $row->stock;  ?></td>
                            <td><?php echo $row->stock_minimo;  ?></td>
                            <td><?php echo $row->talle;  ?></td>
                            <td><?php echo $row->genero;  ?></td>
                            <td><?php echo $row->tipo_producto;  ?></td>
                            <td><?php echo $row->imagen;  ?></td>
                            <td><?php echo $row->eliminado;  ?></td>
                            <td><a href="<?php echo base_url("edit_producto/$row->id");?>">Editar</a>/<a href="<?php echo base_url("borrar_producto/$row->id");?>">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="tab-pane thumbnail" id="uniformes">
            <div class="well">
                <h1>Uniformes escolares</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Stock_minimo</th>
                            <th>Talle</th>
                            <th>Genero</th>
                            <th>Tipo</th>
                            <th>Imagen</th>
                            <th>Eliminado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productos->result() as $row){ ?>
                        <?php if (($row->tipo_producto)=='1') ?>
                        <tr>
                            <td><?php echo $row->id;  ?></td>
                            <td><?php echo $row->nombre;  ?></td>
                            <td><?php echo $row->precio;  ?></td>
                            <td><?php echo $row->stock;  ?></td>
                            <td><?php echo $row->stock_minimo;  ?></td>
                            <td><?php echo $row->talle;  ?></td>
                            <td><?php echo $row->genero;  ?></td>
                            <td><?php echo $row->tipo_producto;  ?></td>
                            <td><?php echo $row->imagen;  ?></td>
                            <td><?php echo $row->eliminado;  ?></td>
                            <td><a href="<?php echo base_url("edit_producto/$row->id");?>">Editar</a>/<a href="<?php echo base_url("borrar_producto/$row->id");?>">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="tab-pane thumbnail" id="prendas">
            <div class="well">
                <h1>Prendas en general</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Stock_minimo</th>
                            <th>Talle</th>
                            <th>Genero</th>
                            <th>Tipo</th>
                            <th>Imagen</th>
                            <th>Eliminado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productos->result() as $row){ ?>
                        <tr>
                            <td><?php echo $row->id;  ?></td>
                            <td><?php echo $row->nombre;  ?></td>
                            <td><?php echo $row->precio;  ?></td>
                            <td><?php echo $row->stock;  ?></td>
                            <td><?php echo $row->stock_minimo;  ?></td>
                            <td><?php echo $row->talle;  ?></td>
                            <td><?php echo $row->genero;  ?></td>
                            <td><?php echo $row->tipo_producto;  ?></td>
                            <td><?php echo $row->imagen;  ?></td>
                            <td><?php echo $row->eliminado;  ?></td>
                            <td><a href="<?php echo base_url("edit_producto/$row->id");?>">Editar</a>/<a href="<?php echo base_url("borrar_producto/$row->id");?>">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>