<?php

class Controller_Auth extends Controller_Template
{
	public $template = 'template/before_login/template';

	public function action_slogin()
	{
		if(Input::is_post())
		{
			$username = Input::post('username');
			$password = Input::post('password');
			$auth = Auth::instance('studentauth');

			(Auth::instance('teacherauth')->check()) and Auth::logout();

			($auth->login($username, $password)) ? Response::redirect('/') : Response::redirect('auth/slogin');
		}

		$this->template->title = '生徒用ログインページ';
		$this->template->content = View::forge('auth/student_login');
	}

	public function action_tlogin()
	{
		if(Input::is_post())
		{
			$username = Input::post('username');
			$password = Input::post('password');

			$auth = Auth::instance('teacherauth');

			(Auth::instance('studentauth')->check()) and Auth::logout();

			($auth->login($username, $password)) ? Response::redirect('/') : Response::redirect('auth/tlogin');
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

	public function action_404()
	{
		$this->response_status = 404;
		$this->template->title = '404ページ';
		$this->template->content = View::forge('404');
	}
}