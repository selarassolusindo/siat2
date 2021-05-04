<!doctype html>
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
        <h2 style="margin-top:0px">T09_sparepart <?php //echo $button ?></h2>
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
            	<label for="varchar">MERK <?php echo form_error('Merk') ?></label>
            	<input type="text" class="form-control" name="Merk" id="Merk" placeholder="MERK" value="<?php echo $Merk; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">TIPE <?php echo form_error('Tipe') ?></label>
            	<input type="text" class="form-control" name="Tipe" id="Tipe" placeholder="TIPE" value="<?php echo $Tipe; ?>" />
        	</div>
			<input type="hidden" name="idsparepart" value="<?php echo $idsparepart; ?>" /> 
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
			<a href="<?php echo site_url('_09_sparepart') ?>" class="btn btn-secondary">Batal</a>
		</form>
    </body>
</html>