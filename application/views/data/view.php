<?php
	$fields = $rows->list_fields();
	$result = $rows->result();

	$config['base_url'] = site_url("grid/view");
	$config['total_rows'] = $num_rows;
	$config['per_page'] = '20'; 
	$config['num_links'] = 7;
	$this->pagination->initialize($config); 
?>


<div  id='grid_view'  class='grid_view'>
<?php if($can_edit) : ?>
	<div class='noselect' style='float:right;'><?php echo anchor('grid/edit', 'Add new row'); ?></div>
<?php endif; ?>
<div class='noselect'><?php echo $this->pagination->create_links(); ?></div>
<table cellspacing='0' cellpadding='0' >
<?php foreach ($fields as $field) : ?>
	<?php if ($field != 'id' || $can_extra): ?>
		<th><?=$field?></th>
	<?php endif; ?>
<?php endforeach;?>

<?php foreach ($result as $row) : ?>
<tr>
	<?php foreach ($fields as $field) : ?>
	<?php if ($field != 'id' || $can_extra): ?>
	<td valign='top'><?=$row->$field?></td>
	<?php endif; ?>
	<?php endforeach;?>
	<?php if($can_edit) : ?>
	<td valign='top' class='noselect'><?php echo anchor(array('grid','edit', $row->id), 'Edit'); ?></td>
	<?php endif; ?>
</tr>

<?php endforeach;?>
</table>
<?php if($can_edit) : ?>
	<div class='noselect' style='float:right;'><?php echo anchor('grid/edit', 'Add new row'); ?></div>
<?php endif; ?>
<div class='noselect'><?php echo $this->pagination->create_links(); ?></div>
</div>