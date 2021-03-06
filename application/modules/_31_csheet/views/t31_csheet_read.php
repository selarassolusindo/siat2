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
        <h2 style="margin-top:0px">T31_csheet Read</h2> -->
        <table class="table">
	    <tr><td>No. Cost Sheet</td><td><?php echo $NoCSheet; ?></td></tr>
        <tr><td>Tgl. Code Sheet</td><td><?php echo date_format(date_create($TglCSheet), 'd-m-Y'); ?></td></tr>
	    <tr><td>No. JO</td><td><?php echo $NoJO; ?></td></tr>
	    <tr><td>Total</td><td><?php echo number_format($Total); ?></td></tr>
	    <!-- <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr> -->
	    <tr><td></td><td><a href="<?php echo site_url('_31_csheet') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        <!-- </body>
</html> -->
