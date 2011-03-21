<?php
	unset($grid_fields['id']);

	$id = $this->uri->segment(3);
	$new = ($id === FALSE);
?>


<div id='grid_entry'>
<?php if ($new) : ?>
<h1>New report</h1>
<?php else: ?>
<h1>Edit report</h1>
<?php endif;?>
<?php echo validation_errors(); ?>
<?php
	echo form_open('grid/save_report'); 
	if (!$new) {
		echo form_hidden(array('id' => $id));
		$title = $report_data->title;
		$query = $report_data->query;
		$is_extra = $report_data->is_extra;
	} else {
		$title = set_value('title', '');
		$query = set_value('query', '');
		$is_extra = set_value('is_extra', '');
	}
?>
<p><label>Title:</label> <?php echo form_input(array('name' => 'title', 'value' => $title)); ?></p>
<p><label>Query:</label> <?php echo form_textarea(array('name' => 'title', 'value' => $query)); ?></p>
<p><label>Is Extra:</label> <?php echo form_textarea(array('name' => 'title', 'value' => $is_extra)); ?></p>
	<?php 
	if (!$new) {
		$value = $row->$field_name;
	} else {
		
		
	}

	if ($field_info['type'] == 'blob') {
		echo form_textarea(array('name' => $field_name, 'value' => $value));
	} else {
		echo form_input(array('name' => $field_name, 'value' => $value));
	}
	?>
</p>
<br />
<?php echo form_submit('submit', 'Submit'); ?>
</form>


</div>