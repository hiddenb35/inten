<?php

class Controller_Loggedin extends Controller_Hybrid
{

	public $template = 'template/after_login/template';
	/**
	 * @var \Auth\Auth_Driver $authentication
	 */
	private $authentication = null;

	public function before()
	{
		parent::before();

		if (!Auth::check())
		{
			Response::redirect('auth/slogin');
		}

		list($this->authentication) = array_values(Auth::verified());

		$user_info = array(
			'user_number' => $this->get_user_number(),
			'full_name' => $this->get_full_name(),
			'full_name_kana' => $this->get_full_name_kana(),
			'email' => $this->get_email(),
			'body_skin' => 'skin-blue',
		);

		if($this->is_admin())
		{
			$this->template->header  = View::forge('template/after_login/header_admin');
			$user_info['body_skin'] = 'skin-yellow';

		}
		elseif($this->is_teacher())
		{
			$this->template->header  = View::forge('template/after_login/header_teacher');
			$user_info['body_skin'] = 'skin-red';
		}
		elseif($this->is_student())
		{
			$this->template->header  = View::forge('template/after_login/header_student');
		}

		$this->template->sidebar = View::forge('template/after_login/sidebar');
		$this->template->footer  = View::forge('template/after_login/footer');
		$this->template->set_global('user_info', $user_info);

	}

	public function is_student()
	{
		return ($this->authentication->get_id() === 'studentauth') ? true : false;
	}

	public function is_teacher()
	{
		return ($this->authentication->get_id() === 'teacherauth') ? true : false;
	}

	public function is_admin()
	{
		if(!$this->is_teacher())
		{
			return false;
		}

		return ($this->authentication->has_access('admin.ok')) ? true : false;
	}

	public function get_id()
	{
		return $this->authentication->get('id');
	}

	public function get_user_number()
	{
		return $this->authentication->get('username');
	}

	public function get_full_name()
	{
		return $this->authentication->get('last_name') . ' ' .$this->authentication->get('first_name');
	}

	public function get_full_name_kana()
	{
		return $this->authentication->get('last_name_kana') . ' ' . $this->authentication->get('first_name_kana');
	}

	public function get_email()
	{
		return $this->authentication->get('email');
	}

}