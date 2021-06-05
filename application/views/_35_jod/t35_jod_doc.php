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
        <h2>T35_jod List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idjo</th>
		<th>Idarmada</th>
		<th>No Cont</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($_35_jod_data as $_35_jod)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_35_jod->idjo ?></td>
		      <td><?php echo $_35_jod->idarmada ?></td>
		      <td><?php echo $_35_jod->no_cont ?></td>
		      <td><?php echo $_35_jod->created_at ?></td>
		      <td><?php echo $_35_jod->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>