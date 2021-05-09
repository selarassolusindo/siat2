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
			<div class="form-group">
            	<label for="date">TGL. INVOICE <?php echo form_error('TglInvoice') ?></label>
            	<input type="text" class="form-control" name="TglInvoice" id="TglInvoice" placeholder="TGL. INVOICE" value="<?php echo $TglInvoice; ?>" />
        	</div>
			<!-- <div class="form-group">
            	<label for="int">IDJO <?php echo form_error('idjo') ?></label>
            	<input type="text" class="form-control" name="idjo" id="idjo" placeholder="IDJO" value="<?php echo $idjo; ?>" />
        	</div> -->
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
    <!-- </body>
</html> -->
