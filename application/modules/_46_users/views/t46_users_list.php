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
        <h2 style="margin-top:0px">T46_users List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('_46_users/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('_46_users/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('_46_users'); ?>" class="btn btn-default">Reset</a>
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
		<th>Ip Address</th>
		<th>Username</th>
		<th>Password</th>
		<th>Email</th>
		<th>Activation Selector</th>
		<th>Activation Code</th>
		<th>Forgotten Password Selector</th>
		<th>Forgotten Password Code</th>
		<th>Forgotten Password Time</th>
		<th>Remember Selector</th>
		<th>Remember Code</th>
		<th>Created On</th>
		<th>Last Login</th>
		<th>Active</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Company</th>
		<th>Phone</th>
		<th>Action</th>
            </tr><?php
            foreach ($_46_users_data as $_46_users)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $_46_users->ip_address ?></td>
			<td><?php echo $_46_users->username ?></td>
			<td><?php echo $_46_users->password ?></td>
			<td><?php echo $_46_users->email ?></td>
			<td><?php echo $_46_users->activation_selector ?></td>
			<td><?php echo $_46_users->activation_code ?></td>
			<td><?php echo $_46_users->forgotten_password_selector ?></td>
			<td><?php echo $_46_users->forgotten_password_code ?></td>
			<td><?php echo $_46_users->forgotten_password_time ?></td>
			<td><?php echo $_46_users->remember_selector ?></td>
			<td><?php echo $_46_users->remember_code ?></td>
			<td><?php echo $_46_users->created_on ?></td>
			<td><?php echo $_46_users->last_login ?></td>
			<td><?php echo $_46_users->active ?></td>
			<td><?php echo $_46_users->first_name ?></td>
			<td><?php echo $_46_users->last_name ?></td>
			<td><?php echo $_46_users->company ?></td>
			<td><?php echo $_46_users->phone ?></td>
			<td style="text-align:center" width="200px">
				<?php
				echo anchor(site_url('_46_users/read/'.$_46_users->id),'Read');
				echo ' | ';
				echo anchor(site_url('_46_users/update/'.$_46_users->id),'Update');
				echo ' | ';
				echo anchor(site_url('_46_users/delete/'.$_46_users->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
		<?php echo anchor(site_url('_46_users/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('_46_users/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
