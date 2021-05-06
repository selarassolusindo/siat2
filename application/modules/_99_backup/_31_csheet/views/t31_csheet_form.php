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
        <h2 style="margin-top:0px">T31_csheet <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No. Cost Sheet <?php echo form_error('NoCSheet') ?></label>
            <input type="text" class="form-control" name="NoCSheet" id="NoCSheet" placeholder="No. Cost Sheet" value="<?php echo $NoCSheet; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl. <?php echo form_error('TglCSheet') ?></label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input placeholder="Tgl. Cost Sheet" type="text" name="TglCSheet" value="<?php echo $TglCSheet; ?>" class="form-control datetimepicker-input" data-target="#reservationdate"/>
            </div>
        </div>
        <div class="form-group">
            <label for="int">No. JO <?php echo form_error('idjo') ?></label>
            <select name="idjo" class="form-control">
				<option value="">No. JO</option>
				<?php
				foreach($jo_data as $jo) {
					$selected = ($jo->idjo == $idjo) ? ' selected="selected"' : "";
					echo '<option value="'.$jo->idjo.'" '.$selected.'>'.$jo->NoJO.'</option>';
				}
				?>
			</select>
        </div>
	    <div class="form-group">
            <label for="double">Total <?php echo form_error('Total') ?></label>
            <input type="text" class="form-control" name="Total" id="Total" placeholder="Total" value="<?php echo number_format($Total); ?>" readonly="readonly" />
        </div>

        <div class="form-group">
            <label for="double">Cost</label>
            <p><a href="#" onclick="tambah()" class="btn btn-primary mb-2">Tambah Cost</a></p>
            <div id="tmp">
            <?php if ($this->uri->segment(2) == 'update') { ?>
                <?php foreach ($detail as $key => $d) { ?>
        		    <div class="row mb-2" id="<?= $key ?>">
            		  	<div class="col">
                            <select class="form-control cost" name="idcost[]" required>
                                <option value="<?= $d->idcost ?>" selected="selected"><?= $d->Nama ?></option>
                            </select>
            		  	</div>
            		  	<div class="col">
            		  		<input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" value="<?= $d->Jumlah ?>" required>
            		  	</div>
            		  	<div class="col">
                            <?php // if($key > 0) { ?>
            		  			<a href="#" onclick="hapus(<?= $key ?>)" class="text-danger">Hapus</a>
            		  		<?php // } ?>
            		  	</div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="row mb-2">
          		  	<div class="col">
          		  		<!-- <input type="text" name="idcost[]" class="form-control" placeholder="Cost" required> -->
                        <select class="form-control cost" name="idcost[]" required></select>
          		  	</div>
          		  	<div class="col">
          		  		<input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
          		  	</div>
          		  	<div class="col">

          		  	</div>
      		    </div>
            <?php } ?>
            </div>

            <script type="text/javascript">
            $('.cost').select2({
                ajax : {
                    url : `<?php echo site_url(); ?>cost`,
                    cache : true,
                    dataType  : 'json',
                    delay : 250,
                    processResults: function (data) {
                        $.each(data.items, function(i, o) { data.items[i].text = o.Nama; });
                        return {
                            results: data.items
                        };
                    },
                },
                placeholder : 'Cost',
            });
            </script>
        </div>

	    <input type="hidden" name="idcsheet" value="<?php echo $idcsheet; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('_31_csheet') ?>" class="btn btn-default">Cancel</a>
	</form>

    <script type="text/javascript">
    	var i = 1;
    	function tambah(){
    		i++;
    		$('#tmp').append(`
    		<div class="row mb-2" id="`+i+`">
                <div class="col">
                    <select class="form-control form-control-sm cost" name="idcost[]" required></select>
                </div>
                <div class="col">
                    <input type="number" name="jumlah[]" class="form-control form-control-sm" placeholder="Jumlah" required>
                </div>
    		  	<div class="col">
    		  		<a href="#" onclick="hapus(`+i+`)" class="text-danger">Hapus</a>
    		  	</div>
    		</div>`
    		);

            $('.cost').select2({
                ajax : {
                    url : `<?php echo site_url()?>cost`,
                    cache : true,
                    dataType  : 'json',
                    delay : 250,
                    processResults: function (data) {
                        $.each(data.items, function(i, o) { data.items[i].text = o.Nama; });
                        return {
                            results: data.items
                        };
                    }
                },
                placeholder : 'Cost',
            });
    	};

    	function hapus(index){
    		$('#'+index).remove();
    	}
    </script>
    <!-- </body>
</html> -->
