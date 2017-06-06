<div class="col-sm-10 col-md-10">
	<div class="well">
		<h1>Usuarios Eliminados</h1>
	</div>	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>N°</th>
				<th>Usuario</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Telefono</th>
				<th>Email</th>
				<th>Tipo</th>
				<th>Eliminado</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuario->result() as $row){ ?>
			<tr>
				<td><?php echo $row->id;  ?></td>
				<td><?php echo $row->usuario;  ?></td>
				<td><?php echo $row->nombre;  ?></td>
				<td><?php echo $row->apellido;  ?></td>
				<td><?php echo $row->tel;  ?></td>
				<td><?php echo $row->email;  ?></td>
				<td><?php echo $row->tipo_usuario;  ?></td>
				<td><?php echo $row->eliminado;  ?></td>
				<td><a href="<?php echo base_url("activar_usuario/$row->id");?>">Activar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	            
	<div>
		
	</div>
</div>
</div>
</div>