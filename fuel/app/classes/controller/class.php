<?php

class Controller_Class extends Controller_Loggedin
{
	public function action_myclass()
	{
		if(!$this->is_teacher())
		{
			throw new HttpNotFoundException;
		}

		if($class_id = Input::get('class_id'))
		{
			$this->template->title = 'クラス一覧';
			$this->template->content = View::forge('student/student_list');
			$this->template->content->set('student_lists', $this->_student_list($class_id));
		}
		else
		{
			$this->template->title   = '自身が担任のクラス一覧';
			$this->template->content = View::forge('teacher/assign_list');
			$this->template->content->set('class_lists', $this->_class_list($this->get_id(), 'class/myclass'));
		}
	}

	private function _class_list($teacher_id, $uri)
	{
		$lists = array();

		foreach(Model_Teacher::find($teacher_id)->classes as $class)
		{
			$array = array();
			$array['id'] = $class['id'];
			$array['name'] = $class['name'];
			$array['created_at'] = $class['created_at'];
			$array['updated_at'] = $class['updated_at'];
			$array['course_name'] = $class->course->name;
			$array['college_name'] = $class->course->college->name;
			$array['link_url'] = Uri::create($uri, array(), array('class_id' => $class['id']));
			$array['student_sum'] = count($class->students);

			$lists[] = $array;
		}

		return $lists;
	}

	private function _student_list($class_id)
	{
		$lists = array();
		Model_Class::find($class_id);

		foreach(Model_Class::find($class_id)->students as $student)
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

			$lists[] = $array;
		}

		return $lists;
	}
}