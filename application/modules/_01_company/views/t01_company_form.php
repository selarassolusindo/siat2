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
        <h2 style="margin-top:0px">T01_company <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">NAMA <?php echo form_error('Nama') ?></label>
            	<input type="text" class="form-control" name="Nama" id="Nama" placeholder="NAMA" value="<?php echo $Nama; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">ALAMAT <?php echo form_error('Alamat') ?></label>
            	<input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="ALAMAT" value="<?php echo $Alamat; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">KOTA <?php echo form_error('Kota') ?></label>
            	<input type="text" class="form-control" name="Kota" id="Kota" placeholder="KOTA" value="<?php echo $Kota; ?>" />
        	</div>
			<input type="hidden" name="idcompany" value="<?php echo $idcompany; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_01_company') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
