<?php

namespace Fuel\Tasks;

class Provider
{
	public static function run()
	{
		self::delete();

		/* カレッジ */
		$college_lists = array('ITカレッジ', 'クリエイターズカレッジ', 'ミュージックカレッジ', 'テクノロジーカレッジ', 'デザインカレッジ', '医療カレッジ');
		$query         = \DB::insert('college')->columns(array('name', 'created_at', 'updated_at'));
		foreach ($college_lists as $college)
		{
			$query->values(array($college, time(), 0));
		}
		$query->execute();

		/* 学科 */
		$course_lists = array(
			// ITカレッジ
			array('code' => 'IS', 'name' => 'ITスペシャリスト科', 'year_system' => 4, 'college_id' => 1),
			array('code' => 'CD', 'name' => '情報処理科', 'year_system' => 2, 'college_id' => 1),
			array('code' => 'NT', 'name' => 'パソコン・ネットワーク科', 'year_system' => 2, 'college_id' => 1),
			array('code' => 'J2', 'name' => '情報ビジネス科', 'year_system' => 2, 'college_id' => 1),
			// クリエイターズカレッジ
			array('code' => 'BD', 'name' => '放送・映画科', 'year_system' => 2, 'college_id' => 2),
			array('code' => 'AD', 'name' => '声優・俳優科', 'year_system' => 2, 'college_id' => 2),
			array('code' => 'SA', 'name' => 'マンガ・アニメーション科', 'year_system' => 2, 'college_id' => 2),
			array('code' => 'GS', 'name' => 'ゲームクリエイター科', 'year_system' => 2, 'college_id' => 2),
			array('code' => 'CG', 'name' => 'CGクリエイター科', 'year_system' => 2, 'college_id' => 2),
			array('code' => 'L4', 'name' => 'クリエイティブラボ科', 'year_system' => 2, 'college_id' => 2),
			// ミュージックカレッジ
			array('code' => 'MU', 'name' => 'ミュージックアーティスト科', 'year_system' => 2, 'college_id' => 3),
			array('code' => 'CE', 'name' => 'コンサート・イベント科', 'year_system' => 2, 'college_id' => 3),
			array('code' => 'MD', 'name' => 'レコーディングクリエイター科', 'year_system' => 2, 'college_id' => 3),
			array('code' => 'DP', 'name' => 'ダンスパフォーマンス科', 'year_system' => 2, 'college_id' => 3),
			// テクノロジーカレッジ
			array('code' => 'E2', 'name' => '電子・電気科', 'year_system' => 2, 'college_id' => 4),
			array('code' => 'ID', 'name' => 'CAD設計製図科', 'year_system' => 2, 'college_id' => 4),
			array('code' => 'B2', 'name' => '環境・バイオ科', 'year_system' => 2, 'college_id' => 4),
			array('code' => 'UB', 'name' => '建築設計科', 'year_system' => 2, 'college_id' => 4),
			array('code' => 'U4', 'name' => '建築学科', 'year_system' => 2, 'college_id' => 4),
			// デザインカレッジ
			array('code' => 'MA', 'name' => 'グラフィックデザイン科', 'year_system' => 2, 'college_id' => 5),
			array('code' => 'WB', 'name' => 'Webデザイン科', 'year_system' => 2, 'college_id' => 5),
			array('code' => 'D1', 'name' => 'インテリアデザイン科', 'year_system' => 2, 'college_id' => 5),
			array('code' => 'D2', 'name' => 'プロダクトデザイン科', 'year_system' => 2, 'college_id' => 5),
			// 医療カレッジ
			array('code' => 'X1', 'name' => '臨床工学専攻科一年制', 'year_system' => 1, 'college_id' => 6),
			array('code' => 'M1', 'name' => '医療秘書・事務科', 'year_system' => 2, 'college_id' => 6),
			array('code' => 'M3', 'name' => '診療情報管理士科', 'year_system' => 2, 'college_id' => 6),
		);
		$query = \DB::insert('course')->columns(array('code','name','year_system','created_at','updated_at','college_id'));
		foreach($course_lists as $course)
		{
			$query->values(array($course['code'], $course['name'], $course['year_system'], time(), 0, $course['college_id']));
		}
		$query->execute();

		/* 教員 */
		\Auth::instance('teacherauth')->create_teacher('00000', 'pass', '1999/12/12', 'teacher@teacher.com', 0, '太郎',
			'タロウ', '教員', 'キョウイン', 1);

		\Auth::instance('teacherauth')->create_teacher('charge', 'pass', '1999/12/12', 'charge@charge.com', 0, '太郎',
			'タロウ', '担任', 'タンニン', 5);

		\Auth::instance('teacherauth')->create_teacher('admin', 'pass', '1999/12/12', 'admin@admin.com', 0, 'Admin',
			'Admin', 'Admin', 'Admin', 10);
		/* クラス */
		\DB::insert('class')->columns(array('name','created_at','updated_at','course_id','teacher_id'))
		   ->values(array('IS-07',time(),0,1,1))
		   ->execute();

		/* 専攻 */
		\DB::insert('major')->columns(array('name', 'created_at', 'updated_at', 'course_id'))
		   ->values(array('システム専攻', time(), 0, 1))
		   ->values(array('Web専攻', time(), 0, 1))
		   ->values(array('組み込み専攻', time(), 0, 1))
		   ->values(array('ネットワーク専攻', time(), 0, 1))
		   ->values(array('セキュリティ専攻', time(), 0, 1))
		   ->execute();

		/* 生徒 */
		\Auth::instance('studentauth')
		     ->create_student('k013c1129','watanabe','1994/9/3','ywatanabeznzt@gmail.com',0,'優樹','ユウキ',
			     '渡辺','ワタナベ',1);
		\Auth::instance('studentauth')
		     ->create_student('k013c1112','narumi','1994/10/13','k013c1112@it-neec.jp',0,'翔太','ショウタ',
			     '鳴海','ナルミ',1);
		\Auth::instance('studentauth')
		     ->create_student('k013c1345','kasai','1994/12/30','k013c1345@it-neec.jp',0,'啓太','ケイタ',
			     '笠井','カサイ',1);
		\Auth::instance('studentauth')
		     ->create_student('k013c1140','kato','1994/10/12','k013c1140@it-neec.jp',0,'拓磨','タクマ',
			     '加藤','カトウ',1);
		\Auth::instance('studentauth')
		     ->create_student('k013c1118','ashizawa','1993/5/25','k013c1118@it-neec.jp',0,'勇輝','ユウキ',
			     '芦沢','アシザワ',1);


		/* 授業 */
		\DB::insert('lesson')
		   ->columns(array('name','term','sum_credit','created_at','updated_at','class_id'))
		   ->values(array('資格対策講座',0,40,time(),0,1))
		   ->execute();

		\DB::insert('lesson')
		   ->columns(array('name','term','sum_credit','created_at','updated_at','class_id'))
		   ->values(array('C言語プログラミング',0,60,time(),0,1))
		   ->execute();

		\DB::insert('lesson')
		   ->columns(array('name','term','sum_credit','created_at','updated_at','class_id'))
		   ->values(array('経営科学',0,34,time(),0,1))
		   ->execute();

		\DB::insert('lesson')
		   ->columns(array('name','term','sum_credit','created_at','updated_at','class_id'))
		   ->values(array('Javaプログラミング',0,62,time(),0,1))
		   ->execute();

		\DB::insert('lesson')
		   ->columns(array('name','term','sum_credit','created_at','updated_at','class_id'))
		   ->values(array('Linux実習',0,55,time(),0,1))
		   ->execute();

		/* 授業割り当て */
		\DB::insert('attachment_lesson')->columns(array('teacher_id','lesson_id'))
		   ->values(array(1,1))->execute();
		\DB::insert('attachment_lesson')->columns(array('teacher_id','lesson_id'))
		   ->values(array(1,2))->execute();
		\DB::insert('attachment_lesson')->columns(array('teacher_id','lesson_id'))
		   ->values(array(1,3))->execute();
		\DB::insert('attachment_lesson')->columns(array('teacher_id','lesson_id'))
		   ->values(array(1,4))->execute();

	}

	public static function delete()
	{
		$tables = array(
			'timetable',
			'attendance',
			'attachment_lesson',
			'lesson',
			'student',
			'major',
			'class',
			'teacher',
			'course',
			'college',
		);

		foreach($tables as $table)
		{
			\DB::delete($table)->execute();

			$sql = "ALTER TABLE {$table} AUTO_INCREMENT = 1";
			\DB::query($sql)->execute();
		}
	}
}