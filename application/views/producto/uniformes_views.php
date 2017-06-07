<div class="container">
    <!-- Titulo -->
    <div class="row head_titulo">
        <div class="col-lg-12">
            <h3 align="center">UNIFORMES ESCOLARES</h3>
        </div>
    </div>
    
    <div class="row text-center" id="galeria_productos">
    <?php foreach($producto->result() as $row){ ?>
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <div class="img">
                    <img src="<?php echo base_url($row->imagen); ?>" class="img-responsive img-thumbnail" alt="">
                </div>
                <div class="caption">
                    <h4><?php echo trim($row->nombre); ?></h4>
                    <p>
                    <?php 
                        if ($row->stock > 0) {
                            echo 'Cantidad disponible: '.$row->stock;
                            echo "<a href='#' class='btn btn-default'>Más Datos</a><br>";
                            
                            // Create form and send values in 'shopping/add' function.
                            echo form_open('add_carrito');
                            echo form_hidden('id', $row->id);
                            echo form_hidden('name', $row->nombre);
                            echo form_hidden('price', $row->precio);
                            
                            $btn = array('class' => 'btn btn-primary teal','value' => 'Agregar al Carrito','name' => 'action');
                            
                            // Submit Button.
                            echo form_submit($btn);
                            echo form_close();
                        }
                        else{
                            echo "SIN STOCK <br>";
                            echo "<a href='#' class='btn btn-default'>Mas Datos</a>"; 
                        }
                    ?>	
                    </p>
                    
                    <div id='rs'><b>Precio</b>:<big>
                        <?php echo $row->precio; ?>$</big>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
