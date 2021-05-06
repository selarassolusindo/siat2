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
        <h2 style="margin-top:0px">T31_csheet Read</h2>
        <table class="table">
	    <tr><td>NoCSheet</td><td><?php echo $NoCSheet; ?></td></tr>
	    <tr><td>TglCSheet</td><td><?php echo $TglCSheet; ?></td></tr>
	    <tr><td>Idjo</td><td><?php echo $idjo; ?></td></tr>
	    <tr><td>Total</td><td><?php echo $Total; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_31_csheet') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>