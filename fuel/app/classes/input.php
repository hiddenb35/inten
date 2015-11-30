<?php

class Input extends Fuel\Core\Input
{
	/**
	 * HTTPリクエストがPOSTならばtrue
	 * @return bool
	 */
	public static function is_post()
	{
		return (self::method() === 'POST') ? true : false;
	}
}