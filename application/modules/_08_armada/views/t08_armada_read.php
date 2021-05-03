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
        <h2 style="margin-top:0px">T08_armada Read</h2>
        <table class="table">
	    <tr><td>Kode</td><td><?php echo $Kode; ?></td></tr>
	    <tr><td>Merk</td><td><?php echo $Merk; ?></td></tr>
	    <tr><td>Tipe</td><td><?php echo $Tipe; ?></td></tr>
	    <tr><td>TahunPembuatan</td><td><?php echo $TahunPembuatan; ?></td></tr>
	    <tr><td>NoPol</td><td><?php echo $NoPol; ?></td></tr>
	    <tr><td>NomorRangka</td><td><?php echo $NomorRangka; ?></td></tr>
	    <tr><td>NomorMesin</td><td><?php echo $NomorMesin; ?></td></tr>
	    <tr><td>TglBeli</td><td><?php echo $TglBeli; ?></td></tr>
	    <tr><td>JatuhTempoPajak</td><td><?php echo $JatuhTempoPajak; ?></td></tr>
	    <tr><td>JatuhTempoKir</td><td><?php echo $JatuhTempoKir; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_08_armada') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>