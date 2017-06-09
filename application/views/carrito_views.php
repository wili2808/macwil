<div class="container">
    <script type="text/javascript">
        // To conform clear all data in cart.
        function clear_cart()
        {
            var result = confirm('¿Seguro que quieres borrar todas las reservas?');
            
            if (result)
            {
                window.location = "<?php echo base_url(); ?>vaciar_carrito";
            }
            else
            {
                return false; // cancel button
            }
        }
    </script>
        
    <div id="cart" >
        <div class="row head_titulo">
            <div class="col-lg-12">
                <h3 align="center">PRODUCTOS EN SU CARRITO DE COMPRA</h3>
            </div>
        </div>
            
        <div id="text" align="center">
            <?php $cart_check = $this->cart->contents();
            // Si el carrito está vacío, se mostrará el siguiente mensaje.
            if(empty($cart_check)){
            echo 'Para agregar productos a su carrito de la compra, haga clic en el botón "Agregar al carrito"';
            } ?>
        </div>
        
        <div class="table-responsive">
            <table id="table" border="1" cellpadding="5px" cellspacing="1px" class="table table-bordered table-condensed">
                <?php
                // All values of cart store in "$cart".
                if ($cart = $this->cart->contents()): ?>
                    <tr id= "main_heading" class="success">
                        <td>Serial</td>
                        <td>Nombre</td>
                        <td>Precio</td>
                        <td>Cantidad</td>
                        <td>Monto</td>
                        <td>Cancelar Producto</td>
                    </tr>
                <?php
                // Create form and send all values in "shopping/update_cart" function.
                echo form_open('carrito_controller/update_cart');
                $grand_total = 0;
                $i = 1;

                foreach ($cart as $item):
                // echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                // Will produce the following output.
                // <input type="hidden" name="cart[1][id]" value="1" />

                echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                ?>
                <tr>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $item['name']; ?>
                    </td>
                    <td>
                        $ <?php echo number_format($item['price'], 2); ?>
                    </td>
                    <td>
                        <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
                    </td>
                        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                    <td>
                        $ <?php echo number_format($item['subtotal'], 2) ?>
                    </td>
                    <td>
                        <?php
                        // cancle image.
                        $path = ("<img src= '<?php echo base_url(assets/img/cart_cross.jpg);?>' width='25px' height='20px'>");
                        echo anchor('carrito_controller/remove/' . $item['rowid'], $path); ?>
                    </td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><b>Monto Total: $<?php
                    
                    //Grand Total.
                    echo number_format($grand_total, 2); ?></b></td>
                    
                    <?php // "clear cart" button call javascript confirmation message ?>
                    <td colspan="5" align="right"><input  class ='fg-button teal' type="button" value="Vaciar Carrito" onclick="clear_cart()">
                    
                    <?php //submit button. ?>
                    <input class ='fg-button teal'  type="submit" value="Actualizar Carrito">
                    <?php echo form_close(); ?>
                    
                    <!-- "Place order button" on click send "billing" controller -->
                    <input class ='fg-button teal' type="button" value="Realizar pedido" onclick="window.location = 'factura'"></td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>