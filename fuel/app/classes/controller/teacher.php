<?php

class Controller_Teacher extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '教員の追加';
		$this->template->content = View::forge('teacher/teacher_add');
	}

	public function action_edit()
	{
		$this->template->title = '教員の編集';
		$this->template->content = View::forge('teacher/teacher_edit');
	}

	public function action_list()
	{
		$this->template->title = '教員の一覧';
		$this->template->content = View::forge('teacher/teacher_list');
		$this->template->content->set('teacher_lists',Model_Teacher::get_list());
	}

	public function action_hrteacher()
	{
		$this->template->title = '教員の担任割り当て';
		$this->template->content = View::forge('teacher/hrteacher');
		$this->template->content->set('teacher_lists', Model_Teacher::get_list());
		$this->template->content->set('class_lists', Model_Class::get_list());

		if(Input::post())
		{
			$class_id = Input::post('class_id');
			$teacher_id = Input::post('teacher_id');

			$class = Model_Class::find($class_id);
			$class->teacher_id = $teacher_id;
			$class->save();
		}

	}

	public function action_attachment_lesson()
	{
		$this->template->title = '教員の授業割り当て';
		$this->template->content = View::forge('teacher/attachment_lesson');
	}

	public function action_assign_list($controller, $method)
	{
		if(!$this->is_teacher())
		{
			throw new HttpNotFoundException;
		}

		$this->template->title = 'クラス一覧';
		$this->template->content = View::forge('teacher/assign_list');
		$this->template->content->set('class_lists',$this->_get_list($controller,$method));
	}

	public function _get_list($controller, $method)
	{
		$current_id = $this->get_id();
		$classes = Model_Class::find('all',array(
			'where' => array(
				array('teacher_id', $current_id),
			),
		));

		$class_lists = array();

		foreach($classes as $class)
		{
			$array = array();
			$count = count(Model_Student::find('all',array(
				'where' => array(
					array('class_id',$class['id'])
				),
			)));
			$array['id'] = $class['id'];
			$array['name'] = $class['name'];
			$array['created_at'] = $class['created_at'];
			$array['updated_at'] = $class['updated_at'];
			$array['course_name'] = $class->course->name;
			$array['college_name'] = $class->course->college->name;
			$array['link_url'] = Uri::create("{$controller}/{$method}",array(),array('class_id' => 1));
			$array['student_sum'] = $count;

			$class_lists[] = $array;
		}

		return $class_lists;
	}
}