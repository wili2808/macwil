<div class="container">
    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Uniformes Escolares</h3>
        </div>
    </div>
    
    <div class="row text-center">
    <?php foreach($producto->result() as $row){ ?>
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="<?php echo base_url($row->imagen); ?>" class="img-responsive" alt="">
                <div class="caption">
                    <h4><?php echo trim($row->nombre); ?></h4>
                    <p>Cantidad disponible: <?php echo $row->stock; ?></p>
                    <p>
                        <?php 
                            if ($row->stock < $row->stock_minimo && $row->stock > 0) {
                                echo 'por debajo del valor minimo: '.$row->stock_minimo;
                            } elseif ($row->stock == 0) {
                                echo 'No hay productos disponibles';
                            }else {
                                echo 'Disponible:'.$row->stock.' unidades';
                            }
                        ?>
                    </p>
                    <p>Precio: <?php echo $row->precio; ?></p>
                    <p>
                    <?php 
                        if ($row->stock > 0) {
                            echo "<a href='#' class='btn btn-primary'>Comprar</a>";
                            echo "<a href='#' class='btn btn-default'>Más Datos</a>";
                        }else{
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