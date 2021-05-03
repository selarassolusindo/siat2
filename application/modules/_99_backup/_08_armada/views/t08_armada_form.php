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
	    <div class="form-group col-2">
            <label for="date">Jatuh Tempo Pajak <?php echo form_error('JatuhTempoPajak') ?></label>
            <!-- <input type="text" class="form-control" name="JatuhTempoPajak" id="JatuhTempoPajak" placeholder="JatuhTempoPajak" value="<?php echo $JatuhTempoPajak; ?>" /> -->
            <div class="input-group date" id="JatuhTempoPajak" data-target-input="nearest">
                <div class="input-group-append" data-target="#JatuhTempoPajak" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input placeholder="Jatuh Tempo Pajak" type="text" name="JatuhTempoPajak" value="<?php echo $JatuhTempoPajak; ?>" class="form-control datetimepicker-input" data-target="#JatuhTempoPajak"/>
            </div>
        </div>
	    <div class="form-group col-2">
            <label for="date">Jatuh Tempo KIR <?php echo form_error('JatuhTempoKir') ?></label>
            <!-- <input type="text" class="form-control" name="JatuhTempoKir" id="JatuhTempoKir" placeholder="JatuhTempoKir" value="<?php echo $JatuhTempoKir; ?>" /> -->
            <div class="input-group date" id="JatuhTempoKir" data-target-input="nearest">
                <div class="input-group-append" data-target="#JatuhTempoKir" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input placeholder="Jatuh Tempo Kir" type="text" name="JatuhTempoKir" value="<?php echo $JatuhTempoKir; ?>" class="form-control datetimepicker-input" data-target="#JatuhTempoKir"/>
            </div>
        </div>
	    <div class="form-group col-2">
            <label for="varchar">Tgl. Beli <?php echo form_error('TglBeli') ?></label>
            <!-- <input type="text" class="form-control" name="TglBeli" id="TglBeli" placeholder="Tgl. Beli" value="<?php echo $TglBeli; ?>" /> -->
            <div class="input-group date" id="TglBeli" data-target-input="nearest">
                <div class="input-group-append" data-target="#TglBeli" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input placeholder="Tgl. Beli" type="text" name="TglBeli" value="<?php echo $TglBeli; ?>" class="form-control datetimepicker-input" data-target="#TglBeli"/>
            </div>
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
