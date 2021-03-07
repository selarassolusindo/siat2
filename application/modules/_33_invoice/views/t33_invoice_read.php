<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T33_invoice Read</h2> -->
        <table class="table">
	    <tr><td>No. Invoice</td><td><?php echo $NoInvoice; ?></td></tr>
	    <tr><td>Tgl. Invoice</td><td><?php echo date_format(date_create($TglInvoice), 'd-m-Y'); ?></td></tr>
	    <tr><td>No. JO</td><td><?php echo $NoJO; ?></td></tr>
	    <tr><td>Total</td><td><?php echo number_format($Total); ?></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td>Detail Service</td><td>&nbsp;</td></tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <th>Service</th>
                        <th>Jumlah</th>
                    </tr>
                    <?php foreach ($detail as $key => $d) { ?>
                        <tr>
                            <td><?= $d->Nama ?></td>
                            <td align="right"><?= number_format($d->Jumlah) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </td>
        </tr>
	    <tr><td></td><td><a href="<?php echo site_url('_33_invoice') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        <!-- </body>
</html> -->
