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
        <h2 style="margin-top:0px">T45_users_menus Read</h2>
        <table class="table">
	    <tr><td>Idusers</td><td><?php echo $idusers; ?></td></tr>
	    <tr><td>Idmenus</td><td><?php echo $idmenus; ?></td></tr>
	    <tr><td>Rights</td><td><?php echo $rights; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_45_users_menus') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>