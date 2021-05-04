<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php //echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T12_lokasi <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">KODE <?php echo form_error('Kode') ?></label>
            	<input type="text" class="form-control" name="Kode" id="Kode" placeholder="KODE" value="<?php echo $Kode; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">NAMA <?php echo form_error('Nama') ?></label>
            	<input type="text" class="form-control" name="Nama" id="Nama" placeholder="NAMA" value="<?php echo $Nama; ?>" />
        	</div>
			<input type="hidden" name="idlokasi" value="<?php echo $idlokasi; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_12_lokasi') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
