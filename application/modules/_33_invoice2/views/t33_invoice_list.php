<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php //echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T33_invoice List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php if ($hakAkses['tambah']) { ?>
                <?php echo anchor(site_url('_33_invoice2/create/0/0'),'Tambah', 'class="btn btn-primary"'); ?>
                <?php } ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('_33_invoice2'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('_33_invoice2'); ?>" class="btn btn-secondary">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th class="text-right">NO.</th>
                <th>CUSTOMER</th>
                <th>NO. JO</th>
				<th>NO. INVOICE</th>
				<th>TGL. INVOICE</th>
				<th class="text-right">TOTAL</th>
                <th class="text-right">PPN (%)</th>
                <th class="text-right">PPN</th>
                <th class="text-right">GRAND TOTAL</th>
				<!-- <th>CREATED AT</th> -->
				<!-- <th>UPDATED AT</th> -->
				<th class="text-center">PROSES</th>
            </tr>
			<?php foreach ($_33_invoice2_data as $_33_invoice2) { ?>
            <tr>
				<td width="80px" class="text-right"><?php echo ++$start ?></td>
                <td><?php echo $_33_invoice2->customerNama ?></td>
                <td><?php echo $_33_invoice2->NoJO ?></td>
				<td><?php echo $_33_invoice2->NoInvoice ?></td>
				<td><?php echo dateIndo($_33_invoice2->TglInvoice) ?></td>
				<td class="text-right"><?php echo number_format($_33_invoice2->Total) ?></td>
                <td class="text-right"><?php echo number_format($_33_invoice2->PPNpersen) ?></td>
                <td class="text-right"><?php echo number_format($_33_invoice2->PPNnilai) ?></td>
                <td class="text-right"><?php echo number_format($_33_invoice2->GrandTotal) ?></td>
				<!-- <td><?php //echo $_33_invoice2->created_at ?></td> -->
				<!-- <td><?php //echo $_33_invoice2->updated_at ?></td> -->
				<td style="text-align:center" width="200px">
				<?php
				//echo anchor(site_url('_33_invoice2/read/'.$_33_invoice2->idinvoice),'Read');
				//echo ' | ';
                if ($hakAkses['ubah']) {
				echo anchor(site_url('_33_invoice2/update/'.$_33_invoice2->idinvoice),'Ubah');
                if ($hakAkses['hapus']) {
				echo ' | ';
                }
                }
                if ($hakAkses['hapus']) {
				echo anchor(site_url('_33_invoice2/delete/'.$_33_invoice2->idinvoice),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"');
                }
				?>
				</td>
			</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
				<?php echo anchor(site_url('_33_invoice2/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('_33_invoice2/word'), 'Word', 'class="btn btn-primary"'); ?> -->
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
