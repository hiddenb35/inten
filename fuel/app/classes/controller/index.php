<?php

Class Controller_Index extends Controller
{
	public function action_index()
	{
		return View::forge('index');
	}

	public function action_404()
	{
		return View::forge('404');
	}
}