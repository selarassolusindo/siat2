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
        <h2 style="margin-top:0px">T30_jo Read</h2> -->
        <table class="table">
	    <tr><td>No. JO</td><td><?php echo $NoJO; ?></td></tr>
	    <tr><td>Tgl. JO</td><td><?php echo $TglJO; ?></td></tr>
	    <tr><td>Customer</td><td><?php echo $idcustomer; ?></td></tr>
	    <tr><td>Shipper</td><td><?php echo $idshipper; ?></td></tr>
	    <tr><td>Tgl. Muat/Bongkar</td><td><?php echo $TglMB; ?></td></tr>
	    <tr><td>Lokasi Muat/Bongkar</td><td><?php echo $idlokasi; ?></td></tr>
	    <tr><td>Armada</td><td><?php echo $idarmada; ?></td></tr>
	    <tr><td>Ekor</td><td><?php echo $idekor; ?></td></tr>
	    <tr><td>Driver</td><td><?php echo $iddriver; ?></td></tr>
	    <!-- <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr> -->
	    <tr><td></td><td><a href="<?php echo site_url('_30_jo') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        <!-- </body>
</html> -->
