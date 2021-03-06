<?php

class Model_Attendance extends \Orm\Model
{
	protected static $_table_name = 'attendance';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'date' => array(
			'data_type' => 'date',
		),
		'time_period' => array(
			'data_type' => 'int',
		),
		'teacher_id' => array(
			'data_type' => 'int',
		),
		'lesson_id' => array(
			'data_type' => 'int',
		),
		'created_at' => array(
			'data_type' => 'int',
		),
		'updated_at' => array(
			'data_type' => 'int',
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
			'property' => 'created_at',
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
			'property' => 'updated_at',
		),
		'Orm\Observer_Typing' => array(
			'events' => array('before_save', 'after_save', 'after_load')
		),
	);

	protected static $_belongs_to = array(
		'teacher' => array(
			'model_to' => 'Model_Teacher',
			'key_from' => 'teacher_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'lesson' => array(
			'model_to' => 'Model_Lesson',
			'key_from' => 'lesson_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	protected static $_has_many = array(
		'attendance_statuses' => array(
			'model_to' => 'Model_Status',
			'key_form' => 'id',
			'key_to' => 'attendance_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('date', '出席日時', 'required')->add_rule('valid_date', 'Y-m-d');
		$val->add_field('time_periods', '時限', 'required|time_periods')->set_error_message('required', ':label を選択してください。');
		// 複数項目を元にバリデーションのためクロージャを使用
		$date = Input::post('date');
		$time_periods = Input::post('time_periods');
		$lesson_id = Input::post('lesson_id');
		$val->add_field('attendance', '出席情報', 'required|attendance')->add_rule(function () use ($date, $time_periods, $lesson_id)
		{
			if(is_null($date) || is_null($time_periods) || is_null($lesson_id))
			{
				// この項目が存在しない場合は他のバリデーションでエラーするためここではtrueを返却
				return true;
			}

			$result = Exvalidation::_validation_unique_set(array(
				'date' => $date,
				'time_period' => $time_periods,
				'lesson_id' => $lesson_id
			), 'attendance');

			if(!$result)
			{
				Validation::active()->set_message('closure', '既に登録されている出席情報です。');
				return false;
			}

			return true;
		});
		$val->add_field('lesson_id','授業ID','required|max_length[10]')->add_rule('exist_id', 'lesson');

		return $val;
	}
}