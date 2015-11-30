<?php

class Controller_Lesson extends Controller_Loggedin
{
	const FORM_VIEW = 'lesson/lesson_add';
	const LIST_VIEW = 'lesson/lesson_list';
	const LINK_LIST_VIEW = 'attendance/responsible_list';

	public function before()
	{
		parent::before();
		if(!$this->is_teacher())
		{
			throw new HttpNotFoundException;
		}
	}
	public function action_add()
	{
		$this->template->title = '授業の追加';
		$this->template->content = View::forge(self::FORM_VIEW);
	}

	public function action_list()
	{
		$view = View::forge(self::LIST_VIEW);
		$view->set('lesson_lists',Model_Lesson::to_lists(Model_Lesson::find('all')));

		$this->template->title = '授業一覧';
		$this->template->content = $view;
	}

	public function action_links($type = null)
	{
		$link = $this->get_attendance_link($type);
		$lesson_lists = Model_Attachment::to_lists(Model_Teacher::find($this->get_id())->attachment_lessons, $link);

		$view = View::forge(self::LINK_LIST_VIEW);
		$view->set('lesson_lists', $lesson_lists);

		$this->template->title = '担当している授業一覧';
		$this->template->content = $view;
	}

	private function get_attendance_link($type)
	{
		static $links = array(
			'get' => 'attendance/take_attendance',
			'old_get' => 'attendance/student_list',
			'list' => 'attendance/attendance_rate_list',
		);

		if(array_key_exists($type, $links))
		{
			return $links[$type];
		}

		throw new HttpNotFoundException;
	}
}