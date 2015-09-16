<?php

class Controller_Auth extends Controller_Based
{
	public function action_slogin()
	{
		$this->template->header->set('title', '生徒用ログインページ');
		$this->template->content = View::forge('auth/student_login');
	}

	public function post_slogin()
	{
		$username = Input::post('username');
		$password = Input::post('password');

		$auth = Auth::instance('studentauth');

		if($auth->login($username, $password))
		{
			Response::redirect('index/index');
		}
		else
		{
			Response::redirect('auth/slogin');
		}
	}

	public function action_tlogin()
	{
		$this->template->header->set('title', '教員用ログインページ');
		$this->template->content = View::forge('auth/teacher_login');
	}

	public function post_tlogin()
	{
		$username = Input::post('username');
		$password = Input::post('password');

		$auth = Auth::instance('teacherauth');

		if($auth->login($username, $password))
		{
			Response::redirect('index/index');
		}
		else
		{
			Response::redirect('auth/tlogin');
		}
	}
}