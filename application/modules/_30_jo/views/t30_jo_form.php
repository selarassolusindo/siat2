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
        <h2 style="margin-top:0px">T30_jo <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">NOJO <?php echo form_error('NoJO') ?></label>
            	<input type="text" class="form-control" name="NoJO" id="NoJO" placeholder="NOJO" value="<?php echo $NoJO; ?>" />
        	</div>
			<div class="form-group">
            	<label for="date">TGLJO <?php echo form_error('TglJO') ?></label>
            	<input type="text" class="form-control" name="TglJO" id="TglJO" placeholder="TGLJO" value="<?php echo $TglJO; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDCUSTOMER <?php echo form_error('idcustomer') ?></label>
            	<input type="text" class="form-control" name="idcustomer" id="idcustomer" placeholder="IDCUSTOMER" value="<?php echo $idcustomer; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDSHIPPER <?php echo form_error('idshipper') ?></label>
            	<input type="text" class="form-control" name="idshipper" id="idshipper" placeholder="IDSHIPPER" value="<?php echo $idshipper; ?>" />
        	</div>
			<div class="form-group">
            	<label for="date">TGLMB <?php echo form_error('TglMB') ?></label>
            	<input type="text" class="form-control" name="TglMB" id="TglMB" placeholder="TGLMB" value="<?php echo $TglMB; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDLOKASI <?php echo form_error('idlokasi') ?></label>
            	<input type="text" class="form-control" name="idlokasi" id="idlokasi" placeholder="IDLOKASI" value="<?php echo $idlokasi; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDARMADA <?php echo form_error('idarmada') ?></label>
            	<input type="text" class="form-control" name="idarmada" id="idarmada" placeholder="IDARMADA" value="<?php echo $idarmada; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDDRIVER <?php echo form_error('iddriver') ?></label>
            	<input type="text" class="form-control" name="iddriver" id="iddriver" placeholder="IDDRIVER" value="<?php echo $iddriver; ?>" />
        	</div>
			<div class="form-group">
            	<label for="timestamp">CREATED AT <?php echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="CREATED AT" value="<?php echo $created_at; ?>" />
        	</div>
			<div class="form-group">
            	<label for="timestamp">UPDATED AT <?php echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="UPDATED AT" value="<?php echo $updated_at; ?>" />
        	</div>
			<input type="hidden" name="idjo" value="<?php echo $idjo; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_30_jo') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
