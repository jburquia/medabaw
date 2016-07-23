<h2> DOH Staffs </h2>
<br>
<?php if ($personal_info): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>DOH Staff Name</th>
			<th>Address</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($personal_info as $item): ?>		<tr>

			<td><?php echo $item->username; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->contact_number; ?></td>
			<td><?php echo $item->address; ?></td>
			<td><?php echo $item->password;?></td>
			<td><?php echo $item->group;?></td>
			<td><?php echo Html::anchor('admin/personal_info/view/'.$item->id, 'View'); ?> </td>
			<td><?php echo Html::anchor('admin/personal_info/edit/'.$item->id, 'Edit'); ?> </td>
			<td><?php echo Html::anchor('admin/personal_info/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No personal_info.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/personal_infos/create', 'Add new Staff', array('class' => 'btn btn-danger btn-transparent')); ?>

</p>
