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
        <h2 style="margin-top:0px">T33_invoice <?php //echo $button ?></h2> -->
        <script type="text/javascript">

        var i = 0;

        function selectCustomer() {
            var x = document.getElementById('idcustomer').value;
            if (x == "") {
                x = 0;
            }
            var url = "_33_invoice2/create/"+x+"/0";
            window.location = "<?php echo site_url() ?>"+url;
        }

        function selectJO() {
            var w = document.getElementById('idcustomer').value;
            var x = document.getElementById('idjo').value;
            if (x == "") {
                x = 0;
            }
            var url = "_33_invoice2/create/"+w+"/"+x;
            window.location = "<?php echo site_url() ?>"+url;
        }
        </script>
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
            	<label for="varchar">CUSTOMER <?php echo form_error('idcustomer') ?></label>
                <select class="form-control" name="idcustomer" id="idcustomer" onchange="selectCustomer()">
                    <option value=""></option>
                    <?php foreach($dataCustomer as $d) { ?>
                        <option value="<?php echo $d->idcustomer ?>" <?php echo $d->idcustomer == $idcustomer ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                    <?php } ?>
                </select>
        	</div>
            <div class="form-group">
            	<label for="int">NO. JO <?php echo form_error('idjo') ?></label>
            	<!-- <input type="text" class="form-control" name="idjo" id="idjo" placeholder="IDJO" value="<?php echo $idjo; ?>" /> -->
                <select class="form-control" name="idjo" id="idjo" onchange="selectJO()">
                    <option value=""></option>
                    <?php foreach($dataJO as $d) { ?>
                        <option value="<?php echo $d->idjo ?>" <?php echo $d->idjo == $idjo ? "selected" : "" ?>><?php echo $d->NoJO ?></option>
                    <?php } ?>
                </select>
        	</div>
			<div class="form-group">
            	<label for="varchar">NO. INVOICE <?php echo form_error('NoInvoice') ?></label>
            	<input type="text" class="form-control" name="NoInvoice" id="NoInvoice" placeholder="NO. INVOICE" value="<?php echo $NoInvoice; ?>" />
        	</div>
			<div class="form-group col-2 p-0">
            	<label for="date">TGL. INVOICE <?php echo form_error('TglInvoice') ?></label>
            	<!-- <input type="text" class="form-control" name="TglInvoice" id="TglInvoice" placeholder="TGL. INVOICE" value="<?php echo $TglInvoice; ?>" /> -->
                <div class="input-group date" id="TglInvoice" data-target-input="nearest">
                    <div class="input-group-append" data-target="#TglInvoice" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="TGL. INVOICE" type="text" name="TglInvoice" value="<?php echo $TglInvoice; ?>" class="form-control datetimepicker-input" data-target="#TglInvoice"/>
                </div>
        	</div>
			<!-- <div class="form-group">
            	<label for="int">IDJO <?php echo form_error('idjo') ?></label>
            	<input type="text" class="form-control" name="idjo" id="idjo" placeholder="IDJO" value="<?php echo $idjo; ?>" />
        	</div> -->

            <!-- detail invoice -->
            <div class="form-group">
                <label for="double">SERVICE</label>
                <!-- <p><a href="#" onclick="tambah()" class="btn btn-primary mb-2">Tambah Cost</a></p> -->
                <div id="tmp">
                <?php if ($this->uri->segment(2) == 'update') { ?>
                    <?php foreach ($detail as $key => $dtl) { ?>
                        <script type="text/javascript">
                            ++i;
                        </script>
            		    <div class="row mb-2" id="<?= $key ?>">
                		  	<div class="col">
                                <select class="form-control" name="idservice[]" required>
                                    <?php foreach($dataService as $d) { ?>
                                        <option value="<?php echo $d->idservice ?>" <?php echo $d->idservice == $dtl->idservice ? "selected" : "" ?>><?php echo $d->Nama ?></option>
                                    <?php } ?>
                                </select>
                		  	</div>
                            <div class="col">
                  		  		<input type="number" value="<?php echo $dtl->Qty ?>" name="qty[]" id="qty[<?php echo $key ?>]" class="form-control" placeholder="QTY." required onblur="calculate(<?php echo $key ?>)" onkeyup="calculate(<?php echo $key ?>)">
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
                  		  		<input type="number" value="<?php echo $dtl->Harga ?>" name="harga[]" id="harga[<?php echo $key ?>]" class="form-control" placeholder="HARGA" required onblur="calculate(<?php echo $key ?>)" onkeyup="calculate(<?php echo $key ?>)">
                  		  	</div>
                		  	<div class="col">
                		  		<input type="number" value="<?php echo $dtl->Jumlah ?>" name="jumlah[]" id="jumlah[<?php echo $key ?>]" class="form-control" placeholder="Jumlah" required readonly>
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
                            <select class="form-control" name="idservice[]" placeholder="SERVICE" required>
                                <?php foreach($dataService as $d) { ?>
                                    <option value="<?php echo $d->idservice ?>"><?php echo $d->Nama ?></option>
                                <?php } ?>
                            </select>
              		  	</div>
                        <div class="col">
              		  		<input type="number" name="qty[]" id="qty[0]" class="form-control" placeholder="QTY." required onblur="calculate(0)" onkeyup="calculate(0)">
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
              		  		<input type="number" name="harga[]" id="harga[0]" class="form-control" placeholder="HARGA" required onblur="calculate(0)" onkeyup="calculate(0)">
              		  	</div>
              		  	<div class="col">
              		  		<input type="number" name="jumlah[]" id="jumlah[0]" class="form-control" placeholder="JUMLAH" required readonly>
              		  	</div>
              		  	<div class="col">

              		  	</div>
          		    </div>
                <?php } ?>
                </div>
                <a href="#" onclick="tambah()" class="btn btn-primary mb-2">TAMBAH SERVICE</a>

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

                    // var totalHidden = document.getElementById('totalHidden');
                    // totalHidden.value = total2;

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
                                <select class="form-control form-control-sm" name="idservice[]" placeholder="SERVICE" required>
                                    <?php foreach($dataService as $d) { ?>
                                        <option value="<?php echo $d->idservice ?>"><?php echo $d->Nama ?></option>
                                    <?php } ?>
                                </select>
                  		  	</div>
                            <div class="col">
                  		  		<input type="number" name="qty[]" id="qty[`+i+`]" class="form-control form-control-sm" placeholder="QTY." required onblur="calculate(`+i+`)" onkeyup="calculate(`+i+`)">
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
                  		  		<input type="number" name="harga[]" id="harga[`+i+`]" class="form-control form-control-sm" placeholder="HARGA" required onblur="calculate(`+i+`)" onkeyup="calculate(`+i+`)">
                  		  	</div>
                  		  	<div class="col">
                  		  		<input type="number" name="jumlah[]" id="jumlah[`+i+`]" class="form-control form-control-sm" placeholder="JUMLAH" required readonly>
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
            <!-- /detail invoice -->

			<div class="form-group">
            	<label for="double">TOTAL INVOICE<?php echo form_error('Total') ?></label>
            	<input type="text" class="form-control" name="Total" id="Total" placeholder="TOTAL" value="<?php echo $Total; ?>" />
        	</div>
			<!-- <div class="form-group">
            	<label for="timestamp">CREATED AT <?php echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="CREATED AT" value="<?php echo $created_at; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="timestamp">UPDATED AT <?php echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="UPDATED AT" value="<?php echo $updated_at; ?>" />
        	</div> -->
			<input type="hidden" name="idinvoice" value="<?php echo $idinvoice; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_33_invoice2') ?>" class="btn btn-secondary">Batal</a>
		</form>

        <script>
            $(document).ready(function () {
                //Date range picker
                $('#TglInvoice').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
            })
        </script>
    <!-- </body>
</html> -->
