<?php 
	$users_list = $users->result();
?>

<div id='users_list'  class='grid_view'>
<h1>Users</h1>
	<table cellspacing='0' cellpadding='0' width='100%'>
	<tr>
		<th>Title</th>
		<th>Role</th>
		<th></th>
		<th></th>
	</tr>

	<?php foreach ($users_list as $user) : ?>
	<tr>
		<td valign='top'><?=$user->username?></td>
		<td valign='top'><?=$user->role?></td>
		<td valign='top'><?php echo anchor(array('admin','user_edit', $user->id), 'Edit'); ?></td>
		<td valign='top'><?php echo anchor(array('admin','user_remove', $user->id), 'Remove'); ?></td>
	</tr>

	<?php endforeach;?>
	</table>

</div>

<div id='roles_list'  class='grid_view'>
<h1>Roles</h1>
	<table cellspacing='0' cellpadding='0' width='100%'>
	<tr>
		<th>Role</th>
		<th>Access</th>
		<th></th>
		<th></th>
	</tr>

	<?php foreach ($list_access as $role_id => $role) : ?>
	<?php
		$access = array();
		foreach ($role['access'] as $page => $r) {
			$access[] = $page.":".$r;
		}
	?>
	<tr>
		<td valign='top'><?=$role['title']?></td>
		<td valign='top'><?=implode(', ', $access)?></td>
		<td valign='top'><?php echo anchor(array('admin','role_edit', $role_id), 'Edit'); ?></td>
		<td valign='top'><?php echo anchor(array('admin','role_remove', $role_id), 'Remove'); ?></td>
	</tr>

	<?php endforeach;?>
	</table>
	<?php echo anchor(array('admin','role_edit'), 'Add'); ?>

</div>

<div id='reports_list'  class='grid_view'>
<h1>Reports</h1>
	<table cellspacing='0' cellpadding='0' width='100%'>
	<tr>
		<th>Name</th>
		<th>Is Extra</th>
		<th></th>
		<th></th>
	</tr>

	<?php foreach ($list_reports->result() as $report) : ?>
	<?php
	?>
	<tr>
		<td valign='top'><?=$report->title?></td>
		<td valign='top'><?=$report->is_extra?></td>
		<td valign='top'><?php echo anchor(array('admin','report_edit', $report->id), 'Edit'); ?></td>
		<td valign='top'><?php echo anchor(array('admin','report_remove', $report->id), 'Remove'); ?></td>
	</tr>

	<?php endforeach;?>
	</table>
	<?php echo anchor(array('admin','report_edit'), 'Add'); ?>
</div>
