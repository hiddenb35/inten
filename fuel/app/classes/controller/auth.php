<?php

// todo Viewができ次第、生徒用・教員用に対応
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
}