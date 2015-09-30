<?php

class Controller_Student extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '生徒の追加';
		$this->template->content = View::forge('student/student_add');
	}

	public function action_edit()
	{
		$this->template->title = '生徒の編集';
		$this->template->content = View::forge('student/student_edit');
	}

	public function action_list()
	{
		$this->template->title = '生徒の一覧';
		$this->template->content = View::forge('student/student_list');
		$this->template->content->set('student_lists',$this->_get_list());
	}

	public function _get_list()
	{

		$student_lists = array();

		foreach(Model_Student::find('all') as $student)
		{
			$array = array();
			$array['id'] = $student['id'];
			$array['number'] = $student['username'];
			$array['full_name'] = $student['last_name'] . ' ' . $student['first_name'];
			$array['full_name_kana'] = $student['last_name_kana'] . ' ' . $student['first_name_kana'];
			$array['birthday'] = $student['birthday'];
			$array['email'] = $student['email'];
			$array['gender'] = $student['gender'];
			$array['last_login'] = $student['last_login'];
			$array['created_at'] = $student['created_at'];
			$array['updated_at'] = $student['updated_at'];
			$array['class_name'] = $student->class->name;
			$array['major_name'] = (isset($student->major->name)) ? $student->major->name : '';


			$student_lists[] = $array;
		}

		return $student_lists;
	}
}