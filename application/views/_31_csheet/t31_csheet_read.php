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
	    <tr><td>Nocsheet</td><td><?php echo $nocsheet; ?></td></tr>
	    <tr><td>Tglcsheet</td><td><?php echo $tglcsheet; ?></td></tr>
	    <tr><td>Idjo</td><td><?php echo $idjo; ?></td></tr>
	    <tr><td>Totalcsheet</td><td><?php echo $totalcsheet; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_31_csheet') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>