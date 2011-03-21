<?php
	foreach ($list->result() as $report_info) {
		$list_reports[$report_info->id] = $report_info->title;
	}
	echo form_dropdown('report_id', $list_reports, $current_report_id);
?>
<script>
var base_url = "<?=site_url('reports/view')?>";
$('select[name="report_id"]').change(function(){
	document.location.href = [base_url, '/', $(this).val()].join('');
});
<?php if (!$current_report) : ?>
$('select[name="report_id"]').change();
<?php endif; ?>

</script>

<div  id='grid_view' class='grid_view'>
<?php 
if ($current_report) :
	$fields = $current_report->list_fields();
	$rows = $current_report->result();
?>
	<table cellspacing='0' cellpadding='0' >
	<?php foreach ($fields as $field) : ?>
		<?php if ($field != 'id' || $can_extra): ?>
			<th><?=$field?></th>
		<?php endif; ?>
	<?php endforeach;?>

	<?php foreach ($rows as $row) : ?>
	<tr>
		<?php foreach ($fields as $field) : ?>
		<?php if ($field != 'id' || $can_extra): ?>
		<td valign='top'><?=$row->$field?></td>
		<?php endif; ?>
		<?php endforeach;?>

	</tr>

	<?php endforeach;?>
	</table>

<?php endif; ?>
</div>