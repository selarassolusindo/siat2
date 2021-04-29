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
        <h2>T15_driver List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>HP</th>
		<th>KTP</th>
		
            </tr><?php
            foreach ($_15_driver_data as $_15_driver)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_15_driver->Kode ?></td>
		      <td><?php echo $_15_driver->Nama ?></td>
		      <td><?php echo $_15_driver->Alamat ?></td>
		      <td><?php echo $_15_driver->HP ?></td>
		      <td><?php echo $_15_driver->KTP ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>