<br>
<?php if ($infos): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Role</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($infos as $item): ?>		<tr>

			<td><?php echo $item->username; ?></td>
			<?php foreach ($roles as $role): ?>
				<?php if ($role->id == $item->role_id): ?>
					<td><?php echo $role->role_description ?></td>
				<?php endif ?>
			<?php endforeach ?>
			<td><?php echo Html::anchor('infos/view/'.$item->id, 'View'); ?> </td>
			<td><?php echo Html::anchor('infos/edit/'.$item->id, 'Edit'); ?> </td>
			<td><?php echo Html::anchor('infos/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
	
<?php else: ?>
<p>No Infos.
</p>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Contact number</th>
			<th>Address</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		
	<tr>
		<?php if ($user->id == $current_user->id): ?>
			<td><?php echo $user->username?></td>
			<td><?php echo $user->email?></td>
			<td><?php echo $user->contact_number?></td>
			<td><?php echo $user->address?></td>
			<td><?php echo Html::anchor('admin/users/edit/'.$user->id, 'Update', array('class' => 'btn btn-danger btn-transparent')); ?> </td>
		<?php endif ?>
	</tr>
<?php endforeach; ?>	</tbody>
</table>
<?php endif; ?>
