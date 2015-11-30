<?php

class Controller_Teacher extends Controller_Loggedin
{
	const FORM_VIEW = 'teacher/teacher_add';
	const EDIT_VIEW = 'teacher/teacher_edit';
	const LIST_VIEW = 'teacher/teacher_list';
	const ATTACH_VIEW = 'teacher/attachment_lesson';
	
	public function action_add()
	{
		$this->template->title = '教員の追加';
		$this->template->content = View::forge(self::FORM_VIEW);
	}

	public function action_edit()
	{
		$this->template->title = '教員の編集';
		$this->template->content = View::forge(self::EDIT_VIEW);
	}

	public function action_list()
	{
		$this->template->title = '教員の一覧';
		$this->template->content = View::forge(self::LIST_VIEW);
		$this->template->content->set('teacher_lists',Model_Teacher::to_lists(Model_Teacher::find('all')));
	}

	public function action_attachment_lesson()
	{
		$this->template->title = '教員の授業割り当て';
		$this->template->content = View::forge(self::ATTACH_VIEW);
	}

}