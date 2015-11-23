<?php
// todo 現在の時間帯の授業を表すクラス(active等)の付与
class Timetable
{
	const MONDAY = 1;
	const TUESDAY = 2;
	const WEDNESDAY = 3;
	const THURSDAY = 4;
	const FRIDAY = 5;

	private static function get_today()
	{
		$datetime = new DateTime();
		return (int)$datetime->format('w');
	}

	private static function get_now()
	{
		$dates = array(
			1 => array('start' => '9:00',  'end' => '9:50'),
			2 => array('start' => '10:00', 'end' => '10:50'),
			3 => array('start' => '11:00', 'end' => '11:50'),
			4 => array('start' => '12:00', 'end' => '12:50'),
			5 => array('start' => '13:00', 'end' => '13:50'),
			6 => array('start' => '14:00', 'end' => '14:50'),
			7 => array('start' => '15:00', 'end' => '15:50'),
			8 => array('start' => '16:00', 'end' => '16:50'),
		);

		$now = date('H:i');

		foreach($dates as $key => $span)
		{
			if(($now >= $span['start']) && ($now <= $span['end']))
			{
				return $key;
			}
		}

		return false;

	}
	public static function generate($timetable)
	{
		$array = array();
		for($i = self::MONDAY; $i <= self::FRIDAY; $i++)
		{
			if(self::get_today() === $i)
			{
				$array[$i] = ' today';
			}
			else
			{
				$array[$i] = '';
			}
		}

		$table ='<table class="table table-bordered table-responsive table-striped">';
		$table .= '<thead>';
		$table .= '<tr class="bg-primary">';
		$table .= '<th class="text-center">#</th>';
		$table .= '<th class="text-center' . $array[self::MONDAY] . '">月曜日</th>';
		$table .= '<th class="text-center' . $array[self::TUESDAY] . '">火曜日</th>';
		$table .= '<th class="text-center' . $array[self::THURSDAY] . '">水曜日</th>';
		$table .= '<th class="text-center' . $array[self::WEDNESDAY] . '">木曜日</th>';
		$table .= '<th class="text-center' . $array[self::FRIDAY] . '">金曜日</th>';
		$table .= '</tr>';
		$table .= '</thead>';
		$table .= self::get_body($timetable);
		$table .= '</table>';
		return $table;

	}

	private static function get_body($timetable)
	{
		$body = '<tbody>';
		$span = array(
			array('name' => '1時限目', 'term' => '9:00-9:50'),
			array('name' => '2時限目', 'term' => '10:00-10:50'),
			array('name' => '3時限目', 'term' => '11:00-11:50'),
			array('name' => '4時限目', 'term' => '12:00-12:50'),
			array('name' => '5時限目', 'term' => '13:00-13:50'),
			array('name' => '6時限目', 'term' => '14:00-14:50'),
			array('name' => '7時限目', 'term' => '15:00-15:50'),
			array('name' => '8時限目', 'term' => '16:00-16:50'),
		);

		foreach($timetable as $index => $row)
		{
			$body .= '<tr><th class="text-center bg-info"><span>' . $span[$index]['name'] . '</span><br>' . $span[$index]['term'] . '</th>';
			foreach($row as $key => $cell)
			{
				$subject = (isset($cell['lesson_id'])) ? Model_Lesson::find($cell['lesson_id'])->name : '';
				$teachers = array();
				if(isset($cell['lesson_id']))
				{
					foreach(Model_Lesson::find($cell['lesson_id'])->attachment_lessons as $attach)
					{
						$teachers[] = $attach->teacher->last_name . ' ' . $attach->teacher->first_name;
					}
				}
				$lesson_id = (isset($cell['lesson_id'])) ? $cell['lesson_id'] : '';
				$teacher = (isset($cell['lesson_id'])) ? implode(',', $teachers) : '';
				$room_number = (isset($cell['room_number'])) ? $cell['room_number'] : '';
				$notes = (isset($cell['notes'])) ? $cell['notes'] : '';

				if((($key + 1) === self::get_today()) && ($index + 1) === self::get_now())
				{
					$td_class = ' today now';
				}
				elseif((($key + 1) === self::get_today()))
				{
					$td_class = ' today';
				}
				else
				{
					$td_class = '';
				}
				$body .= sprintf('
				<td class="text-center%s" data-lesson-id="%s">
					<p class="subject">%s</p>
					<p class="teacher">%s</p>
					<p class="classroom">%s</p>
					<p class="note">%s</p><span class="badge bg-green">備考あり</span>
				</td>
				', $td_class, $lesson_id, $subject, $teacher, $room_number, $notes);
			}
			$body .= '</tr>';
		}

		$body .= '</tbody>';

		return $body;
	}
}