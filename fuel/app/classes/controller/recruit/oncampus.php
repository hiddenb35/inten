<?php

class Controller_Recruit_Oncampus extends Controller_Loggedin
{
	public function action_add()
	{

		$this->template->title = '学内説明会追加';
		$this->template->content = View::forge('recruit/on_campus_add');

		if(Input::method() === 'POST')
		{
			$val = Model_Oncampus::validate();
			if($val->run())
			{
				$oncampus = Model_Oncampus::forge();
				$oncampus->company_name = $val->validated('company_name');
				$oncampus->company_code = $val->validated('company_code');
				$oncampus->start_date = $val->validated('start_date');
				$oncampus->start_time = $val->validated('start_time');
				$oncampus->end_time = $val->validated('end_time');
				$oncampus->entry_start = $val->validated('entry_start');
				$oncampus->entry_end = $val->validated('entry_end');
				$oncampus->target = $val->validated('target');
				$oncampus->location = $val->validated('location');
				$oncampus->content = $val->validated('content');
				$oncampus->explainer = $val->validated('explainer');
				$oncampus->bring = $val->validated('bring');
				$oncampus->url = $val->validated('url');
				$oncampus->recruitment = json_encode($val->validated('recruitment'));
				$oncampus->files = '{}'; // todo ファイルの保存処理及び保存パスの取得
				$oncampus->note = $val->validated('note');
				$oncampus->teacher_id = $this->get_id();

				$oncampus->save();

				Response::redirect('recruit/on_campus_list');
			}
			else
			{
				$this->template->title = 'エラー';
				$this->template->content = View::forge('recruit/on_campus_add');
				$this->template->content->set('errors', $val->error_message());
				$this->template->content->set('inputs', $val->input());
			}
		}

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