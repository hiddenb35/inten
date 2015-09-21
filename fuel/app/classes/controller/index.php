<?php

Class Controller_Index extends Controller_Loggedin
{
	public function action_index()
	{
		$this->template->title = 'TOPページ';
		$this->template->content = View::forge('index');
	}
}