<?php

class Exvalidation
{
	public static function _validation_unique($val, $table, $field)
	{
		$result = DB::select("'$field'")
			->where($field, '=', $val)
			->from($table)->execute();

		return ($result->count() > 0) ? false : true;
	}
}