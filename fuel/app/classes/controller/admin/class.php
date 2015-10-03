<?php

class Controller_Admin_Class extends Controller_Loggedin
{
	public function action_index()
	{
		$this->template->title = 'クラス一覧';
		$this->template->content = View::forge('class/class_list');
		$this->template->content->set('class_lists', Model_Class::to_list(Model_Class::find('all')));
		$this->template->content->set('course_lists', Model_Course::to_list(Model_Course::find('all')));
		$this->template->content->set('teacher_lists', Model_Teacher::to_list(Model_Teacher::find('all')));
	}

	public function action_add()
	{
		if(Input::method() !== 'POST')
		{
			throw new HttpNotFoundException;
		}

		$val = Model_Class::validate();
		if($val->run())
		{
			$class = Model_Class::forge();
			$class->name = $val->validated('name');
			$class->course_id = $val->validated('course_id');
			$class->save();

			Response::redirect('admin/class');
		}

		$this->template->title = 'エラー';
		$this->template->content = View::forge('class/class_list');
		$this->template->content->set('class_lists', Model_Class::to_list(Model_Class::find('all')));
		$this->template->content->set('course_lists', Model_Course::to_list(Model_Course::find('all')));
		$this->template->content->set('teacher_lists', Model_Teacher::to_list(Model_Teacher::find('all')));
		$this->template->content->set('errors', $val->error_message());
		$this->template->content->set('inputs', $val->input());

	}

	public function action_edit()
	{
		$this->template->title = 'クラスの編集';
		$this->template->content = View::forge('class/class_edit');
	}

}