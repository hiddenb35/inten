<?php

class Controller_Attendance extends Controller_Loggedin
{
	public function action_lesson_list()
	{

		if(!$this->is_teacher())
		{
			throw new HttpNotFoundException;
		}

		$lesson_lists = array();
		foreach(Model_Teacher::find($this->get_id())->attachment_lessons as $attach)
		{
			$array = array();
			$array['name'] = $attach->lesson->name;
			$array['class_name'] = $attach->lesson->class->name;
			$array['course_name'] = $attach->lesson->class->course->name;
			$array['student_sum'] = count($attach->lesson->class->students);
			$lesson_id = $attach->lesson->id;
			$array['link_url'] = Uri::create('attendance/student_list', array(), array('lesson_id' => $lesson_id));
			$lesson_lists[] = $array;
		}
		$this->template->title = '担当している授業一覧';
		$this->template->content = View::forge('attendance/responsible_list');
		$this->template->content->set('lesson_lists', $lesson_lists);
	}

	public function action_student_list()
	{
		$lesson_id = Input::get('lesson_id');

		if(is_null($lesson_id))
		{
			throw new HttpNotFoundException;
		}

		$this->template->title = '出席';
		$this->template->content = View::forge('attendance/attendance.php');

		$lesson = Model_Lesson::find($lesson_id);
		$this->template->content->set('student_lists', Model_Student::to_lists($lesson->class->students));
		$this->template->content->set('class_info', $lesson->class);
		$this->template->content->set('lesson_info', Model_Lesson::to_list($lesson));
	}

	public function action_take_attendance()
	{
		$lesson_id = Input::get('lesson_id');

		if(is_null($lesson_id))
		{
			throw new HttpNotFoundException;
		}

		$this->template->title = '出席';
		$this->template->content = View::forge('attendance/take_attendance.php');

		$lesson = Model_Lesson::find($lesson_id);
		$this->template->content->set('student_lists', Model_Student::to_lists($lesson->class->students));
		$this->template->content->set('class_info', $lesson->class);
		$this->template->content->set('lesson_info', Model_Lesson::to_list($lesson));
	}

	public function action_add()
	{
		if(!$this->is_teacher())
		{
			throw new HttpNotFoundException;
		}

		$teacher_id = $this->get_id();
		$lesson_id = Input::post('lesson_id');
		$attendance_data = Input::post('attendance');

		$att = Model_Attendance::forge();
		$att->teacher_id = $teacher_id;
		$att->lesson_id = $lesson_id;
		$att->save();

		$attendance_id = $att->id;

		foreach($attendance_data as $attendance)
		{
			$student_id = $attendance['student_id'];
			$status = (isset($attendance['status'])) ? $attendance['status'] : Model_Status::ABSENCE;
			$at = Model_Status::forge();
			$at->status = $status;
			$at->student_id = $student_id;
			$at->attendance_id = $attendance_id;
			$at->save();
		}

		Response::redirect('/');
	}

	public function action_attendance_rate_list() {
		$lesson_id = Input::get('lesson_id');

		if(is_null($lesson_id))
		{
			throw new HttpNotFoundException();
		}

		$this->template->title = '出席率一覧画面';
		$this->template->content = View::forge('attendance/attendance_rate_list');
		$lesson = Model_Lesson::find($lesson_id);
		$this->template->content->set('student_lists', Model_Student::to_lists_with_attendance($lesson->class->students));
		$this->template->content->set('class_info', $lesson->class);
		$this->template->content->set('lesson_info', Model_Lesson::to_list($lesson));
	}

	public function action_attendance_list() {

		if(!$this->is_teacher())
		{
			throw new HttpNotFoundException;
		}

		$lesson_lists = array();
		foreach(Model_Teacher::find($this->get_id())->attachment_lessons as $attach)
		{
			$array = array();
			$array['name'] = $attach->lesson->name;
			$array['class_name'] = $attach->lesson->class->name;
			$array['course_name'] = $attach->lesson->class->course->name;
			$array['student_sum'] = count($attach->lesson->class->students);
			$lesson_id = $attach->lesson->id;
			$array['link_url'] = Uri::create('attendance/attendance_rate_list', array(), array('lesson_id' => $lesson_id));
			$lesson_lists[] = $array;
		}
		$this->template->title = '担当している授業一覧';
		$this->template->content = View::forge('attendance/responsible_list');
		$this->template->content->set('lesson_lists', $lesson_lists);
	}

}