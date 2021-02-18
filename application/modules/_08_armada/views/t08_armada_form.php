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
        <h2 style="margin-top:0px">T08_armada <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode <?php echo form_error('Kode') ?></label>
            <input type="text" class="form-control" name="Kode" id="Kode" placeholder="Kode" value="<?php echo $Kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Merk <?php echo form_error('Merk') ?></label>
            <input type="text" class="form-control" name="Merk" id="Merk" placeholder="Merk" value="<?php echo $Merk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tipe <?php echo form_error('Tipe') ?></label>
            <input type="text" class="form-control" name="Tipe" id="Tipe" placeholder="Tipe" value="<?php echo $Tipe; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tahun Pembuatan <?php echo form_error('TahunPembuatan') ?></label>
            <input type="text" class="form-control" name="TahunPembuatan" id="TahunPembuatan" placeholder="TahunPembuatan" value="<?php echo $TahunPembuatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No. Polisi <?php echo form_error('Nopol') ?></label>
            <input type="text" class="form-control" name="Nopol" id="Nopol" placeholder="Nopol" value="<?php echo $Nopol; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No. Rangka <?php echo form_error('Norangka') ?></label>
            <input type="text" class="form-control" name="Norangka" id="Norangka" placeholder="Norangka" value="<?php echo $Norangka; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No. Mesin <?php echo form_error('Nomesin') ?></label>
            <input type="text" class="form-control" name="Nomesin" id="Nomesin" placeholder="Nomesin" value="<?php echo $Nomesin; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Jatuh Tempo Pajak <?php echo form_error('JatuhTempoPajak') ?></label>
            <input type="text" class="form-control" name="JatuhTempoPajak" id="JatuhTempoPajak" placeholder="JatuhTempoPajak" value="<?php echo $JatuhTempoPajak; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Jatuh Tempo KIR <?php echo form_error('JatuhTempoKir') ?></label>
            <input type="text" class="form-control" name="JatuhTempoKir" id="JatuhTempoKir" placeholder="JatuhTempoKir" value="<?php echo $JatuhTempoKir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode Ekor <?php echo form_error('KodeEkor') ?></label>
            <input type="text" class="form-control" name="KodeEkor" id="KodeEkor" placeholder="KodeEkor" value="<?php echo $KodeEkor; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div> -->
	    <input type="hidden" name="idarmada" value="<?php echo $idarmada; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('_08_armada') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- </body>
</html> -->
