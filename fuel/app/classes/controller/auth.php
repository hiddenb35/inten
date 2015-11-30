<?php

class Controller_Auth extends Controller_Template
{
	const STUDENT_AUTHENTICATION_NAME = 'studentauth';
	const TEACHER_AUTHENTICATION_NAME = 'teacherauth';
	const STUDENT_LOGIN_VIEW = 'auth/student_login';
	const TEACHER_LOGIN_VIEW = 'auth/teacher_login';
	const NOT_FOUND_VIEW = '404';
	public $template = 'template/before_login/template';

	/**
	 * 学生ログイン
	 */
	public function action_slogin()
	{
		/* ログイン処理 */
		if(Input::is_post())
		{
			$auth = Auth::instance(self::STUDENT_AUTHENTICATION_NAME);

			(Auth::instance(self::TEACHER_AUTHENTICATION_NAME)->check()) and Auth::logout();

			($auth->login()) ? Response::redirect('/') : Response::redirect('auth/slogin');
		}

		/* 学生用ログイン画面を表示 */
		$this->template->title = '生徒用ログインページ';
		$this->template->content = View::forge(self::STUDENT_LOGIN_VIEW);
	}

	/**
	 * 教員ログイン
	 */
	public function action_tlogin()
	{
		/* ログイン処理 */
		if(Input::is_post())
		{
			$auth = Auth::instance(self::TEACHER_AUTHENTICATION_NAME);

			(Auth::instance(self::STUDENT_AUTHENTICATION_NAME)->check()) and Auth::logout();

			($auth->login()) ? Response::redirect('/') : Response::redirect('auth/tlogin');
		}

		/* 教員用ログインを表示 */
		$this->template->title = '教員用ログインページ';
		$this->template->content = View::forge(self::TEACHER_LOGIN_VIEW);
	}

	/**
	 * ログアウト
	 * @throws HttpNotFoundException
	 * @throws HttpServerErrorException
	 */
	public function action_logout()
	{
		if(Auth::check())
		{
			if(Auth::instance(self::STUDENT_AUTHENTICATION_NAME)->check())
			{
				Auth::logout();
				Response::redirect('auth/slogin');
			}
			elseif(Auth::instance(self::TEACHER_AUTHENTICATION_NAME)->check())
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

	/**
	 * 404
	 */
	public function action_404()
	{
		$this->response_status = 404;
		$this->template->title = '404ページ';
		$this->template->content = View::forge(self::NOT_FOUND_VIEW);
	}
}