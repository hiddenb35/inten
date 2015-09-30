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
			Response::redirect('/');
		}

		$class_id = Input::get('class_id');
		if(is_null($class_id))
		{
			Response::redirect('/teacher/assign_list/timetable/add');
		}

		$this->template->title = '時間割作成';
		$this->template->content = View::forge('timetable/timetable_add');
		$lists = $this->_get_list($class_id);
		$this->template->content->set('class_id', $lists['class_id']);
		$this->template->content->set('lesson_lists', $lists['lesson_lists']);
	}

	public function action_edit()
	{
		$this->template->title = '時間割編集';
		$this->template->content = View::forge('timetable/timetable_edit');
	}

	public function action_list()
	{
		$this->template->title = '時間割一覧';
		$this->template->content = View::forge('timetable/timetable_list');
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