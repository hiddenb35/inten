<?php

class Controller_Student extends Controller_Loggedin
{
	const FORM_VIEW = 'student/student_add';
	const EDIT_VIEW = 'student/student_edit';
	const LIST_VIEW = 'student/student_list';

	public function action_add()
	{
		$this->template->title = '生徒の追加';
		$this->template->content = View::forge(self::FORM_VIEW);
	}

	public function action_edit()
	{
		$this->template->title = '生徒の編集';
		$this->template->content = View::forge(self::EDIT_VIEW);
	}

	public function action_list()
	{
		$class_id = Input::get('class_id');
		$students = (is_null($class_id)) ? Model_Student::find('all') : Model_Class::find($class_id)->students;

		$view = View::forge(self::LIST_VIEW);
		$view->set('student_lists', Model_Student::to_lists($students));

		$this->template->title = '生徒の一覧';
		$this->template->content = $view;
	}

}