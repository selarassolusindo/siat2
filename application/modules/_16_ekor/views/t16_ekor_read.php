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
        <h2 style="margin-top:0px">T16_ekor Read</h2>
        <table class="table">
	    <tr><td>Kode</td><td><?php echo $Kode; ?></td></tr>
	    <tr><td>Merk</td><td><?php echo $Merk; ?></td></tr>
	    <tr><td>Tipe</td><td><?php echo $Tipe; ?></td></tr>
	    <tr><td>TglBeli</td><td><?php echo $TglBeli; ?></td></tr>
	    <tr><td>TglKir</td><td><?php echo $TglKir; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_16_ekor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>