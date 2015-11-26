<?php

class Controller_Lesson extends Controller_Loggedin
{
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
		$this->template->content = View::forge('lesson/lesson_add');
	}

	public function action_list()
	{
		$this->template->title = '授業一覧';
		$this->template->content = View::forge('lesson/lesson_list');
		$this->template->content->set('lesson_lists',Model_Lesson::to_lists(Model_Lesson::find('all')));
	}

	public function action_links($type = null)
	{
		$link = $this->get_attendance_link($type);
		$lesson_lists = Model_Attachment::to_lists(Model_Teacher::find($this->get_id())->attachment_lessons, $link);
		$this->template->title = '担当している授業一覧';
		$this->template->content = View::forge('attendance/responsible_list');
		$this->template->content->set('lesson_lists', $lesson_lists);
	}

	private function get_attendance_link($type)
	{
		static $links = array(
			'get' => 'attendance/student_list',
			'list' => 'attendance/attendance_rate_list',
		);

		if(array_key_exists($type, $links))
		{
			return $links[$type];
		}

		throw new HttpNotFoundException;
	}
}