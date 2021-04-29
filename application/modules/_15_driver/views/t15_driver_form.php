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
        <h2 style="margin-top:0px">T15_driver <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">KODE <?php echo form_error('Kode') ?></label>
            	<input type="text" class="form-control" name="Kode" id="Kode" placeholder="KODE" value="<?php echo $Kode; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">NAMA <?php echo form_error('Nama') ?></label>
            	<input type="text" class="form-control" name="Nama" id="Nama" placeholder="NAMA" value="<?php echo $Nama; ?>" />
        	</div>
			<div class="form-group">
            	<label for="Alamat">ALAMAT <?php echo form_error('Alamat') ?></label>
            	<textarea class="form-control" rows="3" name="Alamat" id="Alamat" placeholder="ALAMAT"><?php echo $Alamat; ?></textarea>
        	</div>
			<div class="form-group">
            	<label for="varchar">HP <?php echo form_error('HP') ?></label>
            	<input type="text" class="form-control" name="HP" id="HP" placeholder="HP" value="<?php echo $HP; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">KTP <?php echo form_error('KTP') ?></label>
            	<input type="text" class="form-control" name="KTP" id="KTP" placeholder="KTP" value="<?php echo $KTP; ?>" />
        	</div>
			<input type="hidden" name="iddriver" value="<?php echo $iddriver; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_15_driver') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
