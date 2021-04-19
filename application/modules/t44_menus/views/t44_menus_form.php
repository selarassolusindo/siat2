<!doctype html>
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
        <h2 style="margin-top:0px">T44_menus <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">Menu <?php echo form_error('Menu') ?></label>
            	<input type="text" class="form-control" name="Menu" id="Menu" placeholder="Menu" value="<?php echo $Menu; ?>" />
        	</div>
			<input type="hidden" name="idmenu" value="<?php echo $idmenu; ?>" /> 
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
			<a href="<?php echo site_url('t44_menus') ?>" class="btn btn-secondary">Batal</a>
		</form>
    </body>
</html>