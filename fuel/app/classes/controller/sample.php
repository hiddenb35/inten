<?php

class Controller_Sample extends Controller_Loggedin
{
	public function action_index()
	{

	}

	public function action_graph()
	{
		$this->template->title = 'グラフサンプル';
		$this->template->content = View::forge('sample/graph');
	}
}