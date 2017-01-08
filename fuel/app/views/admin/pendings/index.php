<h2>Pending Hospitals</h2>
<br>
<?php if ($pendings): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Address</th>
			<th>Email</th>
			<th>Contact Number</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $item): ?>		<tr>
	<?php if ($item->toggle == '0'): ?>
		<td><?php echo $item->username; ?></td>
		<td><?php echo $item->address; ?></td>
		<td><?php echo $item->email; ?></td>
		<td><?php echo $item->contact_number; ?></td>
		<td>
			<?php echo Html::anchor('admin/pendings/edit/'.$item->id, 'Accept',array('class' => 'btn btn-danger btn-transparent')); ?> 
		</td>
	<?php endif ?>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Pendings.</p>

<?php endif; ?>

