<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T45_users_menus List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idusers</th>
		<th>Idmenus</th>
		<th>Rights</th>
		
            </tr><?php
            foreach ($_45_users_menus_data as $_45_users_menus)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_45_users_menus->idusers ?></td>
		      <td><?php echo $_45_users_menus->idmenus ?></td>
		      <td><?php echo $_45_users_menus->rights ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>