<?php

class Controller_Recruit_Oncampus extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '学内説明会追加';
		$this->template->content = View::forge('recruit/on_campus_add');
	}

	public function action_edit()
	{
		$this->template->title = '学内説明会編集';
		$this->template->content = View::forge('recruit/on_campus_edit');
	}

	public function action_list()
	{
		$this->template->title = '学内説明会一覧';
		$this->template->content = View::forge('recruit/on_campus_list');
	}

	public function action_confirm()
	{
		$this->template->title = '学内説明会確認';
		$this->template->content = View::forge('recruit/on_campus_confirm');
	}

	public function action_detail()
	{
		$this->template->title = '学内説明会詳細';
		$this->template->content = View::forge('recruit/on_campus_detail');
	}
}