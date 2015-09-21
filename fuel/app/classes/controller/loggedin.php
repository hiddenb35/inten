<?php

class Controller_Loggedin extends Controller_Template
{

	public $template = 'template/after_login/template';
	/**
	 * @var \Auth\Auth_Driver $auth
	 */
	private $auth = null;

	public function before()
	{
		parent::before();

		if (!Auth::check())
		{
			Response::redirect('auth/slogin');
		}

		list($this->auth) = array_values(Auth::verified());

		$user_info = array(
			'user_number' => $this->get_user_number(),
			'full_name' => $this->get_full_name(),
			'full_name_kana' => $this->get_full_name_kana(),
			'email' => $this->get_email(),
		);

		$this->template->header  = View::forge('template/after_login/header');
		$this->template->sidebar = View::forge('template/after_login/sidebar');
		$this->template->footer  = View::forge('template/after_login/footer');
		$this->template->set_global('user_info', $user_info);

	}

	public function is_student()
	{
		return ($this->auth->get_id() === 'studentauth') ? true : false;
	}

	public function is_teacher()
	{
		return ($this->auth->get_id() === 'teacherauth') ? true : false;
	}

	public function is_charge()
	{
		if(!$this->is_teacher())
		{
			return false;
		}

		return ($this->auth->has_access('charge.ok')) ? true : false;
	}

	public function is_admin()
	{
		if(!$this->is_teacher())
		{
			return false;
		}

		return ($this->auth->has_access('admin.ok')) ? true : false;
	}

	public function get_user_number()
	{
		return $this->auth->get('username');
	}

	public function get_full_name()
	{
		return $this->auth->get('last_name') . ' ' .$this->auth->get('first_name');
	}

	public function get_full_name_kana()
	{
		return $this->auth->get('last_name_kana') . ' ' . $this->auth->get('first_name_kana');
	}

	public function get_email()
	{
		return $this->auth->get('email');
	}

}