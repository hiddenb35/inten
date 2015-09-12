<?php

Class Controller_Viewtest extends Controller_Based
{
	public function router($action, $params)
	{
		try
		{
			$view = View::forge('tests/' . $action);
		} catch (Exception $e)
		{
			throw new HttpNotFoundException;
		}

		$this->template->header->set('title', 'ViewTest');
		$this->template->content = $view;
	}
}