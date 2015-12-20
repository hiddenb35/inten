<?php

class Controller_Sample extends Controller_Loggedin
{
	public function action_index()
	{
		static $samples = array(
			'グラフ' => 'graph',
			'グラフ2' => 'graph2',
		);
		$this->template->title = 'サンプル一覧';
		$this->template->content = View::forge('sample/index');
		$this->template->content->set('samples', $samples);
	}

	public function action_graph()
	{
		$this->template->title = 'グラフサンプル';
		$this->template->content = View::forge('sample/graph');
	}

	public function action_graph2()
	{
		$this->template->title = 'グラフサンプル2';
		$this->template->content = View::forge('sample/graph2');
	}
}