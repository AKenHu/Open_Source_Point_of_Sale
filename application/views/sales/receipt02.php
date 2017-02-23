<?php $this->load->view("partial/header"); ?>
<?php
echo "sale receipt 02";
if (isset($error_message))
{
	echo '<h1 style="text-align: center;">'.$error_message.'</h1>';
	exit;
}
?>
<div id="receipt_wrapper">
    <table id="receipt_items" style="width:100%;" border="1">
        <tr>
            <td style="width:38%;">
                <div id="receipt_header">
                        <div id="company_name"><?php echo $this->config->item('company'); ?></div>
                        <div id="company_address"><?php echo nl2br($this->config->item('address')); ?></div>
                        <div id="company_phone"><?php echo $this->config->item('phone'); ?></div>
                        <div id="sale_receipt"><?php echo $receipt_title; ?></div>
                        <div id="sale_time"><?php echo $transaction_time ?></div>
                </div>
                <div id='barcode'>
                <?php echo "<img src='index.php/barcode?barcode=$sale_id&text=$sale_id&width=250&height=50' />"; ?>
                </div>
            </td>
            <td style="width:2%;">&nbsp;</td>
            <td style="width:60%;">
                <table id="receipt_items" style="width:100%;" border="1">
                    <tr>
                        <td style="width: 22%;text-align: center;">FACTURA</td>
                        <td style="width: 9%;text-align: center;">Número</td>
                        <td style="width: 10%;text-align: center;">14/003</td>
                        <td style="width: 7%;text-align: center;">Fecha</td>
                        <td style="width: 12%;text-align: center;">02/01/2014</td>
                        
                           
                    </tr>
                </table>
                &nbsp;
                <table id="receipt_items" style="width:100%;" border="1">
                    <tr>
                        <td style="width:100%;">
                            <div id="receipt_header">
                                    <?php if(isset($customer))
                                    {
                                    ?>
                                        <div id="customer"><?php echo $this->lang->line('customers_customer').": ".$customer; ?></div>
                                    <?php
                                    }
                                    ?>
                                    <div id="company_address"><?php echo nl2br($this->config->item('address')); ?></div>
                                    <div id="company_phone"><?php echo $this->config->item('phone'); ?></div>
                                    <div id="sale_receipt"><?php echo $receipt_title; ?></div>
                                    <div id="sale_time"><?php echo $transaction_time ?></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    &nbsp;
    <table id="receipt_items" style="width:100%;" border="1">
        <tr>
            <th style="width: 10%;text-align: center;">Cliente</th>
            <th style="width: 10%;text-align: center;">Via</th>
            <th style="width: 15%;text-align: center;">Operador</th>
            <th style="width: 20%;text-align: center;">NIF</th>
            <th style="width: 15%;text-align: center;">Expedición</th>
            <th style="width: 15%;text-align: center;">Ruta</th>
            <th style="width: 15%;text-align: center;">Forma de Pago</th>
        </tr>
        <tr>
            <td style="text-align: center;">2288</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;">
            <div id="employee"><?php echo $employee; ?></div>
            </td>
            <td style="text-align: center;">Y1138216Y</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;">Contado</td>
        </tr>
    </table>
    <div style="text-align: right;">Pagina 1</div>
    <table id="receipt_items" border="1">
        <tr>
            <th style="width:10%;text-align:center;"><?php echo $this->lang->line('sales_quantity'); ?></th>
            <th style="width:40%;"><?php echo $this->lang->line('items_item'); ?></th>
            <th style="width:15%;"><?php echo $this->lang->line('sales_item_number'); ?></th>
            <th style="width:10%;"><?php echo $this->lang->line('common_price'); ?></th>
            <th style="width:10%;text-align:center;"><?php echo $this->lang->line('sales_discount'); ?></th>
            <th style="width:5%;">IVA</th>
            <th style="width:10%;text-align:right;"><?php echo $this->lang->line('sales_total'); ?></th>
        </tr>
        <?php
        foreach(array_reverse($cart, true) as $line=>$item)
        {
        ?>
        <tr>
            <td style='text-align:center;'><?php echo $item['quantity']; ?></td>
            <td><span class='long_name'><?php echo $item['name']; ?></span><span class='short_name'><?php echo character_limiter($item['name'],10); ?></span></td>
            <td><?php echo $item['item_number']; ?></td>
            <td><?php echo to_currency($item['price']); ?></td>
            <td style='text-align:center;'><?php echo $item['discount']; ?></td>
            <td style='text-align:center;'>21</td>
            <td style='text-align:right;'><?php echo to_currency($item['price']*$item['quantity']-$item['price']*$item['quantity']*$item['discount']/100); ?></td>
        </tr>
        <tr>
            <td style='text-align:center;'>&nbsp;</td>
            <td style='text-align:center;'><?php echo $item['description']; ?></td>
            <td style='text-align:center;'><?php echo $item['serialnumber']; ?></td>
            <td colspan="4">&nbsp;</td>
        </tr>

        <?php
        }
        ?>
    </table>
    &nbsp;
    <table id="receipt_items" style="width:100%;" border="1">
        <tr>
            <td style="width:74%;">
                <table id="receipt_items" style="width:100%;" border="1">
                    <tr>
                        <th style="width:12%;text-align:center;">Base IVA</th>
                        <th style="width:5%;text-align:center;">% IVA</th>
                        <th style="width:12%;text-align:center;">Cuota</th>
                        <th style="width:5%;text-align:center;">% R.E.</th>
                        <th style="width:12%;text-align:center;">Rec. Equiv.</th>
                        <th style="width:28%;text-align:center;"></th>
                    </tr>
	<?php foreach($taxes as $name=>$value) { ?>
                    <tr>
                        <td style="width:12%;text-align:center;"><?php echo to_currency($subtotal); ?></td>
                        <td style="width:5%;text-align:center;"><?php echo $name; ?></td>
                        <td style="width:12%;text-align:center;"><?php echo to_currency($value); ?></td>
                        <td style="width:5%;text-align:center;">4</td>
                        <td style="width:12%;text-align:center;">5</td>
                        <td style="width:28%;text-align:center;">6</td>
                    </tr>
    <?php }; ?>
                </table>
                &nbsp;
                <table id="receipt_items" style="width:100%;" border="1">
                    <tr>
                        <td style="width:12%;text-align:center;">1</td>
                    </tr>
                    <tr>
                        <td style="width:12%;text-align:center;"><?php echo "Observaciones: ".nl2br($this->config->item('return_policy')); ?></td>
                    </tr>
                </table>
            </td>
            <td style="width:2%;">&nbsp;</td>
            <td style="width:24%;">
                <table id="receipt_items" style="width:100%;" border="1">
                    <tr>
                        <td style="width:10%;text-align:center;">Total:</td>
                        <td style="width:14%;text-align:center;"><?php echo to_currency($total); ?></td>
                    </tr>
                </table>
                &nbsp;
                <table id="receipt_items" style="width:100%;" border="1">
                    <tr>
                        <th style="width:14%;text-align:center;">Vencimiento</th>
                        <th style="width:10%;text-align:center;">Importe</th>
                    </tr>
                    <tr>
                        <td style="width:14%;text-align:center;"></td>
                        <td style="width:10%;text-align:center;"></td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>


</div>
<?php $this->load->view("partial/footer"); ?>

<?php if ($this->Appconfig->get('print_after_sale'))
{
?>
<script type="text/javascript">
$(window).load(function()
{
	window.print();
});
</script>
<?php
}
?>