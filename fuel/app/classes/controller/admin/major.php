<?php

class Controller_Admin_Major extends Controller_Loggedin
{
	const VIEW_FILE = 'admin/major';

	public function before()
	{
		parent::before();
		$this->template->title = '専攻情報';
	}

	public function action_index()
	{
		$view = View::forge(self::VIEW_FILE);
		$view->set('major_lists',Model_Major::to_lists(Model_Major::find('all')));
		$view->set('course_lists',Model_Course::to_lists(Model_Course::find('all')));

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

		$view = View::forge(self::VIEW_FILE);
		$view->set('major_lists', Model_Major::to_lists(Model_Major::find('all')));
		$view->set('course_lists',Model_Course::to_lists(Model_Course::find('all')));
		$view->set('errors', $val->error_message());
		$view->set('inputs', $val->input());

		$this->template->content = $view;
	}

	public function post_edit()
	{
		$val = Model_Major::validate_edit(Input::post('id'));
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