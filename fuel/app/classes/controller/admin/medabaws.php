<?php
class Controller_Admin_Medabaws extends Controller_Admin
{

	public function action_index()
	{
		$data['pendings'] = Model_Pending::find('all');
		$data['users'] = Model_User::find('all');
		$this->template->title = ""; 
		$this->template->content = View::forge('admin/medabaws/index', $data);

	}

	public function action_view($id = null)
	{
		$data['roles'] = Model_User::find($id);
		$data['users'] = Model_User::find('all');
		$this->template->title = "Medabaw";
		$this->template->content = View::forge('admin/medabaws/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

					if ($val->run())
			{
				$medabaw = Model_User::forge(array(
					'username' => Input::post('username'),
					'password' => Auth::instance()->hash_password(Input::post('password')),
					'hospital_name' => Input::post('hospital_name'),
					'license' => Input::post('license'),
					'chief' => Input::post('chief'),
					'group' => Input::post('group'),
					'email' => Input::post('email'),
					'contact_number' => Input::post('contact_number'),
					'address' => Input::post('address'),
					'website' => Input::post('website'),
					'role_id' => Input::post('role_id'),
				));

				if ($medabaw and $medabaw->save())
				{
					Session::set_flash('success', e('Added medabaw #'.$medabaw->id.'.'));

					Response::redirect('admin/medabaws');
				}

				else
				{
					Session::set_flash('error', e('Could not save medabaw.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Medabaws";
		$this->template->content = View::forge('admin/medabaws/create');

	}

	public function action_edit($id = null)
	{
		$medabaw = Model_User::find($id);
		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$medabaw->username = Input::post('username');
			$medabaw->password = Auth::instance()->hash_password(Input::post('password'));
			$medabaw->hospital_name = Input::post('hospital_name');
			$medabaw->license = Input::post('license');
			$medabaw->chief = Input::post('chief');
			$medabaw->group = Input::post('group');
			$medabaw->email = Input::post('email');
			$medabaw->contact_number = Input::post('contact_number');
			$medabaw->address = Input::post('address');
			$medabaw->website = Input::post('website');
			$medabaw->role_id = Input::post('role_id');
			if ($medabaw->save())
			{
				Session::set_flash('success', e('Updated medabaw #' . $id));

				Response::redirect('admin/medabaws');
			}

			else
			{
				Session::set_flash('error', e('Could not update medabaw #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$medabaw->username = $val->validated('username');
				$medabaw->password = $val->validated('password');
				$medabaw->hospital_name = $val->validated('hospital_name');
				$medabaw->license = $val->validated('license');
				$medabaw->chief = $val->validated('chief');
				$medabaw->group = $val->validated('group');
				$medabaw->email = $val->validated('email');
				$medabaw->contact_number = $val->validated('contact_number');
				$medabaw->address = $val->validated('address');
				$medabaw->website = $val->validated('website');
				$medabaw->role_id = Input::post('role_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('medabaw', $medabaw, false);
		}

		$this->template->title = "Medabaws";
		$this->template->content = View::forge('admin/medabaws/edit');

	}

	public function action_delete($id = null)
	{
		if ($medabaw = Model_User::find($id))
		{
			$medabaw->delete();

			Session::set_flash('success', e('Deleted medabaw #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete medabaw #'.$id));
		}

		Response::redirect('admin/medabaws');

	}

}
