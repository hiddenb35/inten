<?php

class Exvalidation
{
	public static function _validation_unique($val, $table, $field, $id = null)
	{
		if(isset($id))
		{
			$result = DB::select("'$field'")->where($field, '=' , $val)
				->and_where('id' , '<>', $id)->from($table)->execute();
		}
		else
		{
			$result = DB::select("'$field'")->where($field, '=', $val)->from($table)->execute();
		}

		return ($result->count() > 0) ? false : true;
	}

	public static function _validation_exist_id($val, $table)
	{
		$result = DB::select("'id'")
			->where('id', '=', $val)
			->from($table)->execute();

		return ($result->count() > 0) ? true : false;
	}
}