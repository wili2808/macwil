<div class="col-sm-10 col-md-10">
    <div class="well">
        <h2 class="text-center">Modificar Usuario</h2>					
    </div>	            
    <?php echo form_open("usuario_up/$id", ['class' => 'form-signin', 'role' => 'form']); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Nombre::', 'nombre'); ?>
                    <?php echo form_error('nombre'); ?>
                    <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Nombre', 'autofocus'=>'autofocus','value'=>$nombre]); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Apellido:', 'apellido'); ?>
                    <?php echo form_error('apellido'); ?>
                    <?php echo form_input(['name' => 'apellido', 'id' => 'apellido', 'class' => 'form-control','placeholder' => 'Apellido','value'=>$apellido]); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Telefono:', 'telefono'); ?>
                    <?php echo form_error('telefono'); ?>
                    <?php echo form_input(['name' => 'telefono', 'id' => 'telefono', 'class' => 'form-control','placeholder' => 'Telefono', 'autofocus'=>'autofocus','value'=>$telefono]); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Correo electronico:', 'email'); ?>
                    <?php echo form_error('email'); ?>
                    <?php echo form_input(['type' => 'text', 'name' => 'email', 'id' => 'email', 'class' => 'form-control','placeholder' => 'Correo electronico','value'=>$email]); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Usuario:', 'usuario'); ?>
                    <?php echo form_error('talle'); ?>
                    <?php echo form_input(['type' => 'text', 'name' => 'usuario', 'id' => 'usuario', 'class' => 'form-control','placeholder' => 'Usuario','value'=>$usuario]); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Contraseña:', 'contraseña'); ?>
                    <?php echo form_error('pass'); ?>
                    <?php echo form_input(['name' => 'pass','id' => 'pass', 'class' => 'form-control','placeholder' => 'Contraseña','value'=>$pass]); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
				<div class="form-group">
				<?php echo form_error('tipo_usuario'); ?>
				<?php echo form_label('Tipo de usuario:', 'tipo_usuario'); ?>
				<?php echo form_dropdown('tipo_usuario', $tipo_usuario, '', 'class="form-control"') ?>
			    </div>
            </div>
        </div>
        <?php echo form_button(['type'=>'submit','content'=>'Insertar Producto','class'=>'btn btn-lg btn-primary btn-block']); ?>
    <?php echo form_close(); ?>
</div>
</div>
</div>