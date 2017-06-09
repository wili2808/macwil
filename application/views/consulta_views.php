
en construccion

   
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
   

   
   
   
   <div class="container">
    <div class="row">
        <form action="" class="formulario col-sm-12 col-md-8 col-md-offset-2">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="" placeholder="Nombre">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" placeholder="Nombre">
            </div>

            <div class="form-group">
                <label for="">Correo Electronico:</label>
                <input type="email" class="form-control" id="email" placeholder="Correo Electronico">
            </div>

            <div class="form-group">
                <label for="motivo">Motivo de consulta:</label>
                <select name="motivo_consulta" id="motivo" class="form-control">
                    <option value="Uniforme Escolar">Uniforme Escolar</option>
                    <option value="Prendas General">Prendas General</option>
                    <option value="Serigrfia">Serigrfia</option>
                    <option value="Bordados">Bordados</option>
                    <option value="Sublimaciones">Sublimaciones</option>
                    <option value="Otros">Otros...</option>
                </select>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" class="form-control" id="mensaje" placeholder="Escriba su Consulta..."></textarea>
            </div>

            <div class="form-group">
                <label for="archivo">Archivo:</label>
                <input type="file" id="archivo">
                <p class="help-block">Maximo 50MB.</p>
            </div>

            <input type="submit" class="btn btn-lg btn-primary btn-block">
        </form>
    </div>
</div>