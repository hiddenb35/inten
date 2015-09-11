<?php

/**
 * Class Controller_Based
 * ベースとなる継承用のコントローラ
 */
Class Controller_Based extends Controller_Template
{
	public function before()
	{
		$this->template->header  = View::forge('parts/header');
		$this->template->sidebar = View::forge('parts/sidebar');
		$this->template->footer  = View::forge('parts/footer');
	}
}