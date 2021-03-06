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
        <h2 style="margin-top:0px">T33_invoice <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No. Invoice <?php echo form_error('NoInvoice') ?></label>
            <input type="text" class="form-control" name="NoInvoice" id="NoInvoice" placeholder="NoInvoice" value="<?php echo $NoInvoice; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl. <?php echo form_error('TglInvoice') ?></label>
            <!-- <input type="text" class="form-control" name="TglInvoice" id="TglInvoice" placeholder="TglInvoice" value="<?php echo $TglInvoice; ?>" /> -->
        <!-- </div> -->

            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input type="text" name="TglInvoice" value="<?php echo $TglInvoice; ?>" class="form-control datetimepicker-input" data-target="#reservationdate"/>

            </div>
        </div>

        <!-- <div class="col-sm-2 input-group date" id="reservationdate" data-target-input="nearest">
            <input type="text" name="Tanggal" value="<?php echo $Tanggal; ?>" class="form-control datetimepicker-input" data-target="#reservationdate"/>
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div> -->

	    <div class="form-group">
            <label for="int">No. JO <?php echo form_error('idjo') ?></label>
            <!-- <input type="text" class="form-control" name="idjo" id="idjo" placeholder="Idjo" value="<?php echo $idjo; ?>" /> -->
            <select name="idjo" class="form-control">
    				<option value="">No. JO</option>
    				<?php
    				foreach($jo_data as $jo)
    				{
    					$selected = ($jo->idjo == $idjo) ? ' selected="selected"' : "";

    					echo '<option value="'.$jo->idjo.'" '.$selected.'>'.$jo->NoJO.'</option>';
    				}
    				?>
    			</select>
        </div>
	    <div class="form-group">
            <label for="double">Total <?php echo form_error('Total') ?></label>
            <input type="text" class="form-control" name="Total" id="Total" placeholder="Total" value="<?php echo $Total; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div> -->

        <div class="form-group">
            <label for="double">Service</label>

            <p><a href="#" onclick="tambah()" class="btn btn-primary mb-2">Tambah Service</a></p>

            <div id="tmp">
            <?php if ($this->uri->segment(2) == 'update') { ?>
                <?php foreach ($detail as $key => $d) { ?>
        		    <div class="row mb-2" id="<?= $key ?>">
            		  	<div class="col">
            		  		<!-- <input type="text" name="idcost[]" class="form-control" placeholder="Cost" value="<?= $d->idcost ?>" required> -->
                            <select class="form-control service" name="idservice[]" required>
                                <option value="<?= $d->idservice ?>" selected="selected"><?= $d->Nama ?></option>
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
                        <select class="form-control service" name="idservice[]" required></select>
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
            $('.service').select2({
                ajax : {
                    url : `<?php echo site_url(); ?>service`,
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
                placeholder : 'Service',
            });
            </script>
        </div>

	    <input type="hidden" name="idinvoice" value="<?php echo $idinvoice; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('_33_invoice') ?>" class="btn btn-default">Cancel</a>
	</form>

    <script type="text/javascript">
    	var i = 1;
    	function tambah(){
    		i++;
    		$('#tmp').append(`
    		<div class="row mb-2" id="`+i+`">
                <div class="col">
                    <select class="form-control form-control-sm service" name="idservice[]" required></select>
                </div>
                <div class="col">
                    <input type="number" name="jumlah[]" class="form-control form-control-sm" placeholder="Jumlah" required>
                </div>
    		  	<div class="col">
    		  		<a href="#" onclick="hapus(`+i+`)" class="text-danger">Hapus</a>
    		  	</div>
    		</div>`
    		);

            $('.service').select2({
                ajax : {
                    url : `<?php echo site_url()?>service`,
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
                placeholder : 'Service',
            });

    	};

    	function hapus(index){
    		$('#'+index).remove();
    	}
    </script>
    <!-- </body>
</html> -->
