<?php

class Controller_Admin_Course extends Controller_Loggedin
{
	protected $view = 'admin/course';

	public function action_index()
	{
		$this->template->title = '学科一覧';
		$this->template->content = View::forge($this->view);
		$this->template->content->set('course_lists', Model_Course::to_lists(Model_Course::find('all')));
		$this->template->content->set('college_lists', Model_College::to_lists(Model_College::find('all')));
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

		$this->template->title = 'エラー';
		$this->template->content = View::forge($this->view);
		$this->template->content->set('course_lists', Model_Course::to_lists(Model_Course::find('all')));
		$this->template->content->set('college_lists', Model_College::to_lists(Model_College::find('all')));
		$this->template->content->set('errors', $val->error_message());
		$this->template->content->set('inputs', $val->input());
	}

	public function post_edit()
	{
		$val = Model_Course::validate(Input::post('id'));
		$val->add_field('id', '学科ID', 'trim|required')->add_rule('exist_id', 'course');
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