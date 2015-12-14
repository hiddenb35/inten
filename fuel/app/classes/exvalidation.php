<?php

class Exvalidation
{
	/*
	 * $valの値が$tableテーブルの$fieldフィールド内で$idを除きユニークであるか
	 */
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

	/*
	 * $valの値が$tableのIDフィールドに存在するか
	 */
	public static function _validation_exist_id($val, $table)
	{
		$result = DB::select("'id'")
			->where('id', '=', $val)
			->from($table)->execute();

		return ($result->count() > 0) ? true : false;
	}

	/*
	 * $valが時間割JSONデータとして正しいか
	 */
	public static function _validation_timetable_json($val)
	{
		$json = json_decode($val, true);

		if(is_null($json)) {
			return false;
		}

		foreach($json as $row) {
			if(count($row) !== 5) {
				return false;
			}
		}

		return true;
	}

	/*
	 * $valが配列として正しいか
	 */
	public static function _validation_valid_array($val)
	{
		return (is_array($val));
	}

	/*
	 * $valが時限の配列として正しいか
	 */
	public static function _validation_time_periods($val)
	{
		if(!is_array($val))
		{
			return false;
		}

		foreach($val as $v)
		{
			if(!is_numeric($v) || $v < 1 || $v > 8)
			{
				return false;
			}
		}

		return true;
	}

	/*
	 * $valが出席情報の配列として正しいか
	 */
	public static function _validation_attendance($val)
	{
		if(!is_array($val))
		{
			return false;
		}

		foreach($val as $v)
		{
			if($v['status'] < 1 || $v['status'] > 4)
			{
				return false;
			}

			if(!self::_validation_exist_id($v['student_id'], 'student'))
			{
				return false;
			}
		}

		return true;
	}


}