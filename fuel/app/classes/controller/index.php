<?php

class Controller_Index extends Controller_Loggedin
{
	public function action_index()
	{
		$this->template->title = 'TOPページ';
		$this->template->content = View::forge('index');

		if($this->is_student())
		{
			$student = Model_Student::find($this->get_id());
			$timetable = Model_Timetable::find('first', array(
				'where' => array(
					array('class_id', '=', $student->class->id),
					array('is_active', '=', 1),
				),
				'order_by' => array('updated_at' => 'desc', 'created_at' => 'desc'),
			));
			$name = (is_null($timetable)) ? '' : $timetable->name;
			$html = (is_null($timetable)) ? array() : json_decode($timetable->html, true);
			$this->template->content->set('name', $name);
			$this->template->content->set('html', $html);
		}
		else
		{
			$teacher = Model_Teacher::find($this->get_id());
			$timetable = null;
			if(!empty($teacher->classes))
			{
				$timetable = Model_Timetable::find('first', array(
					'where' => array(
						array('class_id', '=', array_shift($teacher->classes)->id),
						array('is_active', '=', 1),
					),
					'order_by' => array('updated_at' => 'desc', 'created_at' => 'desc'),
				));
			}

			$name = (is_null($timetable)) ? '' : $timetable->name;
			$html = (is_null($timetable)) ? array() : json_decode($timetable->html, true);
			$this->template->content->set('name', $name);
			$this->template->content->set('html', $html);
		}
	}
}