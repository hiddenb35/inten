<?php

class Controller_Auth extends Controller_Based
{
	public function action_slogin()
	{
		if(Input::method() === 'POST')
		{
			$username = Input::post('username');
			$password = Input::post('password');
			$auth = Auth::instance('studentauth');

			if($auth->login($username, $password))
			{
				Response::redirect('/');
			}
			else
			{
				Response::redirect('auth/slogin');
			}
		}

		$this->template->title = '生徒用ログインページ';
		$this->template->content = View::forge('auth/student_login');
	}

	public function action_tlogin()
	{
		if(Input::method() === 'POST')
		{
			$username = Input::post('username');
			$password = Input::post('password');

			$auth = Auth::instance('teacherauth');

			if($auth->login($username, $password))
			{
				Response::redirect('/');
			}
			else
			{
				Response::redirect('auth/tlogin');
			}
		}

		$this->template->title = '教員用ログインページ';
		$this->template->content = View::forge('auth/teacher_login');
	}

	public function action_logout()
	{
		if(Auth::check())
		{
			if(Auth::instance('studentauth')->check())
			{
				Auth::logout();
				Response::redirect('auth/slogin');
			}
			elseif(Auth::instance('teacherauth')->check())
			{
				Auth::logout();
				Response::redirect('auth/tlogin');
			}
			else
			{
				throw new HttpServerErrorException;
			}
		}
		else
		{
			throw new HttpNotFoundException;
		}
	}
}