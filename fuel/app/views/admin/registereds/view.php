<?php if($current_user->group!=100): ?>

<h2>Viewing <?php echo $registered->name; ?></h2>

<p>
	<strong>Hospital/Clinic Name:</strong>
	<?php echo $registered->name; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $registered->address; ?></p>
<p>
	<strong>Contact Number:</strong>
	<?php echo $registered->contact; ?></p>
<p>
	<strong>License No.:</strong>
	<?php echo $registered->license; ?></p>
<p>
	<strong>Chief of the Hospital/Clinic:</strong>
	<?php echo $registered->chief; ?></p>

<?php echo Html::anchor('admin/registereds/edit/'.$registered->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/registereds', 'Back'); ?>
<?php endif; ?>