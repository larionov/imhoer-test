<?php
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
	echo form_open('admin/save_report'); 
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
<p><label>Query:</label> <?php echo form_textarea(array('name' => 'query', 'value' => $query)); ?></p>
<p><label>Is Extra:</label> <?php echo form_checkbox(array('name' => 'is_extra', 'value' => $is_extra, 'checked' => $is_extra)); ?></p>

<br />
<?php echo form_submit('submit', 'Submit'); ?>
</form>


</div>