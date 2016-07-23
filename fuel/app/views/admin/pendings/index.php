<h2>Listing Pendings</h2>
<br>
<?php if ($pendings): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Hos name</th>
			<th>Hos address</th>
			<th>Hos website</th>
			<th>Email</th>
			<th>Hos contact</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($pendings as $item): ?>		<tr>

			<td><?php echo $item->hos_name; ?></td>
			<td><?php echo $item->hos_address; ?></td>
			<td><?php echo $item->hos_website; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->hos_contact; ?></td>
			<td>
				<?php echo Html::anchor('admin/pendings/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/pendings/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/pendings/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Pendings.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/pendings/create', 'Add new Pending', array('class' => 'btn btn-danger btn-transparent')); ?>

</p>
