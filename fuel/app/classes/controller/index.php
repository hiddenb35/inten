<?php

Class Controller_Index extends Controller_Based
{
	public function action_index()
	{
		$this->template->title = 'TOPページ';
		$this->template->content = View::forge('index');
	}

	public function action_404()
	{
		$this->template->title = '404ページ';
		$this->template->content = View::forge('404');
	}
}