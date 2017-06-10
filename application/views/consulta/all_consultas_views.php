<div class="col-sm-10 col-md-10">
	<div class="well">
		<h1 align="center">Consultas</h1>
	</div>
	<div class="table-responsive">
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th>Eliminado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($consultas->result() as $row){ ?>
                <tr>
                    <td><?php echo $row->id;  ?></td>
                    <td><?php echo $row->nombre;  ?></td>
                    <td><?php echo $row->apellido;  ?></td>
                    <td><?php echo $row->email;  ?></td>
                    <td><?php echo $row->telefono;  ?></td>
                    <td><?php echo $row->motivo;  ?></td>
                    <td><?php echo $row->fecha;  ?></td>
                    <td><?php echo $row->eliminado;  ?></td>
                    <td><a href="<?php echo base_url("ver_consulta/$row->id");?>">Ver</a>/<a href="<?php echo base_url("borrar_consulta/$row->id");?>">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>