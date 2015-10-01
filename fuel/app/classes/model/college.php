<?php

class Model_College extends \Orm\Model
{
	protected static $_table_name = 'college';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'name' => array(
			'data_type' => 'varchar',
		),
		'created_at' => array(
			'data_type' => 'int'
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
	);

	protected static $_has_many = array(
		'courses' => array(
			'model_to' => 'Model_Course',
			'key_from' => 'id',
			'key_to' => 'college_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('name','カレッジ名','trim|required|max_length[64]')->add_rule('unique', 'college', 'name');
		return $val;
	}

	public static function to_list($colleges)
	{
		$lists = array();

		foreach($colleges as $college)
		{
			$array = array();
			$course_sum = count($college->courses);
			$major_sum = 0;
			$class_sum = 0;
			foreach($college->courses as $course)
			{
				$major_sum += count($course->majors);
				$class_sum += count($course->classes);
			}
			$array['id'] = $college['id'];
			$array['name'] = $college['name'];
			$array['course_sum'] = $course_sum;
			$array['class_sum'] = $class_sum;
			$array['major_sum'] = $major_sum;
			$array['created_at'] = $college['created_at'];
			$array['updated_at'] = $college['updated_at'];

			$lists[] = $array;
		}

		return $lists;
	}
}