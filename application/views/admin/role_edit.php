<?php
	$id = $this->uri->segment(3);
	$new = ($id === FALSE);
	$access = array(
		'none' => "None",
		'view' => "View",
		'edit' => "Edit",
		'extra' => "Extra" 
	);
?>

<div id='grid_entry'>
<h1><?php if($new) {?>New role<?php } else { ?>Edit role<?php } ?></h1>
<?php
	echo form_open('admin/save_role'); 
	if (!$new) {
		echo form_hidden(array('id' => $id));
		$name = $list_access[$id]['title'];
		$grid_access = isset($list_access[$id]['access']['grid'])?$list_access[$id]['access']['grid']:'none';
		$reports_access = isset($list_access[$id]['access']['reports'])?$list_access[$id]['access']['reports']:'none';
		$admin_access = isset($list_access[$id]['access']['admin'])?$list_access[$id]['access']['admin']:'none';
	} else {
		$name = set_value('name', '');
		$grid_access = set_value('grid_access', '');
		$reports_access = set_value('reports_access', '');
		$admin_access = set_value('admin_access', '');
	}

?>
<?php echo validation_errors(); ?>
<p><label style='display: inline-block;width: 70px;'>Name:</label> <?php echo form_input(array('name' => 'name', 'value' => $name)); ?> </p>
<p><label style='display: inline-block;width: 70px;'>Grid:</label> <?php echo form_dropdown('grid_access', $access, $grid_access ); ?></p>
<p><label style='display: inline-block;width: 70px;'>Reports:</label> <?php echo form_dropdown('reports_access', $access, $reports_access); ?></p>
<p><label style='display: inline-block;width: 70px;'>Admin:</label> <?php echo form_dropdown('admin_access', $access, $admin_access); ?></p>
<br />
<?php echo form_submit('submit', 'Submit'); ?>
</form>


</div>