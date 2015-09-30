<?php

class Controller_Class extends Controller_Loggedin
{
	public function action_add()
	{
		if(Input::method() !== 'POST')
		{
			throw new HttpNotFoundException;
		}

		$val = Model_Class::validate();
		if($val->run())
		{
			$class = Model_Class::forge();
			$class->name = $val->validated('name');
			$class->course_id = $val->validated('course_id');
			$class->save();

			Response::redirect('class/list');
		}

		$this->template->title = 'エラー';
		$this->template->content = View::forge('class/class_list');
		$this->template->content->set('class_lists', $this->_get_list());
		$this->template->content->set('errors', $val->error_message());
		$this->template->content->set('inputs', $val->input());

	}

	public function action_edit()
	{
		$this->template->title = 'クラスの編集';
		$this->template->content = View::forge('class/class_edit');
	}

	public function action_list()
	{
		$this->template->title = 'クラス一覧';
		$this->template->content = View::forge('class/class_list');
		$this->template->content->set('class_lists', $this->_get_list());
	}

	public function _get_list()
	{
		$class_lists = array();

		foreach(Model_Class::find('all') as $class)
		{
			$array = array();
			$array['id'] = $class['id'];
			$array['name'] = $class['name'];
			$array['teacher_name'] = $class->teacher->last_name . ' ' . $class->teacher->first_name;
			$array['course_name'] = $class->course->name;
			$array['college_name'] = $class->course->college->name;
			$array['created_at'] = $class['created_at'];
			$array['updated_at'] = $class['updated_at'];

			$class_lists[] = $array;
		}

		return $class_lists;
	}
}