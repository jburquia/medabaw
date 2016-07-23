<?php
class Controller_Admin_Users extends Controller_Admin
{

	public function action_index()
	{
		$data['users'] = Model_User::find('all');
		$data['roles'] = Model_Role::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/index', $data);

	}

	public function action_view($id = null)
	{
		$data['user'] = Model_User::find($id);

		$this->template->title = "User";
		$this->template->content = View::forge('admin/users/view', $data);

	}







//START CREATE HOSPITAL
public function action_create_hospital()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
				$user = Model_User::forge(array(
					'username' => Input::post('username'),
					'password' => Auth::instance()->hash_password(Input::post('password')),
					'group' => Input::post('group'),
					'email' => Input::post('email'),
					'contact_number' => Input::post('contact_number'),
					'address' => Input::post('address'),
					'website' => Input::post('website'),
					'role_id' => Input::post('role_id'),
				));
				$user->hospital[] = Model_Hospital::forge(array(
					'hospital_name' => Input::post('hospital_name'),
					'website' => Input::post('website'),
					'updated_at' => 0,
				));	
				if ($user->save())
				{
					Session::set_flash('success', e('Added user #'.$user->id.'.'));

					Response::redirect('admin/users');
				}

				else
				{
					Session::set_flash('error', e('Could not save user.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/create_hospital');

	}

//END CREATE HOSPITAL




















	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
				$user = Model_User::forge(array(
					'username' => Input::post('username'),
					'password' => Auth::instance()->hash_password(Input::post('password')),
					'group' => Input::post('group'),
					'email' => Input::post('email'),
					'contact_number' => Input::post('contact_number'),
					'hospital_name' => Input::post('hospital_name'),
					'address' => Input::post('address'),
					'website' => Input::post('website'),
					
				));

				if ($user and $user->save())
				{
					Session::set_flash('success', e('Added user #'.$user->id.'.'));

					Response::redirect('admin/users');
				}

				else
				{
					Session::set_flash('error', e('Could not save user.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/create');

	}

	public function action_edit($id = null)
	{
		$user = Model_User::find($id);
		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->username = Input::post('username');
			$user->password = Auth::instance()->hash_password(Input::post('password'));
			$user->group = Input::post('group');
			$user->email = Input::post('email');
			$user->contact_number = Input::post('contact_number');
			$user->hospital_name = Input::post('hospital_name');
			$user->address = Input::post('address');
			$user->website = Input::post('website');
			

			if ($user->save())
			{
				Session::set_flash('success', e('Updated user #' . $id));

				Response::redirect('admin/users');
			}

			else
			{
				Session::set_flash('error', e('Could not update user #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->username = $val->validated('username');
				$user->password = $val->validated('password');
				$user->group = $val->validated('group');
				$user->email = $val->validated('email');
				$user->contact_number = $val->validated('contact_number');
				$user->hospital_name = $val->validated('hospital_name');
				$user->address = $val->validated('address');
				$user->website = $val->validated('website');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/edit');

	}

	public function action_delete($id = null)
	{
		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', e('Deleted user #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete user #'.$id));
		}

		Response::redirect('admin/users');

	}

}
