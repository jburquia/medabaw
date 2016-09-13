<?php
class Controller_Admin_Registereds extends Controller_Admin
{

	public function action_index()
	{
		$data['registereds'] = Model_Registered::find('all');
		$this->template->title = "";
		$this->template->content = View::forge('admin/registereds/index', $data);

	}

	public function action_view($id = null)
	{
		$data['registered'] = Model_Registered::find($id);
		$this->template->title = "Registered";
		$this->template->content = View::forge('admin/registereds/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Registered::validate('create');

			if ($val->run())
			{
				$registered = Model_Registered::forge(array(
					'name' => Input::post('name'),
					'address' => Input::post('address'),
					'contact' => Input::post('contact'),
					'license' => Input::post('license'),
					'chief' => Input::post('chief'),
				));

				if ($registered and $registered->save())
				{
					Session::set_flash('success', e('Added registered #'.$registered->id.'.'));

					Response::redirect('admin/registereds');
				}

				else
				{
					Session::set_flash('error', e('Could not save registered.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Registereds";
		$this->template->content = View::forge('admin/registereds/create');

	}

	public function action_edit($id = null)
	{
		$registered = Model_Registered::find($id);
		$val = Model_Registered::validate('edit');

		if ($val->run())
		{
			$registered->name = Input::post('name');
			$registered->address = Input::post('address');
			$registered->contact = Input::post('contact');
			$registered->license = Input::post('license');
			$registered->chief = Input::post('chief');

			if ($registered->save())
			{
				Session::set_flash('success', e('Updated registered #' . $id));

				Response::redirect('admin/registereds');
			}

			else
			{
				Session::set_flash('error', e('Could not update registered #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$registered->name = $val->validated('name');
				$registered->address = $val->validated('address');
				$registered->contact = $val->validated('contact');
				$registered->license = $val->validated('license');
				$registered->chief = $val->validated('chief');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('registered', $registered, false);
		}

		$this->template->title = "Registereds";
		$this->template->content = View::forge('admin/registereds/edit');

	}

	public function action_delete($id = null)
	{
		if ($registered = Model_Registered::find($id))
		{
			$registered->delete();

			Session::set_flash('success', e('Deleted registered #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete registered #'.$id));
		}

		Response::redirect('admin/registereds');

	}

}
