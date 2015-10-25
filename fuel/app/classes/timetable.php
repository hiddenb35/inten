<?php
// todo 現在の時間帯の授業を表すクラス(active等)の付与
class Timetable
{
	public static function generate($timetable)
	{
		$table ='
		<table class="table table-bordered table-responsive table-striped">
			<thead>
				<tr class="bg-primary">
					<th class="text-center">#</th>
					<th class="text-center">月曜日</th>
					<th class="text-center">火曜日</th>
					<th class="text-center">水曜日</th>
					<th class="text-center">木曜日</th>
					<th class="text-center">金曜日</th>
				</tr>
			</thead>';
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
			foreach($row as $cell)
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
				$teacher = (isset($cell['lesson_id'])) ? implode(',', $teachers) : '';
				$room_number = (isset($cell['room_number'])) ? $cell['room_number'] : '';
				$notes = (isset($cell['notes'])) ? $cell['notes'] : '';

				$body .= sprintf('
				<td class="text-center">
					<p class="subject">%s</p>
					<p class="teacher">%s</p>
					<p class="classroom">%s</p>
					<p class="note">%s</p><span class="badge bg-green">備考あり</span>
				</td>
				', $subject, $teacher, $room_number, $notes);
			}
			$body .= '</tr>';
		}

		$body .= '</tbody>';

		return $body;
	}
}