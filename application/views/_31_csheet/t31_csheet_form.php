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
			<div class="row form-group">
            	<label for="varchar" class="col-3 col-form-label text-right">Nocsheet <?php echo form_error('nocsheet') ?></label>
            	<div class="col-3">
            	<input type="text" class="form-control" name="nocsheet" id="nocsheet" placeholder="Nocsheet" value="<?php echo $nocsheet; ?>" />
            	</div>
        	</div>
			<div class="row form-group">
            	<label for="date" class="col-3 col-form-label text-right">Tglcsheet <?php echo form_error('tglcsheet') ?></label>
            	<div class="col-3">
            	<input type="text" class="form-control" name="tglcsheet" id="tglcsheet" placeholder="Tglcsheet" value="<?php echo $tglcsheet; ?>" />
            	</div>
        	</div>
			<div class="row form-group">
            	<label for="int" class="col-3 col-form-label text-right">Idjo <?php echo form_error('idjo') ?></label>
            	<div class="col-3">
            	<input type="text" class="form-control" name="idjo" id="idjo" placeholder="Idjo" value="<?php echo $idjo; ?>" />
            	</div>
        	</div>
			<div class="row form-group">
            	<label for="double" class="col-3 col-form-label text-right">Totalcsheet <?php echo form_error('totalcsheet') ?></label>
            	<div class="col-3">
            	<input type="text" class="form-control" name="totalcsheet" id="totalcsheet" placeholder="Totalcsheet" value="<?php echo $totalcsheet; ?>" />
            	</div>
        	</div>
			<div class="row form-group">
            	<label for="timestamp" class="col-3 col-form-label text-right">Created At <?php echo form_error('created_at') ?></label>
            	<div class="col-3">
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
            	</div>
        	</div>
			<div class="row form-group">
            	<label for="timestamp" class="col-3 col-form-label text-right">Updated At <?php echo form_error('updated_at') ?></label>
            	<div class="col-3">
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
            	</div>
        	</div>
			<input type="hidden" name="idcsheet" value="<?php echo $idcsheet; ?>" /> 
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
			<a href="<?php echo site_url('_31_csheet') ?>" class="btn btn-secondary">Batal</a>
		</form>
    </body>
</html>