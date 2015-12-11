<?php

class Controller_Recruit_Offcampus extends Controller_Loggedin
{
	const FORM_VIEW = 'recruit/off_campus_form';
	const CONFIRM_VIEW = 'recruit/off_campus_confirm';
	const LIST_VIEW = 'recruit/off_campus_list';
	const DETAIL_VIEW = 'recruit/off_campus_detail';

	public function action_form()
	{
		$offcampus_id = Input::get('offcampus_id');
		$view = View::forge(self::FORM_VIEW);

		if(Input::is_post())
		{
			$view->set('inputs', Input::post());
		}
		elseif(!is_null($offcampus_id))
		{
			$view->set('inputs', Model_Offcampus::to_list(Model_Offcampus::find($offcampus_id)));
			$view->set('offcampus_id', $offcampus_id);
		}

		$this->template->title = '学外説明会追加';
		$this->template->content = $view;
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
			$view = View::forge(self::CONFIRM_VIEW);
			$view->set('inputs', $val->validated());

			$this->template->title = '確認画面';
			$this->template->content = $view;
		}
		else
		{
			$view = View::forge(self::FORM_VIEW);
			$view->set('errors', $val->error_message());
			$view->set('inputs', $val->input());

			$this->template->title = 'エラー';
			$this->template->content = $view;
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

			Response::redirect('/recruit/offcampus/list');
		}

		// ここまで実行された場合はエラー
		throw new HttpServerErrorException;
	}

	public function action_list()
	{
		$offcampus = Model_Offcampus::find('all');

		$view = View::forge(self::LIST_VIEW);
		$view->set('offcampus_lists', Model_Offcampus::to_lists($offcampus));

		$this->template->title = '学外説明会一覧';
		$this->template->content = $view;
	}

	public function action_detail()
	{
		$offcampus_id = Input::get('id');
		if(is_null($offcampus_id))
		{
			throw new HttpNotFoundException;
		}

		$offcampus = Model_Offcampus::find($offcampus_id);
		$view = View::forge(self::DETAIL_VIEW);
		$view->set('offcampus', Model_Offcampus::to_list($offcampus));

		$this->template->title = '学外説明会詳細';
		$this->template->content = $view;
	}
}