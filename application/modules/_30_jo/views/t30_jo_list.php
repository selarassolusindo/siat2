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
        <h2 style="margin-top:0px">T30_jo List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php if ($hakAkses['tambah']) { ?>
                <?php echo anchor(site_url('_30_jo/create'),'Tambah', 'class="btn btn-primary"'); ?>
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
                <form action="<?php echo site_url('_30_jo'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('_30_jo'); ?>" class="btn btn-secondary">Reset</a>
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
				<th>NO. JO</th>
				<th>TGL. JO</th>
				<th>CUSTOMER</th>
				<th>SHIPPER</th>
				<th>TGL. MUAT/BONGKAR</th>
				<th>LOKASI</th>
				<th>ARMADA</th>
				<th>DRIVER</th>
				<!-- <th>CREATED AT</th> -->
				<!-- <th>UPDATED AT</th> -->
				<th class="text-center">PROSES</th>
            </tr>
			<?php foreach ($_30_jo_data as $_30_jo) { ?>
            <tr>
				<td width="80px" class="text-right"><?php echo ++$start ?></td>
				<td><?php echo $_30_jo->NoJO ?></td>
				<td><?php echo dateIndo($_30_jo->TglJO) ?></td>
				<td><?php echo $_30_jo->NamaCustomer ?></td>
				<td><?php echo $_30_jo->NamaShipper ?></td>
				<td><?php echo dateIndo($_30_jo->TglMB) ?></td>
				<td><?php echo $_30_jo->NamaLokasi ?></td>
				<td><?php echo $_30_jo->NamaArmada ?></td>
				<td><?php echo $_30_jo->NamaDriver ?></td>
				<!-- <td><?php echo $_30_jo->created_at ?></td> -->
				<!-- <td><?php echo $_30_jo->updated_at ?></td> -->
				<td style="text-align:center" width="200px">
				<?php
				//echo anchor(site_url('_30_jo/read/'.$_30_jo->idjo),'Read');
				//echo ' | ';
                if ($hakAkses['ubah']) {
				echo anchor(site_url('_30_jo/update/'.$_30_jo->idjo),'Ubah');
                if ($hakAkses['hapus']) {
				echo ' | ';
                }
                }
                if ($hakAkses['hapus']) {
                echo anchor(site_url('_30_jo/delete/'.$_30_jo->idjo),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"');
                }
            	?>
				</td>
			</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
				<?php echo anchor(site_url('_30_jo/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('_30_jo/word'), 'Word', 'class="btn btn-primary"'); ?> -->
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
