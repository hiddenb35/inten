<?php

class Controller_timetable extends Controller_Loggedin
{
	public function action_add()
	{
		if(Input::method() === 'POST')
		{
			// todo validation
			$name = Input::post('name');
			$json = Input::post('json');
			$is_active = 1;
			$class_id = Input::post('class_id');
			$timetable = Model_Timetable::forge();
			$timetable->name = $name;
			$timetable->html = $json;
			$timetable->class_id = $class_id;
			$timetable->is_active = $is_active;

			$timetable->save();
			// todo ajaxリクエストから通常のリクエストへ
			Response::redirect(Uri::create('timetable/list', array(), array('class_id' => $class_id)));
		}

		$class_id = Input::get('class_id');
		if(is_null($class_id))
		{
			Response::redirect('/class/myclass/timetable/add');
		}

		$this->template->title = '時間割作成';
		$this->template->content = View::forge('timetable/timetable_add');
		$lists = $this->_get_list($class_id);
		$this->template->content->set('class_id', $lists['class_id']);
		$this->template->content->set('lesson_lists', $lists['lesson_lists']);
	}

	public function action_edit()
	{
		if(Input::method() === 'POST')
		{
			// todo validation & save
//			$name = Input::post('name');
//			$json = Input::post('json');
//			$is_active = 1;
//			$class_id = Input::post('class_id');
//			$timetable = Model_Timetable::forge();
//			$timetable->name = $name;
//			$timetable->html = $json;
//			$timetable->class_id = $class_id;
//			$timetable->is_active = $is_active;
//
//			$timetable->save();
//			Response::redirect('/');
		}
		$timetable_id = Input::get('timetable_id');
		if(is_null($timetable_id)) {
			Response::redirect('/timetable/list');
		}

		// todo validation
		$timetable = Model_Timetable::find($timetable_id);
		$array = array();
		$array['name'] = $timetable['name'];
		$array['html'] = json_decode($timetable['html'], true);

		$this->template->title = '時間割編集';
		$this->template->content = View::forge('timetable/timetable_edit');
		$this->template->content->set('timetable', $array);
	}

	public function action_list()
	{
		$class_id = Input::get('class_id');
		if(is_null($class_id))
		{
			Response::redirect('/class/myclass/timetable/list');
		}
		$timetables = Model_Timetable::find('all', array(
			'where' => array(
				array('class_id', '=', $class_id),
			),
			'order_by' => array('updated_at' => 'desc', 'created_at' => 'desc'),
		));

		$timetable_lists = array();
		foreach($timetables as $timetable) {
			$array = array();
			$array['name'] = $timetable['name'];
			$array['created_at'] = date('Y/m/d H:i:s', $timetable['created_at']);
			$array['updated_at'] = $timetable['updated_at'];
			$array['status'] = ($timetable['is_active']) ? '有効' : '無効';
			$array['edit_link'] = Uri::create('timetable/edit', array(), array('timetable_id' => $timetable['id']));
			$array['delete_link'] = Uri::create('timetable/delete', array(), array('timetable_id' => $timetable['id']));
			$timetable_lists[] = $array;
		}

		$this->template->title = '時間割一覧';
		$this->template->content = View::forge('timetable/timetable_list');
		$this->template->content->set('class_id', $class_id);
		$this->template->content->set('class_name', Model_Class::find($class_id)->name);
		$this->template->content->set('timetable_lists', $timetable_lists);
	}

	public function _get_list($class_id)
	{
		$lists = array();
		$lists['class_id'] = $class_id;
		$class = Model_Class::find($class_id);
		foreach($class->lessons as $lesson)
		{
			$array = array();
			$array['id'] = $lesson['id'];
			$array['name'] = $lesson['name'];
			$teachers = array();
			foreach($lesson->attachment_lessons as $attach)
			{
				$teachers[] = $attach->teacher->last_name . ' ' . $attach->teacher->first_name;
			}

			$array['teacher_name'] = implode(',', $teachers);
			$lists['lesson_lists'][] = $array;
		}

		return $lists;
	}
}