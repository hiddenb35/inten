<?php

class Controller_Recruit_Oncampus extends Controller_Loggedin
{
	public function action_form()
	{
		$oncampus_id = Input::get('oncampus_id');

		$this->template->title = '学内説明会追加';
		$this->template->content = View::forge('recruit/on_campus_form');

		if(Input::method() === 'POST')
		{
			$this->template->content->set('inputs', Input::post());
		}
		elseif(!is_null($oncampus_id))
		{
			$this->template->content->set('inputs', Model_Oncampus::to_list(Model_Oncampus::find($oncampus_id)));
		}
	}

	public function action_confirm()
	{
		if(Input::method() !== 'POST')
		{
			throw new HttpNotFoundException;
		}

		$val = Model_Oncampus::validate();

		if(Input::post('oncampus_id'))
		{
			$val = Model_Oncampus::validate_edit();
		}

		if($val->run())
		{
			$this->template->title = '確認画面';
			$this->template->content = View::forge('recruit/on_campus_confirm');
			$this->template->content->set('inputs', $val->validated());
		}
		else
		{
			$this->template->title = 'エラー';
			$this->template->content = View::forge('recruit/on_campus_form');
			$this->template->content->set('errors', $val->error_message());
			$this->template->content->set('inputs', $val->input());
		}
	}

	public function action_register()
	{
		if(Input::method() !== 'POST')
		{
			throw new HttpNotFoundException;
		}

		$val = Model_Oncampus::validate();

		if(Input::post('oncampus_id'))
		{
			$val = Model_Oncampus::validate_edit();
		}

		if($val->run())
		{
			$oncampus = (Input::post('oncampus_id')) ?
				Model_Oncampus::find($val->validated('oncampus_id')) : Model_Oncampus::forge();

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

		// ここまで実行された場合はエラー
		throw new HttpServerErrorException;

	}

	public function action_list()
	{
		$this->template->title = '学内説明会一覧';
		$this->template->content = View::forge('recruit/on_campus_list');
	}

	public function action_detail()
	{
		$this->template->title = '学内説明会詳細';
		$this->template->content = View::forge('recruit/on_campus_detail');
	}
}