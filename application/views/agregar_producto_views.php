<div class="col-sm-10 col-md-9">
<!--    <div class="formulario col-sm-6 col-md-4 col-md-offset-4">-->
    <div class="well">
        <h2 class="text-center">Ingrese datos del producto</h2>					
    </div>	            
    <?php echo form_open("registro_producto", ['class' => 'form-signin', 'role' => 'form']); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Nombre del producto:', 'nombre'); ?>
                    <?php echo form_error('nombre'); ?>
                    <?php echo form_input(['name' => 'nombre_p', 'id' => 'nombre_p', 'class' => 'form-control','placeholder' => 'Nombre del producto', 'autofocus'=>'autofocus']); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Precio:', 'precio'); ?>
                    <?php echo form_error('precio'); ?>
                    <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control','placeholder' => 'Precio']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Stock:', 'stock'); ?>
                    <?php echo form_error('stock'); ?>
                    <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control','placeholder' => 'Stock', 'autofocus'=>'autofocus']); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Stock Minimo:', 'stock_minimo'); ?>
                    <?php echo form_error('stock_minimo'); ?>
                    <?php echo form_input(['type' => 'text', 'name' => 'stock_minimo', 'id' => 'stock_minimo', 'class' => 'form-control','placeholder' => 'Stock minimo']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Talle:', 'talle'); ?>
                    <?php echo form_error('talle'); ?>
                    <?php echo form_input(['type' => 'text', 'name' => 'talle', 'id' => 'talle', 'class' => 'form-control','placeholder' => 'Talle']); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Género:', 'genero'); ?>
                    <?php echo form_error('genero'); ?>
                    <?php echo form_input(['name' => 'genero','id' => 'genero', 'class' => 'form-control','placeholder' => 'genero']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Típo de producto:', 'tipo_producto'); ?>
                    <?php echo form_error('tipo_producto'); ?>
                    <?php echo form_input(['name' => 'tipo_producto', 'id' => 'tipo_producto', 'class' => 'form-control','placeholder' => 'Tipo de producto']); ?>
                </div>
            </div>
            <div class="col-md-6">
			    <div class="form-group">
				    <?php echo form_error('filename'); ?>
				    <?php echo form_label('Imagen:', 'imagen'); ?>
				    <?php echo form_input(['type' => 'file','name' => 'filename', 'id' => 'filename', 'class' => 'form-control']); ?>
			    </div>
	        </div>
        </div>
        <?php echo form_button(['type'=>'submit','content'=>'Insertar Producto','class'=>'btn btn-lg btn-primary btn-block']); ?>
    <?php echo form_close(); ?>
</div>
</div>
</div>