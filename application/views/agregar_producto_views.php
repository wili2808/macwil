<div class="container">
    <div class="formulario col-sm-6 col-md-4 col-md-offset-4">
        <div class="well">
            <h2 class="text-center">Ingrese datos del producto</h1>					
        </div>	            
        <?php echo form_open("insertar_producto", ['class' => 'form-signin', 'role' => 'form']); ?>
            <div class="form-group">
                <?php echo form_error('nombre'); ?>
                <?php echo form_input(['name' => 'nombre_p', 'id' => 'nombre_p', 'class' => 'form-control','placeholder' => 'Nombre del producto', 'autofocus'=>'autofocus']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('precio'); ?>
                <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control','placeholder' => 'Precio']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('stock'); ?>
                <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control','placeholder' => 'Stock', 'autofocus'=>'autofocus']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('stock_minimo'); ?>
                <?php echo form_input(['type' => 'text', 'name' => 'stock_minimo', 'id' => 'stock_minimo', 'class' => 'form-control','placeholder' => 'Stock minimo']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('talle'); ?>
                <?php echo form_input(['type' => 'text', 'name' => 'talle', 'id' => 'talle', 'class' => 'form-control','placeholder' => 'Talle']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('genero'); ?>
                <?php echo form_input(['name' => 'genero','id' => 'genero', 'class' => 'form-control','placeholder' => 'genero']); ?>
            </div>
            <div class="form-group">
                <?php echo form_error('tipo_producto'); ?>
                <?php echo form_input(['name' => 'tipo_producto', 'id' => 'tipo_producto', 'class' => 'form-control','placeholder' => 'Tipo de producto']); ?>
            </div>
            <?php echo form_button(['type'=>'submit','content'=>'Crear cuenta','class'=>'btn btn-lg btn-primary btn-block']); ?>
        <?php echo form_close(); ?>
    </div>
</div>