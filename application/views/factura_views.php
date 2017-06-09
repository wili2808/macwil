<div class="container">
    <div id="factura_info">
        <?php // Create form for enter user imformation and send values 'shopping/save_order' function?>
        <form name="billing" method="post" action="<?php echo base_url() . 'carrito_controller/save_order' ?>" >
            <input type="hidden" name="command" />


            <div class="table-responsive">
            <h1 align="center">Informacion de Factura</h1>
                <table class="table table-bordered table-condensed">
                
                    
                    <thead>
                        <tr>
                            <th>N° Producto</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                        $grand_total = 0;
                        $sin_stock = false;
                        if ($cart = $this->cart->contents()):
                        foreach($cart as $item){ ?>
                        <tr>
                        <?php if ($item['qty']>$item['stock']){?>
                            <td><?php echo $item['id']?></td>
                            <td><?php echo $item['name']?></td>
                            <td><?php echo $item['price']?></td>
                            <td><p>No disponible</p></td>
                            <?php $sin_stock = true;?>
                        <?php }else {?>
                            <td><?php echo $item['id']?></td>
                            <td><?php echo $item['name']?></td>
                            <td><?php echo $item['price']?></td>
                            <td><?php echo $item['qty']?></td>
                            <?php $grand_total = $grand_total + $item['subtotal'];?>
                        <?php }?>
                        </tr>
                        <?php } ?>
                        <?php endif;?>
                        <tr>
                        <td>Total de la compra:</td>
                        <td><strong>$<?php echo number_format($grand_total, 2); ?></strong></td>
                    </tr>
                    </tbody>

                    <tr>
                    <?php if ($sin_stock == true){?>
                        <td>
                            <?php echo "<a class ='fg-button teal'  id='back' href=" . base_url() . "uniformes>Back</a>"; ?>
                        </td>
                    <?php }else {?>
                        <td>
                            <?php echo "<a class ='fg-button teal'  id='back' href=" . base_url() . "uniformes>Back</a>"; ?>
                        </td>
                        <td>
                            <input class ='fg-button teal' type="submit" value="Confirmar Compra" />
                        </td>
                    <?php } ?>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>