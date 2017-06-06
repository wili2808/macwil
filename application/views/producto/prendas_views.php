<div class="container">
    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Prendas en General</h3>
        </div>
    </div>
    
    <div class="row text-center">
    <?php foreach($producto->result() as $row){ ?>
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="<?php echo base_url($row->imagen); ?>" class="img-responsive" alt="">
                <div class="caption">
                    <h4><?php echo trim($row->nombre); ?></h4>
                    <p><?php echo $row->precio; ?>$</p>
                    <p>
                    <?php 
                        if ($row->stock > 0) {
                            echo 'Cantidad disponible: '.$row->stock;
                            echo "<a href='#' class='btn btn-default'>Más Datos</a><br><br>";
                            echo "<a href='#' class='btn btn-primary'>Agregar al Carrito</a>";
                        }else{
                            echo "SIN STOCK <br>";
                            echo "<a href='#' class='btn btn-default'>Mas Datos</a>"; 
                        }
                    ?>	
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>