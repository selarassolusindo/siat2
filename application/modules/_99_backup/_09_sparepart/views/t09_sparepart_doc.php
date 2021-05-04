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
        <h2>T09_sparepart List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Merk</th>
		<th>Tipe</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($_09_sparepart_data as $_09_sparepart)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_09_sparepart->Kode ?></td>
		      <td><?php echo $_09_sparepart->Nama ?></td>
		      <td><?php echo $_09_sparepart->Merk ?></td>
		      <td><?php echo $_09_sparepart->Tipe ?></td>
		      <td><?php echo $_09_sparepart->created_at ?></td>
		      <td><?php echo $_09_sparepart->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>