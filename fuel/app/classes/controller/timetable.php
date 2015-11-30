<?php

class Controller_timetable extends Controller_Loggedin
{
	const FORM_VIEW = 'timetable/timetable_add';
	const LIST_VIEW = 'timetable/timetable_list';
	const EDIT_VIEW = 'timetable/timetable_edit';

	public function action_add()
	{
		if(Input::is_post())
		{
			$val = Model_Timetable::validate();
			if($val->run())
			{
				$timetable = Model_Timetable::forge();
				$timetable->name = $val->validated('name');
				$timetable->html = $val->validated('json');
				$timetable->class_id = $val->validated('class_id');
				$timetable->is_active = 1;

				$timetable->save();

				Response::redirect(Uri::create('timetable/list', array(), array('class_id' => $val->validated('class_id'))));
			}

			// todo 適切なエラー処理をすること
			throw new HttpServerErrorException();
		}

		$class_id = Input::get('class_id');
		if(is_null($class_id))
		{
			throw new HttpNOtFoundException;
		}

		$view = View::forge(self::FORM_VIEW);
		$view->set('class_id', $class_id);
		$view->set('lesson_lists', Model_Lesson::to_lists(Model_Class::find($class_id)->lessons));

		$this->template->title = '時間割作成';
		$this->template->content = $view;
	}

	public function action_edit()
	{
		if(Input::is_post())
		{
			$val = Model_Timetable::validate_edit();
			if($val->run())
			{
				$timetable = Model_Timetable::find($val->validated('id'));
				$timetable->name = $val->validated('name');
				$timetable->html = $val->validated('json');
				$timetable->class_id = $val->validated('class_id');
				$timetable->is_active = 1;

				$timetable->save();
				Response::redirect(Uri::create('timetable/list', array(), array('class_id' => $val->validated('class_id'))));
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

		$view = View::forge(self::EDIT_VIEW);
		$view->set('class_id', $class_id);
		$view->set('id', $timetable_id);
		$view->set('lesson_lists', Model_Lesson::to_lists(Model_Class::find($class_id)->lessons));
		$view->set('timetable', $array);

		$this->template->title = '時間割編集';
		$this->template->content = $view;
	}

	public function action_list()
	{
		$class_id = Input::get('class_id');
		if(is_null($class_id))
		{
			throw new HttpNotFOundException;
		}

		$timetables = Model_Timetable::find('all', array(
			'where' => array(
				array('class_id', '=', $class_id),
			),
			'order_by' => array('updated_at' => 'desc', 'created_at' => 'desc'),
		));

		$view = View::forge(self::LIST_VIEW);
		$view->set('class_id', $class_id);
		$view->set('class_name', Model_Class::find($class_id)->name);
		$view->set('timetable_lists', Model_Timetable::to_lists($timetables));

		$this->template->title = '時間割一覧';
		$this->template->content = $view;
	}
}