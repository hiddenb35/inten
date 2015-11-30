<?php

class Controller_Admin_College extends Controller_Loggedin
{
	protected $view = 'admin/college';

	public function action_index()
	{
		$view = View::forge($this->view);
		$view->set('college_lists', Model_College::to_lists(Model_College::find('all')));

		$this->template->title = 'カレッジ一覧';
		$this->template->content = $view;
	}

	public function action_add()
	{
		if(!Input::is_post())
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

		$view = View::forge($this->view);
		$view->set('college_lists', Model_College::to_lists(Model_College::find('all')));
		$view->set('errors', $val->error_message());
		$view->set('inputs', $val->input());

		$this->template->title = 'エラー';
		$this->template->content = $view;

	}

	public function post_edit()
	{
		$val = Model_College::validate(Input::post('id'));
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