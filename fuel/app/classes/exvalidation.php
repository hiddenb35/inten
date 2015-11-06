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


}