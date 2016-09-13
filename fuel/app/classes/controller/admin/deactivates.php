<?php
class Controller_Admin_Deactivates extends Controller_Admin
{

	public function action_index()
	{
		$data['deactivates'] = Model_Deactivate::find('all');
		$data['users'] = Model_User::find('all');
		$this->template->title = "";
		$this->template->content = View::forge('admin/deactivates/index', $data);

	}

	public function action_view($id = null)
	{
		$data['deactivate'] = Model_Deactivate::find($id);
		$this->template->title = "";
		$this->template->content = View::forge('admin/deactivates/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Deactivate::validate('create');

			if ($val->run())
			{
				$deactivate = Model_Deactivate::forge(array(
					'hos_name' => Input::post('hos_name'),
					'hos_address' => Input::post('hos_address'),
					'hos_website' => Input::post('hos_website'),
					'email' => Input::post('email'),
					'hos_contact' => Input::post('hos_contact'),
				));

				if ($deactivate and $deactivate->save())
				{
					Session::set_flash('success', e('Added deactivate #'.$deactivate->id.'.'));

					Response::redirect('admin/deactivates');
				}

				else
				{
					Session::set_flash('error', e('Could not save deactivate.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "";
		$this->template->content = View::forge('admin/deactivates/create');

	}

	public function action_edit($id = null)
	{
		$user = Model_User::find($id);
			$user->pend = ' not activate';
			if ($user->save())
			{
				Session::set_flash('success', e('User Deactivated '));

				Response::redirect('admin/deactivates');
			}
	}

	public function action_delete($id = null)
	{
		if ($deactivate = Model_Deactivate::find($id))
		{
			$deactivate->delete();

			Session::set_flash('success', e('Deleted deactivate #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete deactivate #'.$id));
		}

		Response::redirect('admin/deactivates');

	}

}
