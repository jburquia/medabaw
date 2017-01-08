
<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($doctor) ? $doctor->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Field', 'field', array('class'=>'control-label')); ?>

				<?php echo Form::input('field', Input::post('field', isset($doctor) ? $doctor->field : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Field')); ?>

		</div>

	<div class="form-group">
			<?php echo Form::label('Specialization', 'specialization', array('class'=>'control-label')); ?>

				<?php echo Form::input('specialization', Input::post('specialization', isset($doctor) ? $doctor->specialization : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'specialization')); ?>

		</div>
		 
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>	
		</div>
	</fieldset>
<?php echo Form::close(); ?>