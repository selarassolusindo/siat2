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
        <h2 style="margin-top:0px">T14_bank Read</h2>
        <table class="table">
	    <tr><td>Kode</td><td><?php echo $Kode; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>NamaRekening</td><td><?php echo $NamaRekening; ?></td></tr>
	    <tr><td>Cabang</td><td><?php echo $Cabang; ?></td></tr>
	    <tr><td>NomorRekening</td><td><?php echo $NomorRekening; ?></td></tr>
	    <tr><td>JenisRekening</td><td><?php echo $JenisRekening; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_14_bank') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>