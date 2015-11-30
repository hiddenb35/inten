<?php

class Controller_timetable extends Controller_Loggedin
{
	public function action_add()
	{
		if(Input::method() === 'POST')
		{
			$val = Model_Timetable::validate();
			if($val->run())
			{
				$name = $val->validated('name');
				$json = $val->validated('json');
				$class_id = $val->validated('class_id');

				$timetable = Model_Timetable::forge();
				$timetable->name = $name;
				$timetable->html = $json;
				$timetable->class_id = $class_id;
				$timetable->is_active = 1;

				$timetable->save();
				Response::redirect(Uri::create('timetable/list', array(), array('class_id' => $class_id)));
			}

			// todo 適切なエラー処理をすること
			throw new HttpServerErrorException();
		}

		$class_id = Input::get('class_id');
		(is_null($class_id)) and Response::redirect('/class/myclass/timetable/add');

		$this->template->title = '時間割作成';
		$this->template->content = View::forge('timetable/timetable_add');
		$this->template->content->set('class_id', $class_id);
		$this->template->content->set('lesson_lists', Model_Lesson::to_lists(Model_Class::find($class_id)->lessons));
	}

	public function action_edit()
	{
		if(Input::method() === 'POST')
		{
			$val = Model_Timetable::validate_edit();
			if($val->run())
			{
				$name = $val->validated('name');
				$json = $val->validated('json');
				$is_active = 1;
				$class_id = $val->validated('class_id');
				$timetable_id = $val->validated('id');

				$timetable = Model_Timetable::find($timetable_id);
				$timetable->name = $name;
				$timetable->html = $json;
				$timetable->class_id = $class_id;
				$timetable->is_active = $is_active;

				$timetable->save();
				Response::redirect(Uri::create('timetable/list', array(), array('class_id' => $class_id)));
			}

			// todo 適切なエラー処理をすること
			throw new HttpServerErrorException();
		}
		$class_id = Input::get('class_id');
		$timetable_id = Input::get('id');
		if(is_null($timetable_id) || is_null($class_id))
		{
			Response::redirect('/timetable/list');
		}

		// todo validation
		$timetable = Model_Timetable::find($timetable_id);
		$array = array();
		$array['name'] = $timetable['name'];
		$array['html'] = json_decode($timetable['html'], true);

		$this->template->title = '時間割編集';
		$this->template->content = View::forge('timetable/timetable_edit');
		$this->template->content->set('class_id', $class_id);
		$this->template->content->set('id', $timetable_id);
		$this->template->content->set('lesson_lists', Model_Lesson::to_lists(Model_Class::find($class_id)->lessons));
		$this->template->content->set('timetable', $array);
	}

	public function action_list()
	{
		$class_id = Input::get('class_id');
		(is_null($class_id)) and Response::redirect('/class/myclass/timetable/list');

		$timetables = Model_Timetable::find('all', array(
			'where' => array(
				array('class_id', '=', $class_id),
			),
			'order_by' => array('updated_at' => 'desc', 'created_at' => 'desc'),
		));

		$this->template->title = '時間割一覧';
		$this->template->content = View::forge('timetable/timetable_list');
		$this->template->content->set('class_id', $class_id);
		$this->template->content->set('class_name', Model_Class::find($class_id)->name);
		$this->template->content->set('timetable_lists', Model_Timetable::to_lists($timetables));
	}
}