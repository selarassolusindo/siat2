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
        <h2>T08_armada List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Merk</th>
		<th>Tipe</th>
		<th>TahunPembuatan</th>
		<th>NoPol</th>
		<th>NomorRangka</th>
		<th>NomorMesin</th>
		<th>TglBeli</th>
		<th>JatuhTempoPajak</th>
		<th>JatuhTempoKir</th>
		
            </tr><?php
            foreach ($_08_armada_data as $_08_armada)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_08_armada->Kode ?></td>
		      <td><?php echo $_08_armada->Merk ?></td>
		      <td><?php echo $_08_armada->Tipe ?></td>
		      <td><?php echo $_08_armada->TahunPembuatan ?></td>
		      <td><?php echo $_08_armada->NoPol ?></td>
		      <td><?php echo $_08_armada->NomorRangka ?></td>
		      <td><?php echo $_08_armada->NomorMesin ?></td>
		      <td><?php echo $_08_armada->TglBeli ?></td>
		      <td><?php echo $_08_armada->JatuhTempoPajak ?></td>
		      <td><?php echo $_08_armada->JatuhTempoKir ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>