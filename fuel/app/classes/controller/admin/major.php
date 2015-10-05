<?php

class Controller_Admin_Major extends Controller_Loggedin
{
	public function action_index()
	{
		$this->template->title = '専攻一覧';
		$this->template->content = View::forge('major/major_list');
		$this->template->content->set('major_lists',Model_Major::to_lists(Model_Major::find('all')));
		$this->template->content->set('course_lists',Model_Course::to_lists(Model_Course::find('all')));
	}

	public function action_add()
	{
		if(Input::method() !== 'POST')
		{
			throw new HttpNotFoundException;
		}

		$val = Model_Major::validate();
		if($val->run())
		{
			$major = Model_Major::forge();
			$major->name = $val->validated('name');
			$major->course_id = $val->validated('course_id');
			$major->save();

			Response::redirect('admin/major');
		}

		$this->template->title = 'エラー';
		$this->template->content = View::forge('major/major_list');
		$this->template->content->set('major_lists', Model_Major::to_lists(Model_Major::find('all')));
		$this->template->content->set('course_lists',Model_Course::to_lists(Model_Course::find('all')));
		$this->template->content->set('errors', $val->error_message());
		$this->template->content->set('inputs', $val->input());

	}

	public function post_edit()
	{
		$val = Model_Major::validate();
		$val->add_field('id', '専攻ID', 'trim|required')->add_rule('exist_id', 'major');
		$response = array();

		if($val->run())
		{
			$major = Model_Major::find($val->validated('id'));
			$major->name = $val->validated('name');
			$major->course_id = $val->validated('course_id');
			$major->save();

			$response['success'] = Model_Major::to_list($major);
		}
		else
		{
			$response['errors'] = $val->error_message();
		}

		return $this->response($response);
	}

}