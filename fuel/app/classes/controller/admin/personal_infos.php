<?php
class Controller_Admin_Personal_infos extends Controller_Admin
{

	public function action_index()
	{
		$data['personal_infos'] = Model_Personal_info::find('all');
		$this->template->title = "Personal_infos";
		$this->template->content = View::forge('admin/personal_infos/index', $data);

	}   

	public function action_view($id = null)
	{
		$data['personal_info'] = Model_Personal_info::find($id);

		$this->template->title = "Personal_info";
		$this->template->content = View::forge('admin/personal_infos/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Personal_info::validate('create');

			if ($val->run())
			{
				$personal_info = Model_Personal_info::forge(array(
					'name' => Input::post('name'),
					'address' => Input::post('address'),
					'contact' => Input::post('contact'),
					'license' => Input::post('license'),
					'chief' => Input::post('chief'),
				));

				if ($personal_info and $personal_info->save())
				{
					Session::set_flash('success', e('Added personal_info #'.$personal_info->id.'.'));

					Response::redirect('admin/personal_infos');
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

		$this->template->title = "Personal_infos";
		$this->template->content = View::forge('admin/personal_infos/create');

	}

	public function action_edit($id = null)
	{
		$personal_info = Model_Personal_info::find($id);
		$val = Model_Personal_info::validate('edit');

		if ($val->run())
		{
			$personal_info->name = Input::post('name');
			$personal_info->address = Input::post('address');
			$personal_info->contact = Input::post('contact');
			$personal_info->license = Input::post('license');
			$personal_info->chief = Input::post('chief');

			if ($personal_info->save())
			{
				Session::set_flash('success', e('Updated personal_info #' . $id));

				Response::redirect('admin/personal_infos');
			}

			else
			{
				Session::set_flash('error', e('Could not update personal_info #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$personal_info->name = $val->validated('name');
				$personal_info->address = $val->validated('address');
				$personal_info->contact = $val->validated('contact');
				$personal_info->license = $val->validated('license');
				$personal_info->chief = $val->validated('chief');

				Session::set_flash('error', $val->error());
			}

		$this->template->set_global('personal_info', $personal_info, false);
		$this->template->title = "Personal_infos";
		$this->template->content = View::forge('admin/personal_infos/edit');

	}

	public function action_delete($id = null)
	{
		if ($personal_info = Model_Personal_info::find($id))
		{
			$personal_info->delete();

			Session::set_flash('success', e('Deleted personal_info #'.$id));
		
		else
		{
			Session::set_flash('error', e('Could not delete personal_info #'.$id));
		}

		Response::redirect('admin/personal_infos');

	}

}
