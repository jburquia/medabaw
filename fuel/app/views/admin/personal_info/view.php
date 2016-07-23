<h2>Viewing #<?php echo $user->id; ?></h2>

<p>
	<strong>Username:</strong>
	<?php echo $user->username; ?></p>
<p>
	<strong>Group:</strong>
	<?php echo $user->group; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $user->email; ?></p>
<p>
	<strong>Contact number:</strong>
	<?php echo $user->contact_number; ?></p>
<p>
	<strong>hospital_name:</strong>
	<?php echo $user->hospital_name; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $user->address; ?></p>

<p>
	<strong>url:</strong>
	<?php echo $user->url; ?></p>

<?php echo Html::anchor('admin/users/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/users', 'Back'); ?>