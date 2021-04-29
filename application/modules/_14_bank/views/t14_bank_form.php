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
        <h2 style="margin-top:0px">T14_bank <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">KODE <?php echo form_error('Kode') ?></label>
            	<input type="text" class="form-control" name="Kode" id="Kode" placeholder="KODE" value="<?php echo $Kode; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">NAMA <?php echo form_error('Nama') ?></label>
            	<input type="text" class="form-control" name="Nama" id="Nama" placeholder="NAMA" value="<?php echo $Nama; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">NAMA REKENING <?php echo form_error('NamaRekening') ?></label>
            	<input type="text" class="form-control" name="NamaRekening" id="NamaRekening" placeholder="NAMA REKENING" value="<?php echo $NamaRekening; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">CABANG <?php echo form_error('Cabang') ?></label>
            	<input type="text" class="form-control" name="Cabang" id="Cabang" placeholder="CABANG" value="<?php echo $Cabang; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">NOMOR REKENING <?php echo form_error('NomorRekening') ?></label>
            	<input type="text" class="form-control" name="NomorRekening" id="NomorRekening" placeholder="NOMOR REKENING" value="<?php echo $NomorRekening; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">JENIS REKENING <?php echo form_error('JenisRekening') ?></label>
            	<input type="text" class="form-control" name="JenisRekening" id="JenisRekening" placeholder="JENIS REKENING" value="<?php echo $JenisRekening; ?>" />
        	</div>
            <div class="form-group">
            	<label for="varchar">AKUN <?php echo form_error('Akun') ?></label>
            	<!-- <input type="text" class="form-control" name="JenisRekening" id="JenisRekening" placeholder="JENIS REKENING" value="<?php echo $JenisRekening; ?>" /> -->
                <select class="form-control" name="Akun">
                    <?php foreach($dataAkun as $d) { ?>
                        <option value="<?php echo $d->idakun ?>" <?php echo $d->idakun == $Akun ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                    <?php } ?>
                </select>
        	</div>
			<input type="hidden" name="idbank" value="<?php echo $idbank; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_14_bank') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
