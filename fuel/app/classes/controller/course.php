<?php

class Controller_Course extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '学科の追加';
		$this->template->content = View::forge('course/course_add');
	}

	public function action_edit()
	{
		$this->template->title = '学科の編集';
		$this->template->content = View::forge('course/course_edit');
	}

	public function action_list()
	{

		$courses = Model_Course::find('all');

		$course_lists = array();

		foreach($courses as $course)
		{
			$array = array();
			$array['code'] = $course['code'];
			$array['name'] = $course['name'];
			$array['year_system'] = $course['year_system'];
			$array['created_at'] = $course['created_at'];
			$array['updated_at'] = $course['updated_at'];
			$array['college_name'] = $course->college->name;

			$course_lists[] = $array;
		}

		$this->template->title = '学科一覧';
		$this->template->content = View::forge('course/course_list');
		$this->template->content->set('course_lists',$course_lists);
	}
}