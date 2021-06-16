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
        <script type="text/javascript">
            var i = 0;
        </script>
        <form action="<?php echo $action; ?>" method="post">
            <div class="row form-group">
                <div class="col-2 ">
                	<label for="date">TGL. JO <?php echo form_error('TglJO') ?></label>
                	<!-- <input type="text" class="form-control" name="TglJO" id="TglJO" placeholder="TGLJO" value="<?php echo $TglJO; ?>" /> -->
                    <div class="input-group date" id="TglJO" data-target-input="nearest">
                        <div class="input-group-append" data-target="#TglJO" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input id="inputTglJO" placeholder="TGL. JO" type="text" name="TglJO" value="<?php echo $TglJO; ?>" class="form-control datetimepicker-input" data-target="#TglJO"/>
                    </div>
                </div>
                <div class="col-2">
                	<label for="varchar">NO. JO <?php echo form_error('NoJO') ?></label>
                	<input type="text" class="form-control" name="NoJO" id="NoJO" placeholder="NO. JO" value="<?php echo $NoJO; ?>" />
                </div>
        	</div>
			<div class="row form-group">
                <div class="col-3">
                	<label for="int">CUSTOMER <?php echo form_error('idcustomer') ?></label>
                	<!-- <input type="text" class="form-control" name="idcustomer" id="idcustomer" placeholder="IDCUSTOMER" value="<?php echo $idcustomer; ?>" /> -->
                    <select class="form-control" name="idcustomer">
                        <?php foreach($dataCustomer as $d) { ?>
                            <option value="<?php echo $d->idcustomer ?>" <?php echo $d->idcustomer == $idcustomer ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3">
                	<label for="int">SHIPPER <?php echo form_error('idshipper') ?></label>
                	<!-- <input type="text" class="form-control" name="idshipper" id="idshipper" placeholder="IDSHIPPER" value="<?php echo $idshipper; ?>" /> -->
                    <select class="form-control" name="idshipper">
                        <?php foreach($dataShipper as $d) { ?>
                            <option value="<?php echo $d->idshipper ?>" <?php echo $d->idshipper == $idshipper ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-2">
                	<label for="date">TGL. MUAT <?php echo form_error('TglMB') ?></label>
                	<!-- <input type="text" class="form-control" name="TglMB" id="TglMB" placeholder="TGLMB" value="<?php echo $TglMB; ?>" /> -->
                    <div class="input-group date" id="TglMB" data-target-input="nearest">
                        <div class="input-group-append" data-target="#TglMB" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input placeholder="TGL. MUAT" type="text" name="TglMB" value="<?php echo $TglMB; ?>" class="form-control datetimepicker-input" data-target="#TglMB"/>
                    </div>
                </div>
                <div class="col-3">
                	<label for="int">LOKASI <?php echo form_error('idlokasi') ?></label>
                	<!-- <input type="text" class="form-control" name="idlokasi" id="idlokasi" placeholder="IDLOKASI" value="<?php echo $idlokasi; ?>" /> -->
                    <select class="form-control" name="idlokasi">
                        <?php foreach($dataLokasi as $d) { ?>
                            <option value="<?php echo $d->idlokasi ?>" <?php echo $d->idlokasi == $idlokasi ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                        <?php } ?>
                    </select>
                </div>
        	</div>

            <!-- detail armada -->
            <div class="form-group">
                <!-- <label for="double">COST</label> -->
                <!-- <p><a href="#" onclick="tambah()" class="btn btn-primary mb-2">Tambah Cost</a></p> -->
                <div id="tmp">
                    <!-- <div class="row mb-2">
                        <div class="col">
                            <label for="">ARMADA</label>
                        </div>
                        <div class="col">
                            <label for="">NO. CONTAINER</label>
                        </div>
                        <div class="col">

                        </div>
                    </div> -->
                <?php if ($this->uri->segment(2) == 'update') { ?>
                    <div class="row">
                        <div class="col">
                            <label for="">ARMADA</label>
                        </div>
                        <div class="col">
                            <label for="">NO. CONTAINER</label>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <?php foreach ($detail as $key => $dtl) { ?>
                        <script type="text/javascript">
                            ++i;
                        </script>
            		    <div class="row mb-2" id="<?= $key ?>">
                		  	<div class="col">
                                <select class="form-control" name="idarmada[]" placeholder="ARMADA" required>
                                    <?php foreach($dataArmada as $d) { ?>
                                        <option value="<?php echo $d->idarmada ?>" <?php echo $d->idarmada == $dtl->idarmada ? "selected" : "" ?>><?php echo $d->Merk . ' - ' . $d->Tipe . ' - ' . $d->NoPol ?></option>
                                    <?php } ?>
                                </select>
                		  	</div>
                            <div class="col">
                                <!-- <label for="">NO. CONTAINER</label> -->
                  		  		<input type="text" value="<?php echo $dtl->no_cont ?>" name="no_cont[]" class="form-control" placeholder="NO. CONTAINER" required >
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
                            <label for="">ARMADA</label>
                            <select class="form-control" name="idarmada[]" placeholder="ARMADA" required>
                                <?php foreach($dataArmada as $d) { ?>
                                    <option value="<?php echo $d->idarmada ?>"><?php echo $d->Merk . ' - ' . $d->Tipe . ' - ' . $d->NoPol ?></option>
                                <?php } ?>
                            </select>
              		  	</div>
                        <div class="col">
                            <label for="">NO. CONTAINER</label>
                            <input type="text" name="no_cont[]" class="form-control" placeholder="NO. CONTAINER" required >
              		  	</div>
              		  	<div class="col">

              		  	</div>
          		    </div>
                <?php } ?>
                </div>
                <a href="#" onclick="tambah()" class="btn btn-primary mb-2">Tambah Armada</a>

                <script type="text/javascript">

            	function tambah()
                {
            		++i;
            		$('#tmp').append(
                        `
                        <div class="row mb-2" id="`+i+`">
                  		  	<div class="col">
                  		  		<!-- <input type="text" name="idcost[]" class="form-control" placeholder="Cost" required> -->
                                <select class="form-control form-control-sm" name="idarmada[]" placeholder="ARMADA" required>
                                    <?php foreach($dataArmada as $d) { ?>
                                        <option value="<?php echo $d->idarmada ?>"><?php echo $d->Merk . ' - ' . $d->Tipe . ' - ' . $d->NoPol ?></option>
                                    <?php } ?>
                                </select>
                  		  	</div>
                            <div class="col">
                  		  		<input type="text" name="no_cont[]" class="form-control form-control-sm" placeholder="NO. CONTAINER" required >
                  		  	</div>
                            <div class="col">
                    		      <a href="#" onclick="hapus(`+i+`)" class="text-danger">Hapus</a>
                    		</div>
              		    </div>
                        `
            		);
            	};

                function hapus(index)
                {
            		$('#'+index).remove();
                    //--i;
                    calculate();
            	}
                </script>
            </div>
			<!-- <div class="form-group">
            	<label for="timestamp">CREATED AT <?php echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="CREATED AT" value="<?php echo $created_at; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="timestamp">UPDATED AT <?php echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="UPDATED AT" value="<?php echo $updated_at; ?>" />
        	</div> -->
			<input type="hidden" name="idjo" value="<?php echo $idjo; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_30_jo') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->

<script type="text/javascript">

    $(document).ready(function () {
        //Date range picker
        $('#TglJO').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#TglMB').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#TglJO').on('change.datetimepicker', function () {
            // alert('!!!');
            newJO();
        });
        // $("#Datetimepicker").on("change.datetimepicker",function(){
        //     alert("It works!")});
    });

    function newJO() {
        // alert('1');
        var tgl = document.getElementById("inputTglJO").value;

        // alert(tgl);
        window.location = "<?php echo site_url() ?>_30_jo/create/"+tgl;
        // tgl =
    }

</script>
