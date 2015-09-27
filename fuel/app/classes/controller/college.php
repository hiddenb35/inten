<?php

class Controller_College extends Controller_Loggedin
{
	public function action_add()
	{
		if(Input::method() !== 'POST')
		{
			throw new HttpNotFoundException;
		}

		$val = Model_College::validate();
		if($val->run())
		{
			$college = Model_College::forge();
			$college->name = $val->validated('name');
			$college->save();
		}


		Response::redirect('college/list');

	}

	public function action_edit()
	{
		$this->template->title = 'カレッジの編集';
		$this->template->content = View::forge('college/college_edit');
	}

	public function action_list($error_lists = array())
	{
		$this->template->title = 'カレッジ一覧';
		$this->template->content = View::forge('college/college_list');
		$this->template->content->set('college_lists',$this->_get_list());
	}

	private function _get_list()
	{
		$college_lists = array();

		foreach(Model_College::find('all') as $college)
		{
			$array = array();
			$course_sum = count(Model_Course::find('all'));
			$class_sum = count(Model_Class::find('all'));
			$major_sum = count(Model_Major::find('all'));
			$array['name'] = $college['name'];
			$array['course_sum'] = $course_sum;
			$array['class_sum'] = $class_sum;
			$array['major_sum'] = $major_sum;
			$array['created_at'] = $college['created_at'];
			$array['updated_at'] = $college['updated_at'];

			$college_lists[] = $array;
		}

		return $college_lists;
	}
}