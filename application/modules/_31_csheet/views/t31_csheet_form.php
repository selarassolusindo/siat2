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
        <h2 style="margin-top:0px">T31_csheet <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">NOCSHEET <?php echo form_error('NoCSheet') ?></label>
            	<input type="text" class="form-control" name="NoCSheet" id="NoCSheet" placeholder="NOCSHEET" value="<?php echo $NoCSheet; ?>" />
        	</div>
			<div class="form-group">
            	<label for="date">TGLCSHEET <?php echo form_error('TglCSheet') ?></label>
            	<input type="text" class="form-control" name="TglCSheet" id="TglCSheet" placeholder="TGLCSHEET" value="<?php echo $TglCSheet; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDJO <?php echo form_error('idjo') ?></label>
            	<input type="text" class="form-control" name="idjo" id="idjo" placeholder="IDJO" value="<?php echo $idjo; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">TOTAL <?php echo form_error('Total') ?></label>
            	<input type="text" class="form-control" name="Total" id="Total" placeholder="TOTAL" value="<?php echo $Total; ?>" />
        	</div>
			<div class="form-group">
            	<label for="timestamp">CREATED AT <?php echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="CREATED AT" value="<?php echo $created_at; ?>" />
        	</div>
			<div class="form-group">
            	<label for="timestamp">UPDATED AT <?php echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="UPDATED AT" value="<?php echo $updated_at; ?>" />
        	</div>
			<input type="hidden" name="idcsheet" value="<?php echo $idcsheet; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_31_csheet') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
