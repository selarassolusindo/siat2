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
        <h2 style="margin-top:0px">T35_jod <?php //echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="int">IDJO <?php echo form_error('idjo') ?></label>
            	<input type="text" class="form-control" name="idjo" id="idjo" placeholder="IDJO" value="<?php echo $idjo; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDARMADA <?php echo form_error('idarmada') ?></label>
            	<input type="text" class="form-control" name="idarmada" id="idarmada" placeholder="IDARMADA" value="<?php echo $idarmada; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">NO CONT <?php echo form_error('no_cont') ?></label>
            	<input type="text" class="form-control" name="no_cont" id="no_cont" placeholder="NO CONT" value="<?php echo $no_cont; ?>" />
        	</div>
			<div class="form-group">
            	<label for="timestamp">CREATED AT <?php echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="CREATED AT" value="<?php echo $created_at; ?>" />
        	</div>
			<div class="form-group">
            	<label for="timestamp">UPDATED AT <?php echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="UPDATED AT" value="<?php echo $updated_at; ?>" />
        	</div>
			<input type="hidden" name="idjod" value="<?php echo $idjod; ?>" /> 
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
			<a href="<?php echo site_url('_35_jod') ?>" class="btn btn-secondary">Batal</a>
		</form>
    </body>
</html>