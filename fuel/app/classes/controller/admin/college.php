<?php

class Controller_Admin_College extends Controller_Loggedin
{
	public function action_index()
	{
		$this->template->title = 'カレッジ一覧';
		$this->template->content = View::forge('college/college_list');
		$this->template->content->set('college_lists', Model_College::to_lists(Model_College::find('all')));
	}

	public function action_add()
	{
		if(Input::method() !== 'POST')
		{
			throw new HttpNotFoundException;
		}

		$val = Model_College::validate();
		if($val->run())
		{
			$college = Model_College::forge();
			$college->name = $val->validated('name');
			$college->save();

			Response::redirect('admin/college');
		}

		$this->template->title = 'エラー';
		$this->template->content = View::forge('college/college_list');
		$this->template->content->set('college_lists', Model_College::to_lists(Model_College::find('all')));
		$this->template->content->set('errors', $val->error_message());
		$this->template->content->set('inputs', $val->input());

	}

	public function post_edit()
	{
		$val = Model_College::validate();
		$val->add_field('id', 'カレッジID', 'trim|required')->add_rule('exist_id', 'college');
		$response = array();

		if($val->run())
		{
			$college = Model_College::find($val->validated('id'));
			$college->name = $val->validated('name');
			$college->save();

			$response['success'] = Model_College::to_list($college);
		}
		else
		{
			$response['errors'] = $val->error_message();
		}

		return $this->response($response);
	}

}