<?php

// todo リダイレクト先の確認
class Controller_Loggedin extends Controller_Based
{
	public function before()
	{
		parent::before();
		$sauth = Auth::instance('studentauth');
		$tauth = Auth::instance('teacherauth');

		if (( ! $sauth->check()) && ( ! $tauth->check()))
		{
			Response::redirect('auth/login');
		}
	}
}