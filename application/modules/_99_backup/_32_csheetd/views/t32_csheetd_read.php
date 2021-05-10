<!doctype html>
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
        <h2 style="margin-top:0px">T32_csheetd Read</h2>
        <table class="table">
	    <tr><td>Idcsheet</td><td><?php echo $idcsheet; ?></td></tr>
	    <tr><td>Idcost</td><td><?php echo $idcost; ?></td></tr>
	    <tr><td>Qty</td><td><?php echo $Qty; ?></td></tr>
	    <tr><td>Idsatuan</td><td><?php echo $idsatuan; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $Harga; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $Jumlah; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_32_csheetd') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>