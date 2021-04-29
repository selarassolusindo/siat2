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
        <h2 style="margin-top:0px">T16_ekor <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">KODE <?php echo form_error('Kode') ?></label>
            	<input type="text" class="form-control" name="Kode" id="Kode" placeholder="KODE" value="<?php echo $Kode; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">MERK <?php echo form_error('Merk') ?></label>
            	<input type="text" class="form-control" name="Merk" id="Merk" placeholder="MERK" value="<?php echo $Merk; ?>" />
        	</div>
			<div class="form-group col-2">
            	<label for="enum">TIPE <?php echo form_error('Tipe') ?></label>
            	<!-- <input type="text" class="form-control" name="Tipe" id="Tipe" placeholder="TIPE" value="<?php echo $Tipe; ?>" /> -->
                <select class="form-control" name="Tipe">
                    <option value="Panjang" <?php echo $Tipe == 'Panjang' ? 'selected' : '' ?>>Panjang</option>
                    <option value="Pendek" <?php echo $Tipe == 'Pendek' ? 'selected' : '' ?>>Pendek</option>
                </select>
        	</div>
			<div class="form-group col-2">
            	<label for="date">TGL. BELI <?php echo form_error('TglBeli') ?></label>
            	<!-- <input type="text" class="form-control" name="TglBeli" id="TglBeli" placeholder="TGL. BELI" value="<?php echo $TglBeli; ?>" /> -->
                <div class="input-group date" id="TglBeli" data-target-input="nearest">
                    <div class="input-group-append" data-target="#TglBeli" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="Tgl. Beli" type="text" name="TglBeli" value="<?php echo $TglBeli; ?>" class="form-control datetimepicker-input" data-target="#TglBeli"/>
                </div>
        	</div>
			<div class="form-group col-2">
            	<label for="date">TGL. JATUH TEMPO KIR <?php echo form_error('TglKir') ?></label>
            	<!-- <input type="text" class="form-control" name="TglKir" id="TglKir" placeholder="TGL. JATUH TEMPO KIR" value="<?php echo $TglKir; ?>" /> -->
                <div class="input-group date" id="TglKir" data-target-input="nearest">
                    <div class="input-group-append" data-target="#TglKir" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="Tgl. Jatuh Tempo Kir" type="text" name="TglKir" value="<?php echo $TglKir; ?>" class="form-control datetimepicker-input" data-target="#TglKir"/>
                </div>
        	</div>
			<input type="hidden" name="idekor" value="<?php echo $idekor; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_16_ekor') ?>" class="btn btn-secondary">Batal</a>
		</form>

        <script>
            $(document).ready(function () {
                //Date range picker
                $('#TglBeli').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#TglKir').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
            })
        </script>
    <!-- </body>
</html> -->
