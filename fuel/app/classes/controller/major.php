<?php

class Controller_Major extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '専攻の追加';
		$this->template->content = View::forge('major/major_add');
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

	private function _get_list()
	{
		$major_lists = array();

		foreach(Model_Major::find('all') as $major)
		{
			$array = array();
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