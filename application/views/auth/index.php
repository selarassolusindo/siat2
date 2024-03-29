<!-- <h1><?php echo lang('index_heading');?></h1> -->
<!-- <p><?php echo lang('index_subheading');?></p> -->

<div id="infoMessage"><?php echo $message;?></div>

<!-- <table cellpadding=0 cellspacing=10> -->
<table class="table table-bordered" style="margin-bottom: 10px">
	<tr>
		<!-- <th><?php echo lang('index_fname_th');?></th> -->
		<!-- <th><?php echo lang('index_uname_th');?></th> -->
		<!-- <th><?php echo lang('index_lname_th');?></th> -->
		<!-- <th><?php echo lang('index_email_th');?></th> -->
		<!-- <th><?php echo lang('index_groups_th');?></th> -->
		<!-- <th><?php echo lang('index_status_th');?></th> -->
		<!-- <th><?php echo lang('index_action_th');?></th> -->
        <th class="text-right">NO.</th>
        <th>NAME</th>
        <th>USERNAME</th>
        <th>STATUS</th>
        <th class="text-center">PROSES</th>
	</tr>
    <?php $no = 0; ?>
	<?php foreach ($users as $user):?>
		<tr>
            <td class="text-right"><?php echo ++$no ?></td>
			<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8');?></td>
			<td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8');?></td>
            <!-- <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8');?></td> -->
            <!-- <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8');?></td> -->
			<!-- <td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("edit-group/".$group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')) ;?><br />
                <?php endforeach?>
			</td> -->
			<td><?php echo ($user->active) ? anchor("deactivate/".$user->id, lang('index_active_link')) : anchor("activate/". $user->id, lang('index_inactive_link'));?></td>
			<td class="text-center">
                <?php echo anchor("edit-user/".$user->id, 'Ubah') ;?>
                <?php
                echo ' | ';
                echo anchor(site_url('auth/delete_user/'.$user->id),'Hapus', 'onclick="javascript: return confirm(\'Are You Sure ?\')"');
                echo ' | ';
                echo anchor(site_url('_45_users_menus/update/'.$user->id),'Hak Akses');
                ?>
            </td>
		</tr>
	<?php endforeach;?>
</table>

<!-- <p><?php echo anchor('create-user', lang('index_create_user_link'))?> | <?php echo anchor('create-group', lang('index_create_group_link'))?></p> -->
<p><?php echo anchor('create-user', 'Tambah', 'class="btn btn-primary"')?></p>
