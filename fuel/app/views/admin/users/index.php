


<br>
<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Role</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $item): ?>		<tr>

			<td><?php echo $item->username; ?></td>
			<?php foreach ($roles as $role): ?>
				<?php if ($role->id == $item->role_id): ?>
					<td><?php echo $role->role_description ?></td>
				<?php endif ?>
			<?php endforeach ?>
			<td><?php echo Html::anchor('admin/users/view/'.$item->id, 'View'); ?> </td>
			<td><?php echo Html::anchor('admin/users/edit/'.$item->id, 'Edit'); ?> </td>
			<td><?php echo Html::anchor('admin/users/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/users/create', 'Add User', array('class' =>' btn btn-danger btn-transparent')); ?>

</p>
