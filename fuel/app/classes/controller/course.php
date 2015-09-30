<?php

class Controller_Course extends Controller_Loggedin
{
	public function action_add()
	{
		if(Input::method() !== 'POST')
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

			Response::redirect('course/list');
		}

		$this->template->title = 'エラー';
		$this->template->content = View::forge('course/course_list');
		$this->template->content->set('course_lists', Model_Course::get_list());
		$this->template->content->set('errors', $val->error_message());
		$this->template->content->set('inputs', $val->input());
	}

	public function action_edit()
	{
		$this->template->title = '学科の編集';
		$this->template->content = View::forge('course/course_edit');
	}

	public function action_list()
	{
		$this->template->title = '学科一覧';
		$this->template->content = View::forge('course/course_list');
		$this->template->content->set('course_lists', Model_Course::get_list());
	}

}