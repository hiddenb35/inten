<?php

class Controller_Setting extends Controller_Loggedin
{

	public function action_pass_update()
	{
		$title = 'パスワード変更';

		if(Input::is_post())
		{
			list($auth) = array_values(Auth::verified());

			$val = Validation::forge();

			// todo 現在のパスワードの検証
			$val->add('current_password', '現在のパスワード')
			    ->add_rule('required');
			$val->add('new_password', '新規パスワード')
			    ->add_rule('required')
			    ->add_rule('min_length', 4)
			    ->add_rule('max_length', 255);
			$val->add('new_password_confirm', '新規パスワード(確認)')
			    ->add_rule('required')
			    ->add_rule('match_field', 'new_password');

			if($val->run())
			{
				// todo 実際のパスワード変更処理
				$title = 'パスワードを変更しました';
			}
			else
			{
				// todo viewへのエラーメッセージのセット
				$title = 'パスワード変更エラー';
			}
		}

		$this->template->title = $title;
		$this->template->content = View::forge('auth/pass_update');
	}
}