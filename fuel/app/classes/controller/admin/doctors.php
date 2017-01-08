<?php
class Controller_Admin_Doctors extends Controller_Admin
{

	public function action_index()
	{

		$users ='';
		$search = "";
		if (Input::method() == 'POST')
		{
			$search = Input::post('search');
		}

		$data['doctors'] = Model_Doctor::find('all', [
			'where' => [
				['name', 'like', "%$search%"]
			]
		]);
		$this->template->title = "";
		$this->template->content = View::forge('admin/doctors/index', $data);

	}
// view doctor
	public function action_view($id = null)
	{
		$data['doctor'] = Model_Doctor::find($id);

		$this->template->title = "";
		$this->template->content = View::forge('admin/doctors/view', $data);

	}
// create doctor
	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Doctor::validate('create');
			
			if ($val->run())
			{
				$file_img = null;
				// BEGIN UPLOAD IMAGE
				// Custom configuration for this upload
				$config = array(
				    'path' =>'assets/img',
				    'randomize' => true,
				    'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
				);

				// process the uploaded files in $_FILES
				Upload::process($config);

				// if there are any valid files
				if (Upload::is_valid())
				{
				    // save them according to the config
				    Upload::save();

				    // call a model method to update the database
				   
				    $file = Upload::get_files();
				    foreach ($file as $savefile) {
				    	
				    }
				    $file_img = $savefile['saved_as'];
				}

				// and process any errors
				foreach (Upload::get_errors() as $file)
				{
				    // $file is an array with all file information,
				    // $file['errors'] contains an array of all error occurred
				    // each array element is an an array containing 'error' and 'message'
				}
				// END UPLOAD IMAGE

				$doctor = Model_Doctor::forge(array(
					'hospital_id' => Auth::get('id'),
					'name' => Input::post('name'),
					'field' => Input::post('field'),
					'specialization' => Input::post('specialization'),
				));

				if ($doctor and $doctor->save())
				{
					Session::set_flash('success', e('Added doctor #'.$doctor->id.'.'));

					Response::redirect('admin/doctors');
				}

				else
				{
					Session::set_flash('error', e('Could not save doctor.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "";
		$this->template->content = View::forge('admin/doctors/create');

	}

// edit doctor
	public function action_edit($id = null)
	{
		$doctor = Model_Doctor::find($id);
		$val = Model_Doctor::validate('edit');

		if ($val->run())
		{
			$doctor->name = Input::post('name');
			$doctor->field = Input::post('field');
			$doctor->specialization = Input::post('specialization');

			if ($doctor->save())
			{
				Session::set_flash('success', e('Updated doctor #' . $id));

				Response::redirect('admin/doctors');
			}

			else
			{
				Session::set_flash('error', e('Could not update doctor #' . $id));
			}
		}
		else
		{
			if (Input::method() == 'POST')
			{

			$doctor->name = Input::post('name');
			$doctor->field = Input::post('field');
			$doctor->specialization = Input::post('specialization');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('doctor', $doctor, false);
		}

		$this->template->title = "";
		$this->template->content = View::forge('admin/doctors/edit');

	}

// delete doctor
	public function action_delete($id = null)
	{
		if ($doctor = Model_Doctor::find($id))
		{
			$doctor->delete();

			Session::set_flash('success', e('Deleted doctor #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete doctor #'.$id));
		}

		Response::redirect('admin/doctors');

	}

}
