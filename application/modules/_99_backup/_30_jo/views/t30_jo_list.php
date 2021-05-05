<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
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
                <?php echo anchor(site_url('_30_jo/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('_30_jo/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('_30_jo'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No. JO</th>
		<th>Tgl. JO</th>
		<th>Customer</th>
		<th>Shipper</th>
		<th>Tgl. Muat/Bongkar</th>
		<th>Lokasi Muat/Bongkar</th>
		<th>Armada</th>
		<th>Ekor</th>
		<th>Driver</th>
		<!-- <th>Created At</th>
		<th>Updated At</th> -->
		<th>Action</th>
            </tr><?php
            foreach ($_30_jo_data as $_30_jo)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $_30_jo->NoJO ?></td>
            <td><?php echo date_format(date_create($_30_jo->TglJO), 'd-m-Y') ?></td>
			<!-- <td><?php echo $_30_jo->idcustomer ?></td> -->
            <td><?php echo $_30_jo->NamaCustomer ?></td>
			<!-- <td><?php echo $_30_jo->idshipper ?></td> -->
            <td><?php echo $_30_jo->NamaShipper ?></td>
            <td><?php echo date_format(date_create($_30_jo->TglMB), 'd-m-Y') ?></td>
			<!-- <td><?php echo $_30_jo->idlokasi ?></td> -->
            <td><?php echo $_30_jo->NamaLokasi ?></td>
			<!-- <td><?php echo $_30_jo->idarmada ?></td> -->
            <td><?php echo $_30_jo->NamaArmada ?></td>
			<!-- <td><?php echo $_30_jo->idekor ?></td> -->
            <td><?php echo $_30_jo->NamaEkor ?></td>
			<!-- <td><?php echo $_30_jo->iddriver ?></td> -->
            <td><?php echo $_30_jo->NamaDriver ?></td>
			<!-- <td><?php echo $_30_jo->created_at ?></td>
			<td><?php echo $_30_jo->updated_at ?></td> -->
			<td style="text-align:center" width="200px">
				<?php
				echo anchor(site_url('_30_jo/read/'.$_30_jo->idjo),'Read');
				echo ' | ';
				echo anchor(site_url('_30_jo/update/'.$_30_jo->idjo),'Update');
				echo ' | ';
				echo anchor(site_url('_30_jo/delete/'.$_30_jo->idjo),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('_30_jo/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('_30_jo/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
