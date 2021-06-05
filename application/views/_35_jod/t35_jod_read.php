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
        <h2 style="margin-top:0px">T35_jod Read</h2>
        <table class="table">
	    <tr><td>Idjo</td><td><?php echo $idjo; ?></td></tr>
	    <tr><td>Idarmada</td><td><?php echo $idarmada; ?></td></tr>
	    <tr><td>No Cont</td><td><?php echo $no_cont; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_35_jod') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>