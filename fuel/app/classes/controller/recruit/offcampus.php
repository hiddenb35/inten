<?php

class Controller_Recruit_Offcampus extends Controller_Loggedin
{
	public function action_form()
	{
		$offcampus_id = Input::get('offcampus_id');

		$this->template->title = '学外説明会追加';
		$this->template->content = View::forge('recruit/off_campus_form');

		if(Input::is_post())
		{
			$this->template->content->set('inputs', Input::post());
		}
		elseif(!is_null($offcampus_id))
		{
			$this->template->content->set('inputs', Model_Offcampus::to_list(Model_Offcampus::find($offcampus_id)));
			$this->template->content->set('offcampus_id', $offcampus_id);
		}
	}

	public function action_confirm()
	{
		if(!Input::is_post())
		{
			throw new HttpNotFoundException;
		}

		$val = (Input::post('offcampus_id')) ? Model_Offcampus::validate_edit() : Model_Offcampus::validate();

		if($val->run())
		{
			$this->template->title = '確認画面';
			$this->template->content = View::forge('recruit/off_campus_confirm');
			$this->template->content->set('inputs', $val->validated());
		}
		else
		{
			$this->template->title = 'エラー';
			$this->template->content = View::forge('recruit/off_campus_form');
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

		$val = (Input::post('offcampus_id')) ? Model_Offcampus::validate_edit() : Model_Offcampus::validate();

		if($val->run())
		{

			$offcampus = (Input::post('offcampus_id')) ?
				Model_Offcampus::find($val->validated('offcampus_id')) : Model_Offcampus::forge();

			$offcampus->company_name = $val->validated('company_name');
			$offcampus->company_code = $val->validated('company_code');
			$offcampus->start_date = $val->validated('start_date');
			$offcampus->start_time = $val->validated('start_time');
			$offcampus->end_time = $val->validated('end_time');
			$offcampus->entry_start = $val->validated('entry_start');
			$offcampus->entry_end = $val->validated('entry_end');
			$offcampus->target = $val->validated('target');
			$offcampus->location = $val->validated('location');
			$offcampus->content = $val->validated('content');
			$offcampus->explainer = $val->validated('explainer');
			$offcampus->bring = $val->validated('bring');
			$offcampus->url = $val->validated('url');
			$offcampus->recruitment = json_encode($val->validated('recruitment'));
			$offcampus->files = '{}'; // todo ファイルの保存処理及び保存パスの取得
			$offcampus->note = $val->validated('note');
			$offcampus->teacher_id = $this->get_id();

			$offcampus->save();

			Response::redirect('recruit/off_campus_list');
		}

		// ここまで実行された場合はエラー
		throw new HttpServerErrorException;
	}

	public function action_list()
	{
		$this->template->title = '学外説明会一覧';
		$this->template->content = View::forge('recruit/off_campus_confirm');
	}

	public function action_detail()
	{
		$this->template->title = '学外説明会詳細';
		$this->template->content = View::forge('recruit/off_campus_detail');
	}
}