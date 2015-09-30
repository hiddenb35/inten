<?php

class Controller_Admin_Major extends Controller_Loggedin
{
	public function action_index()
	{
		$this->template->title = '専攻一覧';
		$this->template->content = View::forge('major/major_list');
		$this->template->content->set('major_lists',Model_Major::get_list());
		$this->template->content->set('course_lists',Model_Course::get_list());
	}

	public function action_add()
	{
		if(Input::method() !== 'POST')
		{
			throw new HttpNotFoundException;
		}

		$val = Model_Major::validate();
		if($val->run())
		{
			$major = Model_Major::forge();
			$major->name = $val->validated('name');
			$major->course_id = $val->validated('course_id');
			$major->save();

			Response::redirect('major/list');
		}

		$this->template->title = 'エラー';
		$this->template->content = View::forge('major/major_list');
		$this->template->content->set('major_lists', Model_Major::get_list());
		$this->template->content->set('course_lists',Model_Course::get_list());
		$this->template->content->set('errors', $val->error_message());
		$this->template->content->set('inputs', $val->input());

	}

	public function action_edit()
	{
		$this->template->title = '専攻の編集';
		$this->template->content = View::forge('major/major_edit');
	}

}