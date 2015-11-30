<?php

class Controller_Admin_Class extends Controller_Loggedin
{
	const VIEW_FILE = 'admin/class';

	public function action_index()
	{
		$view = View::forge(self::VIEW_FILE);
		$view->set('class_lists', Model_Class::to_lists(Model_Class::find('all')));
		$view->set('course_lists', Model_Course::to_lists(Model_Course::find('all')));
		$view->set('teacher_lists', Model_Teacher::to_lists(Model_Teacher::find('all')));

		$this->template->title = 'クラス一覧';
		$this->template->content = $view;
	}

	public function action_add()
	{
		if(!Input::is_post())
		{
			throw new HttpNotFoundException;
		}

		$val = Model_Class::validate();
		if($val->run())
		{
			$class = Model_Class::forge();
			$class->name = $val->validated('name');
			$class->course_id = $val->validated('course_id');
			$class->teacher_id = $val->validated('teacher_id');
			$class->save();

			Response::redirect('admin/class');
		}

		$view = View::forge(self::VIEW_FILE);
		$view->set('class_lists', Model_Class::to_lists(Model_Class::find('all')));
		$view->set('course_lists', Model_Course::to_lists(Model_Course::find('all')));
		$view->set('teacher_lists', Model_Teacher::to_lists(Model_Teacher::find('all')));
		$view->set('errors', $val->error_message());
		$view->set('inputs', $val->input());

		$this->template->title = 'エラー';
		$this->template->content = $view;

	}

	public function post_edit()
	{
		$val = Model_Class::validate(Input::post('id'));
		$val->add_field('id', 'クラスID', 'trim|required')->add_rule('exist_id', 'class');
		$response = array();

		if($val->run())
		{
			$class = Model_Class::find($val->validated('id'));
			$class->name = $val->validated('name');
			$class->course_id = $val->validated('course_id');
			$class->teacher_id = $val->validated('teacher_id');
			$class->save();

			$response['success'] = Model_Class::to_list($class);
		}
		else
		{
			$response['errors'] = $val->error_message();
		}

		return $this->response($response);
	}

}