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
        <h2>T30_jo List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NoJO</th>
		<th>TglJO</th>
		<th>Idcustomer</th>
		<th>Idshipper</th>
		<th>TglMB</th>
		<th>Idlokasi</th>
		<th>Idarmada</th>
		<th>Iddriver</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($_30_jo_data as $_30_jo)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_30_jo->NoJO ?></td>
		      <td><?php echo $_30_jo->TglJO ?></td>
		      <td><?php echo $_30_jo->idcustomer ?></td>
		      <td><?php echo $_30_jo->idshipper ?></td>
		      <td><?php echo $_30_jo->TglMB ?></td>
		      <td><?php echo $_30_jo->idlokasi ?></td>
		      <td><?php echo $_30_jo->idarmada ?></td>
		      <td><?php echo $_30_jo->iddriver ?></td>
		      <td><?php echo $_30_jo->created_at ?></td>
		      <td><?php echo $_30_jo->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>