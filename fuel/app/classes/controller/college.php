<?php

class Controller_College extends Controller_Loggedin
{
	public function action_add()
	{
		if(Input::method() !== 'POST')
		{
			throw new HttpNotFoundException;
		}

		$name = Input::post('name');
		$college  = Model_College::forge();
		$college->name = $name;
		$college->save();

		Response::redirect('college/list');


	}

	public function action_edit()
	{
		$this->template->title = 'カレッジの編集';
		$this->template->content = View::forge('college/college_edit');
	}

	public function action_list()
	{
		$colleges = Model_College::find('all');

		$college_lists = array();

		foreach($colleges as $college)
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
		$this->template->title = 'カレッジ一覧';
		$this->template->content = View::forge('college/college_list');
		$this->template->content->set('college_lists',$college_lists);
	}
}