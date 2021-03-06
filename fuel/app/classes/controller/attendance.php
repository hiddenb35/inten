<?php

class Controller_Attendance extends Controller_Loggedin
{
	const FORM_VIEW = 'attendance/take_attendance';
	const LIST_VIEW = 'attendance/attendance_rate_list';

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
		$val = Model_Attendance::validate();
		if($val->run())
		{
			$date = $val->validated('date');
			$time_periods = $val->validated('time_periods');
			$lesson_id = $val->validated('lesson_id');
			$attendance_data = $val->validated('attendance');

			foreach($time_periods as $time_period)
			{
				$att = Model_Attendance::forge();
				$att->date = $date;
				$att->time_period = $time_period;
				$att->teacher_id = $teacher_id;
				$att->lesson_id = $lesson_id;
				$att->save();

				$attendance_id = $att->get('id');

				foreach($attendance_data as $attendance)
				{
					$student_id = $attendance['student_id'];
					$status = (!empty($attendance['status'])) ? $attendance['status'] : Model_Status::ABSENCE;
					$at = Model_Status::forge();
					$at->status = $status;
					$at->student_id = $student_id;
					$at->attendance_id = $attendance_id;
					$at->save();
				}
			}

			Response::redirect('/');
		}
		else
		{
			$lesson = Model_Lesson::find(Input::post('lesson_id'));

			$view = View::forge(self::FORM_VIEW);
			$view->set('errors', $val->error_message());
			$view->set('inputs', $val->input());
			$view->set('student_lists', Model_Student::to_lists($lesson->class->students));
			$view->set('class_info', $lesson->class);
			$view->set('lesson_info', Model_Lesson::to_list($lesson));

			$this->template->title = 'エラー';
			$this->template->content = $view;
		}

	}

	public function action_attendance_rate_list()
	{
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

	public function action_attendance_info_list()
	{
		$view = View::forge('attendance/attendance_info_list');

		$this->template->title = '自分の出席率一覧';
		$this->template->content = $view;
	}

	public function action_attendance_rate_detail()
	{
		$view = View::forge('attendance/attendance_rate_detail');

		$this->template->title = '出席率詳細';
		$this->template->content = $view;
	}

}