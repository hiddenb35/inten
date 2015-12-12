<?php

class Controller_Admin_Course extends Controller_Loggedin
{
	const VIEW_FILE = 'admin/course';

	public function before()
	{
		parent::before();
		$this->template->title = '学科情報';
		$this->template->breadcrumb->add_item('学科情報');
	}

	public function action_index()
	{
		$view = View::forge(self::VIEW_FILE);
		$view->set('course_lists', Model_Course::to_lists(Model_Course::find('all')));
		$view->set('college_lists', Model_College::to_lists(Model_College::find('all')));

		$this->template->content = $view;
	}

	public function action_add()
	{
		if(!Input::is_post())
		{
			throw new HttpNotFoundException;
		}
		$val = Model_Course::validate();
		if($val->run())
		{
			$course = Model_Course::forge();
			$course->code = $val->validated('code');
			$course->name = $val->validated('name');
			$course->year_system = $val->validated('year_system');
			$course->college_id = $val->validated('college_id');
			$course->save();

			Response::redirect('admin/course');
		}

		$view = View::forge(self::VIEW_FILE);
		$view->set('course_lists', Model_Course::to_lists(Model_Course::find('all')));
		$view->set('college_lists', Model_College::to_lists(Model_College::find('all')));
		$view->set('errors', $val->error_message());
		$view->set('inputs', $val->input());

		$this->template->content = $view;
	}

	public function post_edit()
	{
		$val = Model_Course::validate_edit(Input::post('id'));
		$response = array();

		if($val->run())
		{
			$course = Model_Course::find($val->validated('id'));
			$course->code = $val->validated('code');
			$course->name = $val->validated('name');
			$course->year_system = $val->validated('year_system');
			$course->college_id = $val->validated('college_id');
			$course->save();

			$response['success'] = Model_Course::to_list($course);
		}
		else
		{
			$response['errors'] = $val->error_message();
		}

		return $this->response($response);
	}

}