<?php
class Controller_Admin_Pendings extends Controller_Admin
{

	public function action_index()
	{
		$data['pendings'] = Model_Pending::find('all');
		$this->template->title = "Pendings";
		$this->template->content = View::forge('admin/pendings/index', $data);

	}

	public function action_view($id = null)
	{
		$data['pending'] = Model_Pending::find($id);

		$this->template->title = "Pending";
		$this->template->content = View::forge('admin/pendings/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Pending::validate('create');

			if ($val->run())
			{
				$pending = Model_Pending::forge(array(
					'hos_name' => Input::post('hos_name'),
					'hos_address' => Input::post('hos_address'),
					'hos_website' => Input::post('hos_website'),
					'email' => Input::post('email'),
					'hos_contact' => Input::post('hos_contact'),
				));

				if ($pending and $pending->save())
				{
					Session::set_flash('success', e('Added pending #'.$pending->id.'.'));

					Response::redirect('admin/pendings');
				}

				else
				{
					Session::set_flash('error', e('Could not save pending.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Pendings";
		$this->template->content = View::forge('admin/pendings/create');

	}

	public function action_edit($id = null)
	{
		$pending = Model_Pending::find($id);
		$val = Model_Pending::validate('edit');

		if ($val->run())
		{
			$pending->hos_name = Input::post('hos_name');
			$pending->hos_address = Input::post('hos_address');
			$pending->hos_website = Input::post('hos_website');
			$pending->email = Input::post('email');
			$pending->hos_contact = Input::post('hos_contact');

			if ($pending->save())
			{
				Session::set_flash('success', e('Updated pending #' . $id));

				Response::redirect('admin/pendings');
			}

			else
			{
				Session::set_flash('error', e('Could not update pending #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$pending->hos_name = $val->validated('hos_name');
				$pending->hos_address = $val->validated('hos_address');
				$pending->hos_website = $val->validated('hos_website');
				$pending->email = $val->validated('email');
				$pending->hos_contact = $val->validated('hos_contact');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('pending', $pending, false);
		}

		$this->template->title = "Pendings";
		$this->template->content = View::forge('admin/pendings/edit');

	}

	public function action_delete($id = null)
	{
		if ($pending = Model_Pending::find($id))
		{
			$pending->delete();

			Session::set_flash('success', e('Deleted pending #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete pending #'.$id));
		}

		Response::redirect('admin/pendings');

	}

}
