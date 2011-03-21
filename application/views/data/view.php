<?php
	$fields = $rows->list_fields();
	$result = $rows->result();

	$config['base_url'] = site_url("grid/view");
	$config['total_rows'] = $num_rows;
	$config['per_page'] = '20'; 

	$this->pagination->initialize($config); 
?>


<div  id='grid_view'>
<?php echo anchor('grid/edit', 'Add new row'); ?>
<div><?php echo $this->pagination->create_links(); ?></div>
<table cellspacing='0' cellpadding='0' >
<?php foreach ($fields as $field) : ?>
<th><?=$field?></th>
<?php endforeach;?>

<?php foreach ($result as $row) : ?>
<tr>
	<?php foreach ($fields as $field) : ?>
	<td valign='top'><?=$row->$field?></td>
	<?php endforeach;?>

	<td valign='top'><?php echo anchor(array('grid','edit', $row->id), 'Edit'); ?></td>
</tr>

<?php endforeach;?>
</table>
<div><?php echo $this->pagination->create_links(); ?></div>
</div>