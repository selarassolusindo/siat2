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
        <h2 style="margin-top:0px">T05_customer Read</h2>
        <table class="table">
	    <tr><td>Kode</td><td><?php echo $Kode; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>ContactPerson</td><td><?php echo $ContactPerson; ?></td></tr>
	    <tr><td>Telepon</td><td><?php echo $Telepon; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $Alamat; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $Kota; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_05_customer') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>