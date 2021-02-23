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
        <h2 style="margin-top:0px">T30_jo <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No. JO <?php echo form_error('NoJO') ?></label>
            <input type="text" class="form-control" name="NoJO" id="NoJO" placeholder="NoJO" value="<?php echo $NoJO; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl. JO <?php echo form_error('TglJO') ?></label>
            <input type="text" class="form-control" name="TglJO" id="TglJO" placeholder="TglJO" value="<?php echo $TglJO; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Customer <?php echo form_error('idcustomer') ?></label>
            <input type="text" class="form-control" name="idcustomer" id="idcustomer" placeholder="Idcustomer" value="<?php echo $idcustomer; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Shipper <?php echo form_error('idshipper') ?></label>
            <input type="text" class="form-control" name="idshipper" id="idshipper" placeholder="Idshipper" value="<?php echo $idshipper; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl. Muat/Bongkar <?php echo form_error('TglMB') ?></label>
            <input type="text" class="form-control" name="TglMB" id="TglMB" placeholder="TglMB" value="<?php echo $TglMB; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Lokasi Muat/Bongkar <?php echo form_error('idlokasi') ?></label>
            <input type="text" class="form-control" name="idlokasi" id="idlokasi" placeholder="Idlokasi" value="<?php echo $idlokasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Armada <?php echo form_error('idarmada') ?></label>
            <input type="text" class="form-control" name="idarmada" id="idarmada" placeholder="Idarmada" value="<?php echo $idarmada; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ekor <?php echo form_error('idekor') ?></label>
            <input type="text" class="form-control" name="idekor" id="idekor" placeholder="Idekor" value="<?php echo $idekor; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Driver <?php echo form_error('iddriver') ?></label>
            <input type="text" class="form-control" name="iddriver" id="iddriver" placeholder="Iddriver" value="<?php echo $iddriver; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div> -->
	    <input type="hidden" name="idjo" value="<?php echo $idjo; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('_30_jo') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- </body>
</html> -->
