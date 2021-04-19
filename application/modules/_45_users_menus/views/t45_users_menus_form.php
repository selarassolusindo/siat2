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
        <h2 style="margin-top:0px">T45_users_menus <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="int">Idusers <?php echo form_error('idusers') ?></label>
            	<input type="text" class="form-control" name="idusers" id="idusers" placeholder="Idusers" value="<?php echo $idusers; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">Idmenus <?php echo form_error('idmenus') ?></label>
            	<input type="text" class="form-control" name="idmenus" id="idmenus" placeholder="Idmenus" value="<?php echo $idmenus; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">Rights <?php echo form_error('rights') ?></label>
            	<input type="text" class="form-control" name="rights" id="rights" placeholder="Rights" value="<?php echo $rights; ?>" />
        	</div>
			<input type="hidden" name="idusersmenus" value="<?php echo $idusersmenus; ?>" /> 
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
			<a href="<?php echo site_url('_45_users_menus') ?>" class="btn btn-secondary">Batal</a>
		</form>
    </body>
</html>