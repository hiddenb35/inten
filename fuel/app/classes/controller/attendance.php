<?php

class Controller_Attendance extends Controller_Loggedin
{
	public function action_index()
	{
		$class_id = Input::get('class_id');
		if(is_null($class_id))
		{
			throw new HttpNotFoundException;
		}

		$this->template->title = '出席';
		$this->template->content = View::forge('attendance/attendance.php');
		$this->template->content->set('class_id', $class_id);
		$this->template->content->set('student_lists', $this->_get_list($class_id));
	}

	private function _get_list($class_id)
	{
		$student_lists = array();
		$student = Model_Student::find('all', array(
			'where' => array(
				array('class_id', '=', $class_id),
			),
		));

		foreach($student as $s)
		{
			$array = array();
			$array['id'] = $s['id'];
			$array['number'] = $s['username'];
			$array['full_name'] = $s['last_name'] . ' ' . $s['first_name'];
			$student_lists[] = $array;
		}

		return $student_lists;
	}

}