<?php
	unset($grid_fields['id']);

	$id = $this->uri->segment(3);
	$new = ($id === FALSE);
?>


<div id='grid_entry'>
<?php if ($new) : ?>
<h1>New row</h1>
<?php else: ?>
<h1>Edit row</h1>
<?php endif;?>
<?php echo validation_errors(); ?>
<?php
	echo form_open('grid/save_row'); 
	if (!$new) {
		echo form_hidden(array('id' => $id));
	}
?>
<?php foreach ($grid_fields as $field_name => $field_info) : ?>

<p><label><?=$field_name?>:</label>
	<?php 
	if (!$new) {
		$value = $row->$field_name;
	} else {
		
		$value = set_value($field_name, '');
	}

	if ($field_info['type'] == 'blob') {
		echo form_textarea(array('name' => $field_name, 'value' => $value));
	} else {
		echo form_input(array('name' => $field_name, 'value' => $value));
	}
	?>
</p>
<?php endforeach;?>
<br />
<?php echo form_submit('submit', 'Submit'); ?>
</form>


</div>