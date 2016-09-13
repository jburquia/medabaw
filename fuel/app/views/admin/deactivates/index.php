<h2>Listing Pendings</h2>
<br>
<?php if ($deactivates): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Hospital Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Contact Number</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $item): ?>		<tr>
	<?php if ($item->pend == 'not activate'): ?>
		<td><?php echo $item->hospital_name; ?></td>
		<td><?php echo $item->address; ?></td>
		<td><?php echo $item->email; ?></td>
		<td><?php echo $item->contact_number; ?></td>
		<td>
			<?php echo Html::anchor('admin/deactivates/edit/'.$item->id, 'Accept',array('class' => 'btn btn-danger btn-transparent')); ?> 
		</td>
	<?php endif ?>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No .</p>

<?php endif; ?>

