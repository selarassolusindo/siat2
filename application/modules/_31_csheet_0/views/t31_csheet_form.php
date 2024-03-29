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
        <h2 style="margin-top:0px">T31_csheet <?php //echo $button ?></h2> -->
        <script type="text/javascript">
            var i = 0;
        </script>
        <form action="<?php echo $action; ?>" method="post">
            <input type="hidden" name="totalHidden" id="totalHidden">
			<div class="form-group">
            	<label for="varchar">NO. COST SHEET <?php echo form_error('NoCSheet') ?></label>
            	<input type="text" class="form-control" name="NoCSheet" id="NoCSheet" placeholder="NO. COST SHEET" value="<?php echo $NoCSheet; ?>" />
        	</div>
			<div class="form-group col-2 p-0">
            	<label for="date">TGL. COST SHEET <?php echo form_error('TglCSheet') ?></label>
            	<!-- <input type="text" class="form-control" name="TglCSheet" id="TglCSheet" placeholder="TGL. COST SHEET" value="<?php echo $TglCSheet; ?>" /> -->
                <div class="input-group date" id="TglCSheet" data-target-input="nearest">
                    <div class="input-group-append" data-target="#TglCSheet" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="TGL. COST SHEET" type="text" name="TglCSheet" value="<?php echo $TglCSheet; ?>" class="form-control datetimepicker-input" data-target="#TglCSheet"/>
                </div>
        	</div>
			<div class="form-group">
            	<label for="int">NO. JO <?php echo form_error('idjo') ?></label>
            	<!-- <input type="text" class="form-control" name="idjo" id="idjo" placeholder="NO. JO" value="<?php echo $idjo; ?>" /> -->
                <select class="form-control" name="idjo">
                    <?php foreach($dataJO as $d) { ?>
                        <option value="<?php echo $d->idjo ?>" <?php echo $d->idjo == $idjo ? "selected" : "" ?>><?php echo $d->NoJO ?></option>
                    <?php } ?>
                </select>
        	</div>

            <div class="form-group">
                <!-- <label for="double">COST</label> -->
                <!-- <p><a href="#" onclick="tambah()" class="btn btn-primary mb-2">Tambah Cost</a></p> -->
                <div id="tmp">
                    <div class="row mb-2">
                        <div class="col text-center font-weight-bold">
                            COST
                        </div>
                        <div class="col text-center font-weight-bold">
                            QTY.
                        </div>
                        <div class="col text-center font-weight-bold">
                            SATUAN
                        </div>
                        <div class="col text-center font-weight-bold">
                            HARGA
                        </div>
                        <div class="col text-center font-weight-bold">
                            JUMLAH
                        </div>
                        <div class="col">

                        </div>
                    </div>
                <?php if ($this->uri->segment(2) == 'update') { ?>
                    <?php foreach ($detail as $key => $dtl) { ?>
                        <script type="text/javascript">
                            ++i;
                        </script>
            		    <div class="row mb-2" id="<?= $key ?>">
                		  	<div class="col">
                                <select class="form-control" name="idcost[]" required>
                                    <?php foreach($dataCost as $d) { ?>
                                        <option value="<?php echo $d->idcost ?>" <?php echo $d->idcost == $dtl->idcost ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                                    <?php } ?>
                                </select>
                		  	</div>
                            <div class="col">
                  		  		<input type="number" value="<?php echo $dtl->Qty ?>" name="qty[]" id="qty[<?php echo $key ?>]" class="form-control text-right" placeholder="QTY." required onblur="calculate(<?php echo $key ?>)" onkeyup="calculate(<?php echo $key ?>)">
                  		  	</div>
                            <div class="col">
                  		  		<!-- <input type="number" name="satuan[]" class="form-control" placeholder="SATUAN" required> -->
                                <select class="form-control" name="idsatuan[]" placeholder="SATUAN" required>
                                    <?php foreach($dataSatuan as $d) { ?>
                                        <option value="<?php echo $d->idsatuan ?>" <?php echo $d->idsatuan == $dtl->idsatuan ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                                    <?php } ?>
                                </select>
                  		  	</div>
                            <div class="col">
                  		  		<input type="number" value="<?php echo $dtl->Harga ?>" name="harga[]" id="harga[<?php echo $key ?>]" class="form-control text-right" placeholder="HARGA" required onblur="calculate(<?php echo $key ?>)" onkeyup="calculate(<?php echo $key ?>)">
                  		  	</div>
                		  	<div class="col">
                		  		<input type="number" value="<?php echo $dtl->Jumlah ?>" name="jumlah[]" id="jumlah[<?php echo $key ?>]" class="form-control text-right" placeholder="Jumlah" required>
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
                            <select class="form-control" name="idcost[]" placeholder="COST" required>
                                <?php foreach($dataCost as $d) { ?>
                                    <option value="<?php echo $d->idcost ?>"><?php echo $d->Nama ?></option>
                                <?php } ?>
                            </select>
              		  	</div>
                        <div class="col">
              		  		<input type="number" name="qty[]" id="qty[0]" class="form-control text-right" placeholder="QTY." required onblur="calculate(0)" onkeyup="calculate(0)">
              		  	</div>
                        <div class="col">
              		  		<!-- <input type="number" name="satuan[]" class="form-control" placeholder="SATUAN" required> -->
                            <select class="form-control" name="idsatuan[]" placeholder="SATUAN" required>
                                <?php foreach($dataSatuan as $d) { ?>
                                    <option value="<?php echo $d->idsatuan ?>"><?php echo $d->Nama ?></option>
                                <?php } ?>
                            </select>
              		  	</div>
                        <div class="col">
              		  		<input type="number" name="harga[]" id="harga[0]" class="form-control text-right" placeholder="HARGA" required onblur="calculate(0)" onkeyup="calculate(0)">
              		  	</div>
              		  	<div class="col">
              		  		<input type="number" name="jumlah[]" id="jumlah[0]" class="form-control text-right" placeholder="JUMLAH" required readonly>
              		  	</div>
              		  	<div class="col">

              		  	</div>
          		    </div>
                <?php } ?>
                </div>
                <a href="#" onclick="tambah()" class="btn btn-primary mb-2">Tambah Cost</a>

                <script type="text/javascript">
                /**
                 * calculate qty * harga
                 */
                function calculate(index = 0) {
                    var qty = document.getElementById("qty["+index+"]");
                    var harga = document.getElementById("harga["+index+"]");

                    var jumlah = document.getElementById("jumlah["+index+"]");

                    if (qty != null && harga != null && jumlah != null) {
                        jumlah.value = parseFloat(qty.value) * parseFloat(harga.value);
                    }

                    var total2 = 0;
                    for (var j = 0; j <= i; j++) {
                        var qty = document.getElementById("qty["+j+"]");
                        var harga = document.getElementById("harga["+j+"]");

                        if (qty != null && harga != null) {
                            total2 += parseFloat(qty.value) * parseFloat(harga.value);
                        }

                    }

                    var total = document.getElementById('Total');
                    total.value = total2;

                    var totalHidden = document.getElementById('totalHidden');
                    totalHidden.value = total2;

                    if (!isNaN(total2)) {
                        // alert(totalHidden.value);
                    };
                }


            	function tambah()
                {
            		++i;
            		$('#tmp').append(
                        `
                        <div class="row mb-2" id="`+i+`">
                  		  	<div class="col">
                  		  		<!-- <input type="text" name="idcost[]" class="form-control" placeholder="Cost" required> -->
                                <select class="form-control form-control-sm" name="idcost[]" placeholder="COST" required>
                                    <?php foreach($dataCost as $d) { ?>
                                        <option value="<?php echo $d->idcost ?>"><?php echo $d->Nama ?></option>
                                    <?php } ?>
                                </select>
                  		  	</div>
                            <div class="col">
                  		  		<input type="number" name="qty[]" id="qty[`+i+`]" class="form-control form-control-sm text-right" placeholder="QTY." required onblur="calculate(`+i+`)" onkeyup="calculate(`+i+`)">
                  		  	</div>
                            <div class="col">
                  		  		<!-- <input type="number" name="satuan[]" class="form-control" placeholder="SATUAN" required> -->
                                <select class="form-control form-control-sm" name="idsatuan[]" placeholder="SATUAN" required>
                                    <?php foreach($dataSatuan as $d) { ?>
                                        <option value="<?php echo $d->idsatuan ?>"><?php echo $d->Nama ?></option>
                                    <?php } ?>
                                </select>
                  		  	</div>
                            <div class="col">
                  		  		<input type="number" name="harga[]" id="harga[`+i+`]" class="form-control form-control-sm text-right" placeholder="HARGA" required onblur="calculate(`+i+`)" onkeyup="calculate(`+i+`)">
                  		  	</div>
                  		  	<div class="col">
                  		  		<input type="number" name="jumlah[]" id="jumlah[`+i+`]" class="form-control form-control-sm text-right" placeholder="JUMLAH" required readonly>
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

			<div class="form-group">
            	<!-- <label for="double">TOTAL COST SHEET <?php echo form_error('Total') ?></label> -->
            	<!-- <input type="text" class="form-control" name="Total" id="Total" placeholder="TOTAL COST SHEET" value="<?php echo $Total; ?>" readonly /> -->
                <div class="row mb-2">
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                    <div class="col text-right font-weight-bold">
                        TOTAL
                    </div>
                    <div class="col">
                        <input type="number" class="form-control text-right" name="Total" id="Total" placeholder="TOTAL" value="<?php echo $Total; ?>" readonly />
                    </div>
                    <div class="col">

                    </div>
                </div>
        	</div>
			<!-- <div class="form-group">
            	<label for="timestamp">CREATED AT <?php //echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="CREATED AT" value="<?php //echo $created_at; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="timestamp">UPDATED AT <?php //echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="UPDATED AT" value="<?php //echo $updated_at; ?>" />
        	</div> -->
			<input type="hidden" name="idcsheet" value="<?php echo $idcsheet; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_31_csheet') ?>" class="btn btn-secondary">Batal</a>
		</form>

        <script>
            $(document).ready(function () {
                //Date range picker
                $('#TglCSheet').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
            })
        </script>
    <!-- </body>
</html> -->
