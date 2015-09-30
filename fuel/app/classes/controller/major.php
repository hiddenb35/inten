<?php

class Controller_Major extends Controller_Loggedin
{
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
		$this->template->content->set('major_lists', $this->_get_list());
		$this->template->content->set('errors', $val->error_message());
		$this->template->content->set('inputs', $val->input());

	}

	public function action_edit()
	{
		$this->template->title = '専攻の編集';
		$this->template->content = View::forge('major/major_edit');
	}

	public function action_list()
	{
		$this->template->title = '専攻一覧';
		$this->template->content = View::forge('major/major_list');
		$this->template->content->set('major_lists',$this->_get_list());
	}

	public function _get_list()
	{
		$major_lists = array();

		foreach(Model_Major::find('all') as $major)
		{
			$array = array();
			$array['id'] = $major['name'];
			$array['name'] = $major['name'];
			$array['created_at'] = $major['created_at'];
			$array['updated_at'] = $major['updated_at'];
			$array['course_name'] = $major->course->name;
			$array['college_name'] = $major->course->college->name;

			$major_lists[] = $array;
		}

		return $major_lists;
	}
}