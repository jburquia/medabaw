<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<div class="form-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

				<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>
			<?php 
				if (isset($user->password)) {
					$user->password = null;
				}
			 ?>
				<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'col-md-4 form-control', 'id' => 'password', 'type'=> 'password', 'placeholder'=>'Password')); ?>

		</div>

		
		<div class="form-group floating-label">
	
			<?php echo Form::label('Confirm Password', 'confirm_password', array('class'=>'control-label')); ?>
			 <!-- Form::input('name', 'value', array('style' => 'border: 2px;')); -->
				<?php echo Form::input('confirm_password', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Confirm Password', 'type' => 'password', 'id'=>'confirm_password')); ?>
		</div>
		<?php $temp = "text";
		$hos = "Hospital Name"; 
		$lis = "License"; 
		$chis = "Chief of the hospital"; ?>

			<?php if ($user->role_id == 2) {
				$temp = "hidden";
				$hos = "";
				$lis = ""; 
				$chis = "";
			} ?>
		<div class="form-group">
			<?php echo Form::label($hos, 'hospital_name', array('class'=>'control-label')); ?>
				
				<?php echo Form::input('hospital_name', Input::post('hospital_name', isset($user) ? $user->hospital_name : 'N/A'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Address', 'type' => $temp)); ?>

		</div>
 
        <div class="form-group">
            <?php echo Form::label($lis, 'license', array('class'=>'control-label')); ?>

                <?php echo Form::input('license', Input::post('license', isset($user) ? $user->license : '0'), array('class' => 'col-md-4 form-control', 'placeholder'=>'License Number', 'type' => $temp)); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label($chis, 'chief of the hospital', array('class'=>'control-label')); ?>

                <?php echo Form::input('chief', Input::post('chief', isset($user) ? $user->chief : 'N/A'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Chief of the Hospital', 'type' => $temp)); ?>

        </div>

		<div class="form-group">
			<?php echo Form::label('', 'group', array('class'=>'control-label')); ?>

				<?php echo Form::input('group', Input::post('group', isset($user) ? $user->group : '100'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Group', 'type'=>'hidden')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Contact number', 'contact_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('contact_number', Input::post('contact_number', isset($user) ? $user->contact_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Contact number')); ?>

		</div>
		
		<div class="form-group">
			<?php echo Form::label('Address', 'address', array('class'=>'control-label')); ?>

				<?php echo Form::input('address', Input::post('address', isset($user) ? $user->address : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Address')); ?>

		</div>

		 <div class="form-group">
            <?php echo Form::label('Website', 'website', array('class'=>'control-label')); ?>

                <?php echo Form::input('website', Input::post('website', isset($user) ? $user->website : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Website')); ?>

        </div>

		<div class="form-group">
			<?php echo Form::label('', 'pend', array('class'=>'control-label')); ?>

				<?php echo Form::input('pend', Input::post('pend', isset($user) ? $user->pend : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pend','type'=>'hidden')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('', '', array('class'=>'control-label')); ?>

				<?php echo Form::input('role_id', Input::post('role_id', isset($user) ? $user->role_id : '1'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Role', 'type'=>'hidden' )); ?>
		</div>
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>

