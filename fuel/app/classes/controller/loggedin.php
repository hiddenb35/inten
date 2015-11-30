<?php

class Controller_Loggedin extends Controller_Hybrid
{
	const HEADER_ADMIN_VIEW = 'template/after_login/header_admin';
	const HEADER_TEACHER_VIEW = 'template/after_login/header_teacher';
	const HEADER_STUDENT_VIEW = 'template/after_login/header_student';
	const SIDEBAR_ADMIN_VIEW = 'template/after_login/sidebar_admin';
	const SIDEBAR_TEACHER_VIEW = 'template/after_login/sidebar_teacher';
	const SIDEBAR_STUDENT_VIEW = 'template/after_login/sidebar_student';
	const FOOTER_COMMON_VIEW = 'template/after_login/footer';

	/**
	 * @var string|\View
	 */
	public $template = 'template/after_login/template';
	/**
	 * @var \Auth\Auth_Driver|Auth_Login_Studentauth|Auth_Login_Teacherauth $authentication
	 */
	private $authentication = null;

	public function before()
	{
		parent::before();

		if(Input::is_ajax())
		{
			if(!Auth::check())
			{
				throw new HttpNotFoundException;
			}
		}
		else
		{
			(Auth::check()) or Response::redirect('auth/slogin');

			list($this->authentication) = array_values(Auth::verified());

			$user_info = array(
				'user_number'    => $this->get_user_number(),
				'full_name'      => $this->get_full_name(),
				'full_name_kana' => $this->get_full_name_kana(),
				'email'          => $this->get_email(),
				'body_skin'      => 'skin-blue',
			);

			/* ログインしているユーザ別にテンプレートを設定 */
			if ($this->is_admin())
			{
				$this->template->header = View::forge(self::HEADER_ADMIN_VIEW);
				$this->template->sidebar = View::forge(self::SIDEBAR_ADMIN_VIEW);
				$user_info['body_skin'] = 'skin-yellow';

			}
			elseif ($this->is_teacher())
			{
				$this->template->header = View::forge(self::HEADER_TEACHER_VIEW);
				$this->template->sidebar = View::forge(self::SIDEBAR_TEACHER_VIEW);
				$user_info['body_skin'] = 'skin-red';
			}
			elseif ($this->is_student())
			{
				$this->template->header = View::forge(self::HEADER_STUDENT_VIEW);
				$this->template->sidebar = View::forge(self::SIDEBAR_STUDENT_VIEW);
			}

			$this->template->footer  = View::forge(self::FOOTER_COMMON_VIEW);
			$this->template->set_global('user_info', $user_info);
		}
	}

	/**
	 * ログインしているユーザが学生ならばtrue
	 * @return bool
	 */
	public function is_student()
	{
		return ($this->authentication->get_id() === 'studentauth') ? true : false;
	}

	/**
	 * ログインしているユーザが教員ならばtrue
	 * @return bool
	 */
	public function is_teacher()
	{
		return ($this->authentication->get_id() === 'teacherauth') ? true : false;
	}

	/**
	 * ログインしているユーザが管理者ならばtrue
	 * @return bool
	 */
	public function is_admin()
	{
		if(!$this->is_teacher())
		{
			return false;
		}

		return ($this->authentication->has_access('admin.ok')) ? true : false;
	}

	/**
	 * ログインしているユーザのIDを返す
	 * @return string
	 */
	public function get_id()
	{
		return $this->authentication->get('id');
	}

	/**
	 * ログインしているユーザの学籍番号または教員番号を返す
	 * @return string
	 */
	public function get_user_number()
	{
		return $this->authentication->get('username');
	}

	/**
	 * ログインしているユーザのフルネームを返す
	 * @return string
	 */
	public function get_full_name()
	{
		return $this->authentication->get('last_name') . ' ' .$this->authentication->get('first_name');
	}

	/**
	 * ログインしているユーザのフルネーム(フリガナ)を返す
	 * @return string
	 */
	public function get_full_name_kana()
	{
		return $this->authentication->get('last_name_kana') . ' ' . $this->authentication->get('first_name_kana');
	}

	/**
	 * ログインしているユーザのメールアドレスを返す
	 * @return string
	 */
	public function get_email()
	{
		return $this->authentication->get('email');
	}

}