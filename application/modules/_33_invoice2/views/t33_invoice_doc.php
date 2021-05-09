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
        <h2>T33_invoice List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NoInvoice</th>
		<th>TglInvoice</th>
		<th>Idjo</th>
		<th>Total</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($_33_invoice2_data as $_33_invoice2)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_33_invoice2->NoInvoice ?></td>
		      <td><?php echo $_33_invoice2->TglInvoice ?></td>
		      <td><?php echo $_33_invoice2->idjo ?></td>
		      <td><?php echo $_33_invoice2->Total ?></td>
		      <td><?php echo $_33_invoice2->created_at ?></td>
		      <td><?php echo $_33_invoice2->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>