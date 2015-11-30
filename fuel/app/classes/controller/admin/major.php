<?php

class Controller_Admin_Major extends Controller_Loggedin
{
	protected $view = 'admin/major';

	public function action_index()
	{
		$view = View::forge($this->view);
		$view->set('major_lists',Model_Major::to_lists(Model_Major::find('all')));
		$view->set('course_lists',Model_Course::to_lists(Model_Course::find('all')));

		$this->template->title = '専攻一覧';
		$this->template->content = $view;
	}

	public function action_add()
	{
		if(!Input::is_post())
		{
			throw new HttpNotFoundException;
		}

		$val = Model_Major::validate();
		if($val->run())
		{
			$major = Model_Major::forge();
			$major->name = $val->validated('name');
			$major->course_id = $val->validated('course_id');
			$major->save();

			Response::redirect('admin/major');
		}

		$view = View::forge($this->view);
		$view->set('major_lists', Model_Major::to_lists(Model_Major::find('all')));
		$view->set('course_lists',Model_Course::to_lists(Model_Course::find('all')));
		$view->set('errors', $val->error_message());
		$view->set('inputs', $val->input());

		$this->template->title = 'エラー';
		$this->template->content = $view;
	}

	public function post_edit()
	{
		$val = Model_Major::validate(Input::post('id'));
		$val->add_field('id', '専攻ID', 'trim|required')->add_rule('exist_id', 'major');
		$response = array();

		if($val->run())
		{
			$major = Model_Major::find($val->validated('id'));
			$major->name = $val->validated('name');
			$major->course_id = $val->validated('course_id');
			$major->save();

			$response['success'] = Model_Major::to_list($major);
		}
		else
		{
			$response['errors'] = $val->error_message();
		}

		return $this->response($response);
	}

}