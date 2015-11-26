<?php

class Model_Attachment extends \Orm\Model
{
	protected static $_table_name = 'attachment_lesson';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'teacher_id' => array(
			'data_type' => 'int',
		),
		'lesson_id' => array(
			'data_type' => 'int',
		),
	);

	protected static $_belongs_to = array(
		'lesson' => array(
			'model_to' => 'Model_Lesson',
			'key_from' => 'lesson_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'teacher' => array(
			'model_to' => 'Model_Teacher',
			'key_from' => 'teacher_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	protected static $_observers = array(
		'Orm\Observer_Typing' => array(
			'events' => array('before_save', 'after_save', 'after_load')
		),
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('teacher_id','教員ID','required|max_length[10]')->add_rule('exist_id', 'teacher');
		$val->add_field('lesson_id','授業ID','required|max_length[10]')->add_rule('exist_id', 'lesson');
		return $val;
	}

	public static function to_lists($attachment_lessons, $link = null)
	{
		$lists = array();
		foreach($attachment_lessons as $attachment)
		{
			$array = self::to_list($attachment);
			if(!is_null($link))
			{
				$array['link_url'] = Uri::create($link, array(), array('lesson_id' => $attachment->lesson->id));
			}
			$lists[] = $array;
		}
		return $lists;
	}


	public static function to_list($attachment)
	{
		$list = array();

		$list['name'] = $attachment->lesson->name;
		$list['class_name'] = $attachment->lesson->class->name;

		return $list;
	}

}