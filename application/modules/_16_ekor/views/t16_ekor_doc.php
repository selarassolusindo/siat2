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
        <h2>T16_ekor List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Merk</th>
		<th>Tipe</th>
		<th>TglBeli</th>
		<th>TglKir</th>
		
            </tr><?php
            foreach ($_16_ekor_data as $_16_ekor)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_16_ekor->Kode ?></td>
		      <td><?php echo $_16_ekor->Merk ?></td>
		      <td><?php echo $_16_ekor->Tipe ?></td>
		      <td><?php echo $_16_ekor->TglBeli ?></td>
		      <td><?php echo $_16_ekor->TglKir ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>