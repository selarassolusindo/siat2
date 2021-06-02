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
            <!-- tgl jo -->
            <div class="form-group col-2 p-0">
            	<label for="date">TGL. JO <?php echo form_error('TglJO') ?></label>
            	<!-- <input type="text" class="form-control" name="TglJO" id="TglJO" placeholder="TGLJO" value="<?php echo $TglJO; ?>" /> -->
                <div class="input-group date" id="TglJO" data-target-input="nearest">
                    <div class="input-group-append" data-target="#TglJO" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="TGL. JO" type="text" name="TglJO" value="<?php echo $TglJO; ?>" class="form-control datetimepicker-input inputTglJO" data-target="#TglJO"/>
                </div>
        	</div>

            <!-- nomor jo -->
			<div class="form-group">
            	<label for="varchar">NO. JO <?php echo form_error('NoJO') ?></label>
            	<input type="text" class="form-control" name="NoJO" id="NoJO" placeholder="NOJO" value="<?php echo $NoJO; ?>" />
        	</div>

            <!-- customer -->
			<div class="form-group">
            	<label for="int">CUSTOMER <?php echo form_error('idcustomer') ?></label>
            	<!-- <input type="text" class="form-control" name="idcustomer" id="idcustomer" placeholder="IDCUSTOMER" value="<?php echo $idcustomer; ?>" /> -->
                <select class="form-control" name="idcustomer">
                    <?php foreach($dataCustomer as $d) { ?>
                        <option value="<?php echo $d->idcustomer ?>" <?php echo $d->idcustomer == $idcustomer ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                    <?php } ?>
                </select>
        	</div>
			<div class="form-group">
            	<label for="int">SHIPPER <?php echo form_error('idshipper') ?></label>
            	<!-- <input type="text" class="form-control" name="idshipper" id="idshipper" placeholder="IDSHIPPER" value="<?php echo $idshipper; ?>" /> -->
                <select class="form-control" name="idshipper">
                    <?php foreach($dataShipper as $d) { ?>
                        <option value="<?php echo $d->idshipper ?>" <?php echo $d->idshipper == $idshipper ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                    <?php } ?>
                </select>
        	</div>
			<div class="form-group col-2 p-0">
            	<label for="date">TGL. MUAT/BONGKAR <?php echo form_error('TglMB') ?></label>
            	<!-- <input type="text" class="form-control" name="TglMB" id="TglMB" placeholder="TGLMB" value="<?php echo $TglMB; ?>" /> -->
                <div class="input-group date" id="TglMB" data-target-input="nearest">
                    <div class="input-group-append" data-target="#TglMB" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="TGL. MUAT/BONGKAR" type="text" name="TglMB" value="<?php echo $TglMB; ?>" class="form-control datetimepicker-input" data-target="#TglMB"/>
                </div>
        	</div>
			<div class="form-group">
            	<label for="int">LOKASI <?php echo form_error('idlokasi') ?></label>
            	<!-- <input type="text" class="form-control" name="idlokasi" id="idlokasi" placeholder="IDLOKASI" value="<?php echo $idlokasi; ?>" /> -->
                <select class="form-control" name="idlokasi">
                    <?php foreach($dataLokasi as $d) { ?>
                        <option value="<?php echo $d->idlokasi ?>" <?php echo $d->idlokasi == $idlokasi ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                    <?php } ?>
                </select>
        	</div>
			<div class="form-group">
            	<label for="int">ARMADA <?php echo form_error('idarmada') ?></label>
            	<!-- <input type="text" class="form-control" name="idarmada" id="idarmada" placeholder="IDARMADA" value="<?php echo $idarmada; ?>" /> -->
                <select class="form-control" name="idarmada">
                    <?php foreach($dataArmada as $d) { ?>
                        <option value="<?php echo $d->idarmada ?>" <?php echo $d->idarmada == $idarmada ? "selected" : "" ?>><?php echo $d->Merk . ' - ' . $d->NoPol ?></option>
                    <?php } ?>
                </select>
        	</div>
			<div class="form-group">
            	<label for="int">DRIVER <?php echo form_error('iddriver') ?></label>
            	<!-- <input type="text" class="form-control" name="iddriver" id="iddriver" placeholder="IDDRIVER" value="<?php echo $iddriver; ?>" /> -->
                <select class="form-control" name="iddriver">
                    <?php foreach($dataDriver as $d) { ?>
                        <option value="<?php echo $d->iddriver ?>" <?php echo $d->iddriver == $iddriver ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                    <?php } ?>
                </select>
        	</div>
			<!-- <div class="form-group">
            	<label for="timestamp">CREATED AT <?php //echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="CREATED AT" value="<?php //echo $created_at; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="timestamp">UPDATED AT <?php //echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="UPDATED AT" value="<?php //echo $updated_at; ?>" />
        	</div> -->
			<input type="hidden" name="idjo" value="<?php echo $idjo; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_30_jo') ?>" class="btn btn-secondary">Batal</a>
		</form>

        <script>
            $(document).ready(function () {
                //Date range picker
                $('#TglJO').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#TglMB').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#TglJO').datetimepicker().on('dp.change', function (event) {
                    alert('!!!');
                });
            });


        </script>
    <!-- </body>
</html> -->

<script type="text/javascript">
    function newJO() {
        // alert('1');
        var tgl = document.getElementById("inputTglJO").value;
        // alert(tgl);
        window.location = "<?php echo site_url() ?>_30_jo/create/"+tgl;
    }
</script>
