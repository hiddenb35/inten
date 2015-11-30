<?php

class Controller_Attendance extends Controller_Loggedin
{
	const FORM_VIEW = 'attendance/take_attendance';
	const LIST_VIEW = 'attendance/attendance_rate_list';

	/**
	 * 旧出席を取る画面用のメソッド
	 * @deprecated
	 * todo 新出席を取る画面が完成し次第削除
	 */
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
		$lesson = Model_Lesson::find($lesson_id);

		$view = View::forge(self::FORM_VIEW);
		$view->set('student_lists', Model_Student::to_lists($lesson->class->students));
		$view->set('class_info', $lesson->class);
		$view->set('lesson_info', Model_Lesson::to_list($lesson));

		$this->template->title = '出席';
		$this->template->content = $view;
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
		$lesson = Model_Lesson::find($lesson_id);

		$view = View::forge(self::LIST_VIEW);
		$view->set('student_lists', Model_Student::to_lists_with_attendance($lesson->class->students));
		$view->set('class_info', $lesson->class);
		$view->set('lesson_info', Model_Lesson::to_list($lesson));

		$this->template->title = '出席率一覧画面';
		$this->template->content = $view;
	}

}