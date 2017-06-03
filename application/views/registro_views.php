<div class="container">
    <div class="formulario col-sm-6 col-md-4 col-md-offset-4">
        <div class="well">
            <h2 class="text-center">Ingrese sus datos para Registrarse</h2>					
        </div>	            
        <?php echo form_open("verificar_registro", ['class' => 'form-signin', 'role' => 'form']); ?>
            <div class="form-group">
                <?php echo form_error('nombre'); ?>
                <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Ingrese nombre', 'autofocus'=>'autofocus']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('apellido'); ?>
                <?php echo form_input(['name' => 'apellido', 'id' => 'apellido', 'class' => 'form-control','placeholder' => 'Ingrese apellido']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('nombre_usuario'); ?>
                <?php echo form_input(['name' => 'usuario', 'id' => 'nombre_usuario', 'class' => 'form-control','placeholder' => 'Ingrese nombre de usuario', 'autofocus'=>'autofocus']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('pass'); ?>
                <?php echo form_input(['type' => 'text', 'name' => 'password', 'id' => 'contraseña', 'class' => 'form-control','placeholder' => 'Ingrese contraseña']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('re_pass'); ?>
                <?php echo form_input(['type' => 'text', 'name' => 're_password', 'id' => 're_contraseña', 'class' => 'form-control','placeholder' => 'Repita contraseña']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('telefono'); ?>
                <?php echo form_input(['name' => 'telefono','id' => 'telefono', 'class' => 'form-control','placeholder' => 'Ingrese telefono']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('email'); ?>
                <?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control','placeholder' => 'Ingrese correo electronico']); ?>
            </div>
            <?php echo form_button(['type'=>'submit','content'=>'Crear cuenta','class'=>'btn btn-lg btn-primary btn-block']); ?>
        <?php echo form_close(); ?>
    </div>
</div>