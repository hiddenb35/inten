<?php

class Controller_Session extends Controller_Loggedin
{
	const FORM_VIEW = 'session/form';
	const CONFIRM_VIEW = 'session/confirm';
	const LIST_VIEW_FOR_STUDENT = 'session/list';
	const LIST_VIEW_FOR_TEACHER = 'session/teacher_for_list';
	const DETAIL_VIEW = 'session/detail';
	const FINISHED_VIEW = 'session/deadline';
	const PER_PAGE = 10;

	public function action_form()
	{
		$session_id = Input::get('session_id');
		$view = View::forge(self::FORM_VIEW);

		if(Input::is_post())
		{
			$view->set('inputs', Input::post());
		}
		elseif(!is_null($session_id))
		{
			$view->set('inputs', Model_session::to_list(Model_session::find($session_id)));
			$view->set('session_id', $session_id);
		}

		$this->template->title = '説明会追加';
		$this->template->content = $view;
	}

	public function action_confirm()
	{
		if(!Input::is_post())
		{
			throw new HttpNotFoundException;
		}

		$val = (Input::post('session_id')) ? Model_session::validate_edit() : Model_session::validate();

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

		$val = (Input::post('session_id')) ? Model_session::validate_edit() : Model_session::validate();

		if($val->run())
		{
			$session = (Input::post('session_id')) ?
				Model_session::find($val->validated('session_id')) : Model_session::forge();

			$session->company_name = $val->validated('company_name');
			$session->company_code = $val->validated('company_code');
			$session->start_date = $val->validated('start_date');
			$session->start_time = $val->validated('start_time');
			$session->end_time = $val->validated('end_time');
			$session->entry_start = $val->validated('entry_start');
			$session->entry_end = $val->validated('entry_end');
			$session->target = $val->validated('target');
			$session->location = $val->validated('location');
			$session->content = $val->validated('content');
			$session->explainer = $val->validated('explainer');
			$session->bring = $val->validated('bring');
			$session->url = $val->validated('url');
			$session->recruitment = json_encode($val->validated('recruitment'));
			$session->files = '{}'; // todo ファイルの保存処理及び保存パスの取得
			$session->note = $val->validated('note');
			$session->teacher_id = $this->get_id();

			$session->save();

			Response::redirect('/recruit/session/list');

		}

		// ここまで実行された場合はエラー
		throw new HttpServerErrorException;
	}

	public function action_list()
	{
		$pagination = Pagination::forge('pagination', array(
			'name' => 'bootstrap3',
			'pagination_url' => Uri::create('recruit/session/list'),
			'total_items' => Model_session::count(),
			'per_page' => self::PER_PAGE,
			'uri_segment' => 'page',
		));

		$sessions = Model_session::find('all', array(
			'limit' => $pagination->per_page,
			'offset' => $pagination->offset,
		));

		$view = ($this->is_student()) ? View::forge(self::LIST_VIEW_FOR_STUDENT) : View::forge(self::LIST_VIEW_FOR_TEACHER);
		$view->set('session_lists', Model_session::to_lists($sessions));

		$this->template->title = '説明会一覧';
		$this->template->content = $view;
	}

	public function action_finished()
	{
		$pagination = Pagination::forge('pagination', array(
			'name' => 'bootstrap3',
			'pagination_url' => Uri::create('recruit/session/finished'),
			'total_items' => Model_session::count(array('where' => array(array('entry_end', '<', time())))),
			'per_page' => self::PER_PAGE,
			'uri_segment' => 'page',
		));

		$sessions = Model_session::find('all', array(
			'where' => array(
				array('entry_end', '<' , time()),
			),
			'limit' => $pagination->per_page,
			'offset' => $pagination->offset,
		));

		$view = View::forge(self::FINISHED_VIEW);
		$view->set('session_lists', Model_session::to_lists($sessions));

		$this->template->title = '説明会一覧';
		$this->template->content = $view;
	}

	public function action_detail()
	{
		$session_id = Input::get('id');
		if(is_null($session_id))
		{
			throw new HttpNotFoundException;
		}

		$session = Model_session::find($session_id);
		$view = View::forge(self::DETAIL_VIEW);
		$view->set('session', Model_session::to_list($session));

		$this->template->title = '説明会詳細';
		$this->template->content = $view;
	}
}