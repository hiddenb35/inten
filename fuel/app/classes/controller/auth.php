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

			if(Auth::instance('teacherauth')->check())
			{
				Auth::logout();
			}

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

			if(Auth::instance('studentauth')->check())
			{
				Auth::logout();
			}

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

	public function action_pass_update()
	{
		if(!Auth::check())
		{
			throw new HttpNotFoundException;
		}

		$title = 'パスワード変更';

		if(Input::method() === 'POST')
		{
			list($auth) = array_values(Auth::verified());

			$val = Validation::forge();

			// todo 現在のパスワードの検証
			$val->add('current_password', '現在のパスワード')
				->add_rule('required');
			$val->add('new_password', '新規パスワード')
				->add_rule('required')
				->add_rule('min_length', 4)
				->add_rule('max_length', 255);
			$val->add('new_password_confirm', '新規パスワード(確認)')
				->add_rule('required')
				->add_rule('match_field', 'new_password');

			if($val->run())
			{
				// todo 実際のパスワード変更処理
				$title = 'パスワードを変更しました';
			}
			else
			{
				// todo viewへのエラーメッセージのセット
				$title = 'パスワード変更エラー';
			}
		}

		$this->template->title = $title;
		$this->template->content = View::forge('auth/pass_update');
	}
}