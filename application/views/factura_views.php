<div class="container">
<?php
$grand_total = 0;
// Calculate grand total.
if ($cart = $this->cart->contents()):
foreach ($cart as $item):
$grand_total = $grand_total + $item['subtotal'];
endforeach;
endif;
?>


<div id="factura_info">
    <?php // Create form for enter user imformation and send values 'shopping/save_order' function?>
    <form name="billing" method="post" action="<?php echo base_url() . 'carrito_controller/save_order' ?>" >
        <input type="hidden" name="command" />
            <div align="center">
            <h1 align="center">Informacion de Factura</h1>
            <table border="0" cellpadding="2px">
            <tr><td>Total de la compra:</td><td><strong>$<?php echo number_format($grand_total, 2); ?></strong></td></tr>
            <tr>
                <td>
                    <?php echo "<a class ='fg-button teal'  id='back' href=" . base_url() . "uniformes>Back</a>"; ?>
                </td>
                <td>
                    <input class ='fg-button teal' type="submit" value="Confirmar Compra" />
                </td>
            </tr>
            </table>
            </div>
    </form>
</div>

</div>