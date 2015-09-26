<?php

class Controller_Lesson extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '授業の追加';
		$this->template->content = View::forge('lesson/lesson_add');
	}

		public function action_list()
	{
		$lessons = Model_Lesson::find('all');

		$lesson_lists = array();

		foreach($lessons as $lesson)
		{
			$array = array();
			$array['name'] = $lesson['name'];
			$array['term'] = $lesson['term'];
			$array['sum_credit'] = $lesson['sum_credit'];
			$array['class_name'] = $lesson->class->name;
			$array['attachment'] = $lesson->class->teacher->last_name . ' ' . $lesson->class->teacher->first_name;

			$lesson_lists[] = $array;
		}

		$this->template->title = '授業一覧';
		$this->template->content = View::forge('lesson/lesson_list');
	}
}