<?php

class Controller_Recruit_Oncampus extends Controller_Loggedin
{
	const FORM_VIEW = 'recruit/on_campus_form';
	const CONFIRM_VIEW = 'recruit/on_campus_confirm';
	const LIST_VIEW = 'recruit/on_campus_list';
	const DETAIL_VIEW = 'recruit/on_campus_detail';

	public function action_form()
	{
		$oncampus_id = Input::get('oncampus_id');

		$this->template->title = '学内説明会追加';
		$this->template->content = View::forge(self::FORM_VIEW);

		if(Input::is_post())
		{
			$this->template->content->set('inputs', Input::post());
		}
		elseif(!is_null($oncampus_id))
		{
			$this->template->content->set('inputs', Model_Oncampus::to_list(Model_Oncampus::find($oncampus_id)));
			$this->template->content->set('oncampus_id', $oncampus_id);
		}
	}

	public function action_confirm()
	{
		if(!Input::is_post())
		{
			throw new HttpNotFoundException;
		}

		$val = (Input::post('oncampus_id')) ? Model_Oncampus::validate_edit() : Model_Oncampus::validate();

		if($val->run())
		{
			$this->template->title = '確認画面';
			$this->template->content = View::forge(self::CONFIRM_VIEW);
			$this->template->content->set('inputs', $val->validated());
		}
		else
		{
			$this->template->title = 'エラー';
			$this->template->content = View::forge(self::FORM_VIEW);
			$this->template->content->set('errors', $val->error_message());
			$this->template->content->set('inputs', $val->input());
		}
	}

	public function action_register()
	{
		if(!Input::is_post())
		{
			throw new HttpNotFoundException;
		}

		$val = (Input::post('oncampus_id')) ? Model_Oncampus::validate_edit() : Model_Oncampus::validate();

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

			Response::redirect(self::LIST_VIEW);

		}

		// ここまで実行された場合はエラー
		throw new HttpServerErrorException;

	}

	public function action_list()
	{
		$this->template->title = '学内説明会一覧';
		$this->template->content = View::forge(self::LIST_VIEW);
	}

	public function action_detail()
	{
		$this->template->title = '学内説明会詳細';
		$this->template->content = View::forge(self::DETAIL_VIEW);
	}
}