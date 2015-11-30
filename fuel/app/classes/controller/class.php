<?php

class Controller_Class extends Controller_Loggedin
{
	public function action_links($type = null)
	{
		$link = $this->get_link($type);
		$class_lists = Model_Class::to_lists(Model_Teacher::find($this->get_id())->classes, $link);
		$this->template->title = '自分の担当するクラス一覧';
		$this->template->content = View::forge('teacher/assign_list');
		$this->template->content->set('class_lists', $class_lists);

	}

	private function get_link($type)
	{
		static $links = array(
			'timetable' => 'timetable/list',
			'student' => 'student/list',
		);

		if(array_key_exists($type, $links))
		{
			return $links[$type];
		}

		throw new HttpNotFoundException;
	}
}