<?php

Class Controller_Index extends Controller_Based
{
	public function action_index()
	{
		$this->template->header->set('title', 'TOPページ');
		$this->template->content = View::forge('index');
	}

	public function action_404()
	{
		$this->template->header->set('title', '404ﾍﾟｰｼﾞ');
		$this->template->content = View::forge('404');
	}
}