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
        <h2 style="margin-top:0px">T07_vendor List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php if ($hakAkses['tambah']) { ?>
                <?php echo anchor(site_url('_07_vendor/create'),'Tambah', 'class="btn btn-primary"'); ?>
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
                <form action="<?php echo site_url('_07_vendor'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('_07_vendor'); ?>" class="btn btn-secondary">Reset</a>
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
				<th>KODE</th>
				<th>NAMA</th>
				<th>CONTACT PERSON</th>
				<th>TELEPON</th>
				<th>ALAMAT</th>
				<th>KOTA</th>
				<th class="text-center">PROSES</th>
            </tr>
			<?php foreach ($_07_vendor_data as $_07_vendor) { ?>
            <tr>
				<td width="80px" class="text-right"><?php echo ++$start ?></td>
				<td><?php echo $_07_vendor->Kode ?></td>
				<td><?php echo $_07_vendor->Nama ?></td>
				<td><?php echo $_07_vendor->ContactPerson ?></td>
				<td><?php echo $_07_vendor->Telepon ?></td>
				<td><?php echo $_07_vendor->Alamat ?></td>
				<td><?php echo $_07_vendor->Kota ?></td>
				<td style="text-align:center" width="200px">
				<?php
				//echo anchor(site_url('_07_vendor/read/'.$_07_vendor->idvendor),'Read');
				//echo ' | ';
                if ($hakAkses['ubah']) {
				echo anchor(site_url('_07_vendor/update/'.$_07_vendor->idvendor),'Ubah');
                if ($hakAkses['hapus']) {
				echo ' | ';
                }
                }
                if ($hakAkses['hapus']) {
				echo anchor(site_url('_07_vendor/delete/'.$_07_vendor->idvendor),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"');
                }
				?>
				</td>
			</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
				<?php echo anchor(site_url('_07_vendor/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('_07_vendor/word'), 'Word', 'class="btn btn-primary"'); ?> -->
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
