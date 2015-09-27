<?php

class Controller_Attendance extends Controller_Loggedin
{
	public function action_index()
	{
		$this->template->title = '出席';
		$this->template->content = View::forge('attendance/attendance.php');
	}
}