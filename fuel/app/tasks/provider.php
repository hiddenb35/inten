<?php

namespace Fuel\Tasks;

class Provider
{
	public static function run()
	{
		self::delete();

		/* カレッジ */
		\DB::insert('college')->columns(array('name','created_at','updated_at'))
		   ->values(array('ITカレッジ'           , time(), 0))
		   ->values(array('クリエイターズカレッジ', time(), 0))
		   ->values(array('ミュージックカレッジ'  , time(), 0))
		   ->values(array('テクノロジーカレッジ'  , time(), 0))
		   ->values(array('デザインカレッジ'      , time(), 0))
		   ->values(array('医療カレッジ'          , time(), 0))
		   ->execute();

		/* 学科 */
		\DB::insert('course')->columns(array('code','name','year_system','created_at','updated_at','college_id'))
		   ->values(array('IS', 'ITスペシャリスト科'      , 4, time(), 0, 1))
		   ->values(array('CD', '情報処理科'              , 2, time(), 0, 1))
		   ->values(array('NT', 'パソコン・ネットワーク科' , 2, time(), 0, 1))
		   ->values(array('J2', '情報ビジネス科'          , 2, time(), 0, 1))

		   ->values(array('BD', '放送・映画科',            2, time(), 0, 2))
		   ->values(array('AD', '声優・俳優科',            2, time(), 0, 2))
		   ->values(array('SA', 'マンガ・アニメーション科', 2, time(), 0, 2))
		   ->values(array('GS', 'ゲームクリエイター科',     2, time(), 0, 2))
		   ->values(array('CG', 'CGクリエイター科',         2, time(), 0, 2))
		   ->values(array('L4', 'クリエイティブラボ科',     2, time(), 0, 2))

		   ->values(array('MU', 'ミュージックアーティスト科',   2, time(), 0, 3))
		   ->values(array('CE', 'コンサート・イベント科',       2, time(), 0, 3))
		   ->values(array('MD', 'レコーディングクリエイター科', 2, time(), 0, 3))
		   ->values(array('DP', 'ダンスパフォーマンス科',       2, time(), 0, 3))

		   ->values(array('E2', '電子・電気科',   2, time(), 0, 4))
		   ->values(array('ID', 'CAD設計製図科',  2, time(), 0, 4))
		   ->values(array('B2', '環境・バイオ科', 2, time(), 0, 4))
		   ->values(array('UB', '建築設計科',     2, time(), 0, 4))
		   ->values(array('U4', '建築学科',       2, time(), 0, 4))

			->values(array('MA', 'グラフィックデザイン科',  2, time(), 0, 5))
			->values(array('WB', 'Webデザイン科',          2, time(), 0, 5))
			->values(array('D1', 'インテリアデザイン科',    2, time(), 0, 5))
			->values(array('D2', 'プロダクトデザイン科',    2, time(), 0, 5))

			->values(array('X1', '臨床工学専攻科一年制', 2, time(), 0, 6))
			->values(array('M1', '医療秘書・事務科',     2, time(), 0, 6))
			->values(array('M3', '診療情報管理士科',     2, time(), 0, 6))
			->execute();

		/* クラス */
		\DB::insert('class')->columns(array('name','created_at','updated_at','course_id'))
		   ->values(array('IS-07',time(),0,1))
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

		/* 教員 */
		\Auth::instance('teacherauth')->create_teacher('teacher', 'pass', '1999/12/12', 'test@test.com', 0, '太郎',
			'タロウ', '教員', 'キョウイン', 1);

		\Auth::instance('teacherauth')->create_teacher('charge', 'pass', '1999/12/12', 'test@test.com', 0, '太郎',
			'タロウ', '担任', 'タンニン', 5);

		\Auth::instance('teacherauth')->create_teacher('admin', 'pass', '1999/12/12', 'test@test.com', 0, 'Admin',
			'Admin', 'Admin', 'Admin', 10);

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
			'teacher',
			'student',
			'major',
			'class',
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