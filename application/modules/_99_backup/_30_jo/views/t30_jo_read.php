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
        <h2 style="margin-top:0px">T30_jo Read</h2>
        <table class="table">
	    <tr><td>NoJO</td><td><?php echo $NoJO; ?></td></tr>
	    <tr><td>TglJO</td><td><?php echo $TglJO; ?></td></tr>
	    <tr><td>Idcustomer</td><td><?php echo $idcustomer; ?></td></tr>
	    <tr><td>Idshipper</td><td><?php echo $idshipper; ?></td></tr>
	    <tr><td>TglMB</td><td><?php echo $TglMB; ?></td></tr>
	    <tr><td>Idlokasi</td><td><?php echo $idlokasi; ?></td></tr>
	    <tr><td>Idarmada</td><td><?php echo $idarmada; ?></td></tr>
	    <tr><td>Iddriver</td><td><?php echo $iddriver; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_30_jo') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>