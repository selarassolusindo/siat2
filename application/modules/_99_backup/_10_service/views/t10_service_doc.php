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
        <h2>T10_service List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($_10_service_data as $_10_service)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_10_service->Kode ?></td>
		      <td><?php echo $_10_service->Nama ?></td>
		      <td><?php echo $_10_service->created_at ?></td>
		      <td><?php echo $_10_service->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>