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
        <h2>T07_vendor List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>ContactPerson</th>
		<th>Telepon</th>
		<th>Alamat</th>
		<th>Kota</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($_07_vendor_data as $_07_vendor)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_07_vendor->Kode ?></td>
		      <td><?php echo $_07_vendor->Nama ?></td>
		      <td><?php echo $_07_vendor->ContactPerson ?></td>
		      <td><?php echo $_07_vendor->Telepon ?></td>
		      <td><?php echo $_07_vendor->Alamat ?></td>
		      <td><?php echo $_07_vendor->Kota ?></td>
		      <td><?php echo $_07_vendor->created_at ?></td>
		      <td><?php echo $_07_vendor->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>