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
        <h2>T31_csheet List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nocsheet</th>
		<th>Tglcsheet</th>
		<th>Idjo</th>
		<th>Totalcsheet</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($_31_csheet_data as $_31_csheet)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_31_csheet->nocsheet ?></td>
		      <td><?php echo $_31_csheet->tglcsheet ?></td>
		      <td><?php echo $_31_csheet->idjo ?></td>
		      <td><?php echo $_31_csheet->totalcsheet ?></td>
		      <td><?php echo $_31_csheet->created_at ?></td>
		      <td><?php echo $_31_csheet->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>