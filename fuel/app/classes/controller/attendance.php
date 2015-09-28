<?php

class Controller_Attendance extends Controller_Loggedin
{
	public function action_index()
	{
		$class_id = Input::get('class_id');
		$lesson_id = Input::get('lesson_id');

		if(is_null($class_id) || is_null($lesson_id))
		{
			throw new HttpNotFoundException;
		}

		$this->template->title = '出席';
		$this->template->content = View::forge('attendance/attendance.php');
		$lists = $this->_get_list($class_id, $lesson_id);
		$this->template->content->set('student_lists', $lists['student']);
		$this->template->content->set('class_info', $lists['class']);
		$this->template->content->set('lesson_info', $lists['lesson']);
	}

	public function action_add()
	{
		if(!$this->is_teacher())
		{
			throw new HttpNotFoundException;
		}
		$teacher_id = $this->get_id();
		$class_id = Input::post('class_id');
		$lesson_id = Input::post('lesson_id');
		$attendance = Input::post('attendance');

		$att = Model_Attendance::forge();
		$att->teacher_id = $teacher_id;
		$att->lesson_id = $lesson_id;
		$att->save();

		$attendance_id = $att->id;

		foreach($attendance as $a)
		{
			$student_id = $a['student_id'];
			$status = (isset($a['status'])) ? $a['status'] : Model_Status::ABSENCE;
			$at = Model_Status::forge();
			$at->status = $status;
			$at->student_id = $student_id;
			$at->attendance_id = $attendance_id;
			$at->save();
		}

		Response::redirect('/');
	}

	private function _get_list($class_id, $lesson_id)
	{
		$lists = array();
		$student = Model_Student::find('all', array(
			'where' => array(
				array('class_id', '=', $class_id),
			),
		));
		$class = Model_Class::find($class_id);
		$lesson = Model_lesson::find($lesson_id);

		foreach($student as $s)
		{
			$array = array();
			$array['id'] = $s['id'];
			$array['number'] = $s['username'];
			$array['full_name'] = $s['last_name'] . ' ' . $s['first_name'];
			$lists['student'][] = $array;
		}
		$lists['class'] = $class->to_array();
		$lists['lesson'] = $lesson->to_array();

		return $lists;
	}

}