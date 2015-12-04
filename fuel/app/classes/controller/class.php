<?php

class Controller_Class extends Controller_Loggedin
{
	const LIST_VIEW = 'attendance/new_responsible_list';

	public function action_links($type = null)
	{
		$link = $this->get_link($type);
		$class_lists = Model_Class::to_lists(Model_Teacher::find($this->get_id())->classes, $link);

		$view = View::forge(self::LIST_VIEW);
		$view->set('class_lists', $class_lists);

		$this->template->title = '自分の担当するクラス一覧';
		$this->template->content = $view;
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