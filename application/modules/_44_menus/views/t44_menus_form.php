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
        <h2 style="margin-top:0px">T44_menus <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">MENU / MODUL <?php echo form_error('Menus') ?></label>
            	<input type="text" class="form-control" name="Menus" id="Menus" placeholder="Menus" value="<?php echo $Menus; ?>" />
        	</div>
			<input type="hidden" name="idmenus" value="<?php echo $idmenus; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('_44_menus') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
