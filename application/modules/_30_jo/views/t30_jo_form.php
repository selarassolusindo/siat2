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
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input placeholder="Tgl. JO" type="text" name="TglJO" value="<?php echo $TglJO; ?>" class="form-control datetimepicker-input" data-target="#reservationdate"/>
            </div>
        </div>
        <div class="form-group">
            <label for="int">Customer <?php echo form_error('idcustomer') ?></label>
            <select name="idcustomer" class="form-control">
				<option value="">Customer</option>
				<?php
				foreach($customerData as $data) {
					$selected = ($data->idcustomer == $idcustomer) ? ' selected="selected"' : "";
					echo '<option value="'.$data->idcustomer.'" '.$selected.'>'.$data->Nama.'</option>';
				}
				?>
			</select>
        </div>
        <div class="form-group">
            <label for="int">Shipper <?php echo form_error('idshipper') ?></label>
            <select name="idshipper" class="form-control">
				<option value="">Shipper</option>
				<?php
				foreach($shipperData as $data) {
					$selected = ($data->idshipper == $idshipper) ? ' selected="selected"' : "";
					echo '<option value="'.$data->idshipper.'" '.$selected.'>'.$data->Nama.'</option>';
				}
				?>
			</select>
        </div>
        <div class="form-group">
            <label for="date">Tgl. Muat/Bongkar <?php echo form_error('TglMB') ?></label>
            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input placeholder="Tgl. Muat/Bongkar" type="text" name="TglMB" value="<?php echo $TglMB; ?>" class="form-control datetimepicker-input" data-target="#reservationdate2"/>
            </div>
        </div>
        <div class="form-group">
            <label for="int">Lokasi Muat/Bongkar <?php echo form_error('idlokasi') ?></label>
            <select name="idlokasi" class="form-control">
				<option value="">Lokasi Muat/Bongkar</option>
				<?php
				foreach($lokasiData as $data) {
					$selected = ($data->idlokasi == $idlokasi) ? ' selected="selected"' : "";
					echo '<option value="'.$data->idlokasi.'" '.$selected.'>'.$data->Nama.'</option>';
				}
				?>
			</select>
        </div>
        <div class="form-group">
            <label for="int">Armada <?php echo form_error('idarmada') ?></label>
            <select name="idarmada" class="form-control">
				<option value="">Armada</option>
				<?php
				foreach($armadaData as $data) {
					$selected = ($data->idarmada == $idarmada) ? ' selected="selected"' : "";
					echo '<option value="'.$data->idarmada.'" '.$selected.'>'.$data->Merk.' - '.$data->Tipe.'</option>';
				}
				?>
			</select>
        </div>
	    <div class="form-group">
            <label for="int">Ekor <?php echo form_error('idekor') ?></label>
            <select name="idekor" class="form-control">
				<option value="">Ekor</option>
				<?php
				foreach($ekorData as $data) {
					$selected = ($data->idekor == $idekor) ? ' selected="selected"' : "";
					echo '<option value="'.$data->idekor.'" '.$selected.'>'.$data->Kode.'</option>';
				}
				?>
			</select>
        </div>
	    <div class="form-group">
            <label for="int">Driver <?php echo form_error('iddriver') ?></label>
            <input type="text" class="form-control" name="iddriver" id="iddriver" placeholder="Iddriver" value="<?php echo $iddriver; ?>" />
        </div>
	    <input type="hidden" name="idjo" value="<?php echo $idjo; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('_30_jo') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- </body>
</html> -->
