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
        <h2 style="margin-top:0px">T32_csheetd <?php //echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="int">IDCSHEET <?php echo form_error('idcsheet') ?></label>
            	<input type="text" class="form-control" name="idcsheet" id="idcsheet" placeholder="IDCSHEET" value="<?php echo $idcsheet; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDCOST <?php echo form_error('idcost') ?></label>
            	<input type="text" class="form-control" name="idcost" id="idcost" placeholder="IDCOST" value="<?php echo $idcost; ?>" />
        	</div>
			<div class="form-group">
            	<label for="decimal">QTY <?php echo form_error('Qty') ?></label>
            	<input type="text" class="form-control" name="Qty" id="Qty" placeholder="QTY" value="<?php echo $Qty; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDSATUAN <?php echo form_error('idsatuan') ?></label>
            	<input type="text" class="form-control" name="idsatuan" id="idsatuan" placeholder="IDSATUAN" value="<?php echo $idsatuan; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">HARGA <?php echo form_error('Harga') ?></label>
            	<input type="text" class="form-control" name="Harga" id="Harga" placeholder="HARGA" value="<?php echo $Harga; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">JUMLAH <?php echo form_error('Jumlah') ?></label>
            	<input type="text" class="form-control" name="Jumlah" id="Jumlah" placeholder="JUMLAH" value="<?php echo $Jumlah; ?>" />
        	</div>
			<div class="form-group">
            	<label for="timestamp">CREATED AT <?php echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="CREATED AT" value="<?php echo $created_at; ?>" />
        	</div>
			<div class="form-group">
            	<label for="timestamp">UPDATED AT <?php echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="UPDATED AT" value="<?php echo $updated_at; ?>" />
        	</div>
			<input type="hidden" name="idcsheetd" value="<?php echo $idcsheetd; ?>" /> 
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
			<a href="<?php echo site_url('_32_csheetd') ?>" class="btn btn-secondary">Batal</a>
		</form>
    </body>
</html>