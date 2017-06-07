<div class="col-sm-10 col-md-10">
	<div class="well">
		<h1>Productos Eliminados</h1>
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
                    <td><a href="<?php echo base_url("activar_producto/$row->id");?>">Activar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
	</div>
</div>
</div>
</div>