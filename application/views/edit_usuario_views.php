<div class="col-sm-10 col-md-9">
<div class="col-sm-10 col-md-10">
	<div class="well">
		<h1>Socio para modificar</h1>
	</div>	            
	<?php echo form_open("usuario_up/$id", ['class' => 'form-signin', 'role' => 'form']); ?>
	<div class="form-group">
		<?php echo form_error('nombre'); ?>
		<?php echo form_input(['name' => 'nombre','value'=>"$nombre", 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'ingrese nombre', 'autofocus'=>'autofocus']); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('apellido'); ?>
		<?php echo form_input(['name' => 'apellido','value'=>"$apellido", 'id' => 'apellido', 'class' => 'form-control','placeholder' => 'ingrese apellido']); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('telefono'); ?>
		<?php echo form_input(['name' => 'telefono', 'value'=>"$telefono",'id' => 'telefono', 'class' => 'form-control','placeholder' => 'ingrese telefono', 'type'=>'text']); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('email'); ?>
		<?php echo form_input(['name' => 'email', 'value'=>"$email",'id' => 'email', 'class' => 'form-control','placeholder' => 'ingrese email']); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('usuario'); ?>
		<?php echo form_input(['name' => 'usuario','value'=>"$usuario", 'id' => 'usuario', 'class' => 'form-control','placeholder' => 'ingrese usuario', 'autofocus'=>'autofocus']); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('pass'); ?>
		<?php echo form_input(['type' => 'text','value'=>"$pass",'name' => 'pass', 'id' => 'pass', 'class' => 'form-control','placeholder' => 'password']); ?>
	</div>
	<?php echo form_submit('modificar', 'Modificar',"class='btn btn-lg btn-warning btn-block'"); ?>
	<?php echo form_close(); ?>
	<div>
		
	</div>
</div>
</div>
</div>
</div>