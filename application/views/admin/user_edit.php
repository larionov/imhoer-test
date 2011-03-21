<?php
	$id = $this->uri->segment(3);
?>


<div id='grid_entry'>
<h1>Edit user</h1>
<?php
	echo form_open('admin/save_user'); 
	echo form_hidden(array('id' => $id));
?>
<p>Username: <?=$user->username?></p>
<p>Role: <?php echo form_dropdown('role_id', $list_roles, $user->role_id); ?></p>


<br />
<?php echo form_submit('submit', 'Submit'); ?>
</form>


</div>