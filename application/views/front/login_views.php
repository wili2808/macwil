<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Inicie sesión para continuar</h1>
            <?php echo validation_errors(); ?>
            <div class="account-wall">
                <?php echo form_open('verificar_login', ['class' => 'form-group', 'role' => 'form']); ?>
                    <?php echo form_label('Nombre de usuario:'); ?>
                    <?php echo form_input(['name'=>'usuario', 'id'=>'usuario', 'class'=>'form-control', 'placeholder'=>'Usuario', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
                    <?php echo form_label('Contraseña:'); ?>
                    <?php echo form_input(['type'=>'password', 'name'=>'password', 'id'=>'password', 'class'=>'form-control', 'placeholder'=>'Password', 'required'=>'required']); ?>
                    <br>
                    <?php echo form_submit('iniciar_sesion', 'Iniciar sesión',"class='btn btn-lg btn-primary btn-block'"); ?>
                <?php echo form_close(); ?><br>
            <h2 class="text-center">No estas Registrado?</h2><br>
            <a href="registro" class="btn btn-lg btn-primary btn-block">Registrate acá</a>
            </div>
        </div>
    </div>
</div>