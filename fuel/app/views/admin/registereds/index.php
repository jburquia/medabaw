<h2>List of Registered Hospitals and Clinics in Davao City</h2>
<br>
<?php if ($registereds): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name of the Hospital/Clinic</th>
			<th>Address</th>
			<th>Contact Number</th>
			<th>License No.</th>
			<th>Chief of the Hospital/Clinic</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($registereds as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->address; ?></td>
			<td><?php echo $item->contact; ?></td>
			<td><?php echo $item->license; ?></td>
			<td><?php echo $item->chief; ?></td>
			<td>
				<?php echo Html::anchor('admin/registereds/view/'.$item->id, 'View',array('class' => 'btn btn-danger btn-transparent')); ?> 
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Registereds.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/registereds/create', 'Add new Hospitals/Clinics', array('class' => 'btn btn-danger btn-transparent')); ?>

</p>
