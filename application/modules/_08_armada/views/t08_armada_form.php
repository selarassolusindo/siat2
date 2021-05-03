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
        <h2 style="margin-top:0px">T08_armada <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">KODE <?php echo form_error('Kode') ?></label>
            	<input type="text" class="form-control" name="Kode" id="Kode" placeholder="KODE" value="<?php echo $Kode; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">MERK <?php echo form_error('Merk') ?></label>
            	<input type="text" class="form-control" name="Merk" id="Merk" placeholder="MERK" value="<?php echo $Merk; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">TIPE <?php echo form_error('Tipe') ?></label>
            	<input type="text" class="form-control" name="Tipe" id="Tipe" placeholder="TIPE" value="<?php echo $Tipe; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">TAHUN PEMBUATAN <?php echo form_error('TahunPembuatan') ?></label>
            	<input type="text" class="form-control" name="TahunPembuatan" id="TahunPembuatan" placeholder="TAHUN PEMBUATAN" value="<?php echo $TahunPembuatan; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">NOPOL <?php echo form_error('NoPol') ?></label>
            	<input type="text" class="form-control" name="NoPol" id="NoPol" placeholder="NOPOL" value="<?php echo $NoPol; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">NOMOR RANGKA <?php echo form_error('NomorRangka') ?></label>
            	<input type="text" class="form-control" name="NomorRangka" id="NomorRangka" placeholder="NOMOR RANGKA" value="<?php echo $NomorRangka; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">NOMOR MESIN <?php echo form_error('NomorMesin') ?></label>
            	<input type="text" class="form-control" name="NomorMesin" id="NomorMesin" placeholder="NOMOR MESIN" value="<?php echo $NomorMesin; ?>" />
        	</div>
			<div class="form-group col-2">
            	<label for="date">TGL. BELI <?php echo form_error('TglBeli') ?></label>
            	<!-- <input type="text" class="form-control" name="TglBeli" id="TglBeli" placeholder="TGLBELI" value="<?php echo $TglBeli; ?>" /> -->
                <div class="input-group date" id="TglBeli" data-target-input="nearest">
                    <div class="input-group-append" data-target="#TglBeli" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="Tgl. Beli" type="text" name="TglBeli" value="<?php echo $TglBeli; ?>" class="form-control datetimepicker-input" data-target="#TglBeli"/>
                </div>
        	</div>
			<div class="form-group col-2">
            	<label for="date">JATUH TEMPO PAJAK <?php echo form_error('JatuhTempoPajak') ?></label>
            	<!-- <input type="text" class="form-control" name="JatuhTempoPajak" id="JatuhTempoPajak" placeholder="JATUHTEMPOPAJAK" value="<?php echo $JatuhTempoPajak; ?>" /> -->
                <div class="input-group date" id="JatuhTempoPajak" data-target-input="nearest">
                    <div class="input-group-append" data-target="#JatuhTempoPajak" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="Jatuh Tempo Pajak" type="text" name="JatuhTempoPajak" value="<?php echo $JatuhTempoPajak; ?>" class="form-control datetimepicker-input" data-target="#JatuhTempoPajak"/>
                </div>
        	</div>
			<div class="form-group col-2">
            	<label for="date">JATUH TEMPO KIR <?php echo form_error('JatuhTempoKir') ?></label>
            	<!-- <input type="text" class="form-control" name="JatuhTempoKir" id="JatuhTempoKir" placeholder="JATUHTEMPOKIR" value="<?php echo $JatuhTempoKir; ?>" /> -->
                <div class="input-group date" id="JatuhTempoKir" data-target-input="nearest">
                    <div class="input-group-append" data-target="#JatuhTempoKir" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="Jatuh Tempo Kir" type="text" name="JatuhTempoKir" value="<?php echo $JatuhTempoKir; ?>" class="form-control datetimepicker-input" data-target="#JatuhTempoKir"/>
                </div>
        	</div>
			<input type="hidden" name="idarmada" value="<?php echo $idarmada; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_08_armada') ?>" class="btn btn-secondary">Batal</a>
		</form>

        <script>
            $(document).ready(function () {
                //Date range picker
                $('#JatuhTempoPajak').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#JatuhTempoKir').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#TglBeli').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
            })
        </script>
    <!-- </body>
</html> -->
