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
			$query->values(array($college, time(), null));
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
			$query->values(array($course['code'], $course['name'], $course['year_system'], time(), null, $course['college_id']));
		}
		$query->execute();

		/* 教員 */
		$student_lists = array(
			array('username' => '00001', 'email' => '00001@test.jp', 'gender' => 1, 'f_name' => '士郎', 'f_name_k' => 'シロウ', 'l_name' => '相田', 'l_name_k' => 'アイダ'),
			array('username' => '00002', 'email' => '00002@test.jp', 'gender' => 1, 'f_name' => '弘樹', 'f_name_k' => 'ヒロキ', 'l_name' => '井上', 'l_name_k' => 'イノウエ'),
			array('username' => '00003', 'email' => '00003@test.jp', 'gender' => 1, 'f_name' => '博人', 'f_name_k' => 'ヒロト', 'l_name' => '宇野', 'l_name_k' => 'ウノ'),
			array('username' => '00004', 'email' => '00004@test.jp', 'gender' => 1, 'f_name' => '光輝', 'f_name_k' => 'コウキ', 'l_name' => '榎田', 'l_name_k' => 'エノダ'),
			array('username' => '00005', 'email' => '00005@test.jp', 'gender' => 1, 'f_name' => '健太郎', 'f_name_k' => 'ケンタロウ', 'l_name' => '大野田', 'l_name_k' => 'オオノダ'),
			array('username' => '00006', 'email' => '00006@test.jp', 'gender' => 2, 'f_name' => '夏樹', 'f_name_k' => 'ナツキ', 'l_name' => '加納', 'l_name_k' => 'カノウ'),
			array('username' => '00007', 'email' => '00007@test.jp', 'gender' => 2, 'f_name' => '愛晶', 'f_name_k' => 'アキ', 'l_name' => '木村', 'l_name_k' => 'キムラ'),
			array('username' => '00008', 'email' => '00008@test.jp', 'gender' => 2, 'f_name' => '香', 'f_name_k' => 'カオリ', 'l_name' => '九条', 'l_name_k' => 'クジョウ'),
			array('username' => '00009', 'email' => '00009@test.jp', 'gender' => 2, 'f_name' => '彩', 'f_name_k' => 'サヤカ', 'l_name' => '剣持', 'l_name_k' => 'ケンモチ'),
			array('username' => '00010', 'email' => '00010@test.jp', 'gender' => 2, 'f_name' => '翼', 'f_name_k' => 'ツバサ', 'l_name' => '小梅', 'l_name_k' => 'コウメ'),
		);

		\Auth::instance('teacherauth')->create_teacher('admin', 'pass', '1999/12/12', 'admin@admin.jp', 0,
			'admin', 'admin', 'admin', 'admin', 10);
		foreach($student_lists as $student)
		{
			\Auth::instance('teacherauth')->create_teacher($student['username'], 'pass', '1999/12/12', $student['email'], $student['gender'],
				$student['f_name'], $student['f_name_k'], $student['l_name'], $student['l_name_k'], 1);
		}

		/* クラス */
		$class_lists = array(
			array('name' => 'IS07-1', 'course_id' => 1, 'teacher_id' => 2),
			array('name' => 'IS07-2', 'course_id' => 1, 'teacher_id' => 3),
			array('name' => 'GS09-1', 'course_id' => 8, 'teacher_id' => 4),
			array('name' => 'CG09-1', 'course_id' => 9, 'teacher_id' => 4),
			array('name' => 'MU02-1', 'course_id' => 11, 'teacher_id' => 5),
			array('name' => 'MU02-2', 'course_id' => 11, 'teacher_id' => 6),
			array('name' => 'ID01-1', 'course_id' => 16, 'teacher_id' => 7),
			array('name' => 'B203-1', 'course_id' => 17, 'teacher_id' => 7),
			array('name' => 'UB03-1', 'course_id' => 18, 'teacher_id' => 7),
			array('name' => 'WB04-1', 'course_id' => 21, 'teacher_id' => 8),
			array('name' => 'X105-1', 'course_id' => 24, 'teacher_id' => 9),
			array('name' => 'M106-1', 'course_id' => 25, 'teacher_id' => 10),
		);

		$query = \DB::insert('class')->columns(array('name','created_at','updated_at','course_id','teacher_id'));
		foreach($class_lists as $class)
		{
			$query->values(array($class['name'], time(), null, $class['course_id'], $class['teacher_id']));
		}
		$query->execute();

		/* 専攻 */
		$major_lists = array(
			// ITスペシャリスト科
			array('name' => 'システム専攻', 'course_id' => 1),
			array('name' => 'Web専攻', 'course_id' => 1),
			array('name' => '組み込み専攻', 'course_id' => 1),
			array('name' => 'ネットワーク専攻', 'course_id' => 1),
			array('name' => 'セキュリティ専攻', 'course_id' => 1),
			// ゲームクリエイター科
			array('name' => 'ゲームプログラミング専攻', 'course_id' => 8),
			array('name' => 'ゲームプランニング専攻', 'course_id' => 8),
			// コンサート・イベント科
			array('name' => 'プロモーター専攻', 'course_id' => 12),
			array('name' => 'マネージャー専攻', 'course_id' => 12),
			array('name' => 'ライブハウススタッフ専攻', 'course_id' => 12),
			array('name' => 'ファンクラブスタッフ専攻', 'course_id' => 12),
			array('name' => 'コンサートPA専攻', 'course_id' => 12),
			array('name' => 'ライブハウスPA専攻', 'course_id' => 12),

		);
		$query = \DB::insert('major')->columns(array('name', 'created_at', 'updated_at', 'course_id'));
		foreach($major_lists as $major)
		{
			$query->values(array($major['name'], time(), null, $major['course_id']));
		}
		$query->execute();

		/* 生徒 */
		$student_lists = array(
			array('username' => 'k013c1112', 'pass' => 'narumi', 'date' => '1994/10/13', 'email' => 'k013c1112@it-neec.jp', 'f_name' => '翔太', 'f_name_k' => 'ショウタ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ'),
			array('username' => 'k013c1113', 'pass' => 'pass', 'date' => '1994/10/13', 'email' => 'k013c1113@student.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ'),
			array('username' => 'k013c1114', 'pass' => 'pass', 'date' => '1994/10/13', 'email' => 'k013c1114@student.jp', 'f_name' => '二郎', 'f_name_k' => 'ジロウ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ'),
			array('username' => 'k013c1115', 'pass' => 'pass', 'date' => '1994/10/13', 'email' => 'k013c1115@student.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ'),
			array('username' => 'k013c1116', 'pass' => 'pass', 'date' => '1994/10/13', 'email' => 'k013c1116@student.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ'),
			array('username' => 'k013c1117', 'pass' => 'pass', 'date' => '1994/10/13', 'email' => 'k013c1117@student.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ'),
			array('username' => 'k013c1118', 'pass' => 'ashizawa', 'date' => '1994/5/25', 'email' => 'k013c1118@it-neec.jp', 'f_name' => '勇輝', 'f_name_k' => 'ユウキ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1119', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1119@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1120', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1120@it-neec.jp', 'f_name' => '二郎', 'f_name_k' => 'ジロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1121', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1121@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1122', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1122@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1123', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1123@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1124', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1124@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1125', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1125@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1126', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1126@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1127', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1127@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1128', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1128@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ'),
			array('username' => 'k013c1129', 'pass' => 'watanabe', 'date' => '1994/9/3', 'email' => 'ywatanabeznzt@gmail.com', 'f_name' => '優樹', 'f_name_k' => 'ユウキ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1130', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1130@gmail.com', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1131', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1131@gmail.com', 'f_name' => '二郎', 'f_name_k' => 'ジロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1132', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1132@gmail.com', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1133', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1133@gmail.com', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1134', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1134@gmail.com', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1135', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1135@gmail.com', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1136', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1136@gmail.com', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1137', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1137@gmail.com', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1138', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1138@gmail.com', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1139', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1139@gmail.com', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ'),
			array('username' => 'k013c1140', 'pass' => 'kato', 'date' => '1994/10/12', 'email' => 'k013c1140@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '加藤', 'l_name_k' => 'カトウ'),
			array('username' => 'k013c1141', 'pass' => 'pass', 'date' => '1994/10/12', 'email' => 'k013c1141@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '加藤', 'l_name_k' => 'カトウ'),
			array('username' => 'k013c1142', 'pass' => 'pass', 'date' => '1994/10/12', 'email' => 'k013c1142@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '加藤', 'l_name_k' => 'カトウ'),
			array('username' => 'k013c1143', 'pass' => 'pass', 'date' => '1994/10/12', 'email' => 'k013c1143@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '加藤', 'l_name_k' => 'カトウ'),
			array('username' => 'k013c1144', 'pass' => 'pass', 'date' => '1994/10/12', 'email' => 'k013c1144@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '加藤', 'l_name_k' => 'カトウ'),
			array('username' => 'k013c1345', 'pass' => 'kasai', 'date' => '1994/12/30', 'email' => 'k013c1345@it-neec.jp', 'f_name' => '啓太', 'f_name_k' => 'ケイタ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
			array('username' => 'k013c1346', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1346@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
			array('username' => 'k013c1347', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1347@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
			array('username' => 'k013c1348', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1348@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
			array('username' => 'k013c1349', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1349@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
			array('username' => 'k013c1350', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1350@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
			array('username' => 'k013c1351', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1351@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
			array('username' => 'k013c1352', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1352@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
			array('username' => 'k013c1353', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1353@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
			array('username' => 'k013c1354', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1354@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
			array('username' => 'k013c1355', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1355@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ'),
		);

		foreach($student_lists as $student)
		{
			\Auth::instance('studentauth')
			     ->create_student($student['username'],$student['pass'],$student['date'],$student['email'],0,$student['f_name'],$student['f_name_k'],
				     $student['l_name'],$student['l_name_k'],1);
		}

		/* 授業 */
		$lesson_lists = array(
			array('name' => '資格対策講座', 'term' => 1, 'sum_credit' => 40, 'class_id' => 1),
			array('name' => '経営科学', 'term' => 1, 'sum_credit' => 38, 'class_id' => 1),
			array('name' => 'ビジネススキル１', 'term' => 1, 'sum_credit' => 20, 'class_id' => 1),
			array('name' => 'Webアプリケーション開発', 'term' => 1, 'sum_credit' => 22, 'class_id' => 1),
			array('name' => '企業会計', 'term' => 1, 'sum_credit' => 45, 'class_id' => 1),
			array('name' => 'キャリアデザイン', 'term' => 1, 'sum_credit' => 42, 'class_id' => 1),
			array('name' => 'プロジェクト開発実習', 'term' => 1, 'sum_credit' => 41, 'class_id' => 1),
			array('name' => 'Linux実習', 'term' => 1, 'sum_credit' => 19, 'class_id' => 1),
			array('name' => 'Cプログラミング', 'term' => 1, 'sum_credit' => 24, 'class_id' => 1),
			array('name' => 'C++言語プログラミング', 'term' => 1, 'sum_credit' => 38, 'class_id' => 1),
			array('name' => 'Javaプログラミング', 'term' => 1, 'sum_credit' => 11, 'class_id' => 1),
			array('name' => 'PHPプログラミング', 'term' => 1, 'sum_credit' => 27, 'class_id' => 1),
			array('name' => 'Perlプログラミング', 'term' => 1, 'sum_credit' => 25, 'class_id' => 1),
			array('name' => 'Rubyプログラミング', 'term' => 1, 'sum_credit' => 21, 'class_id' => 1),
			array('name' => 'Pythonプログラミング', 'term' => 1, 'sum_credit' => 39, 'class_id' => 1),
			array('name' => 'JavaScriptプログラミング', 'term' => 1, 'sum_credit' => 33, 'class_id' => 1),
		);

		$query = \DB::insert('lesson')->columns(array('name','term','sum_credit','created_at','updated_at','class_id'));
		foreach($lesson_lists as $lesson)
		{
			$query->values(array($lesson['name'], $lesson['term'], $lesson['sum_credit'], time(), null, $lesson['class_id']));
		}
		$query->execute();

		/* 授業割り当て */
		$attachment_lesson_lists = array(
			array('teacher_id' => 2, 'lesson_id' => 1),
			array('teacher_id' => 2, 'lesson_id' => 2),
			array('teacher_id' => 2, 'lesson_id' => 3),
			array('teacher_id' => 2, 'lesson_id' => 4),
			array('teacher_id' => 2, 'lesson_id' => 5),
			array('teacher_id' => 3, 'lesson_id' => 2),
			array('teacher_id' => 3, 'lesson_id' => 6),
			array('teacher_id' => 4, 'lesson_id' => 2),
			array('teacher_id' => 4, 'lesson_id' => 7),
			array('teacher_id' => 5, 'lesson_id' => 8),
			array('teacher_id' => 6, 'lesson_id' => 9),
			array('teacher_id' => 7, 'lesson_id' => 10),
			array('teacher_id' => 8, 'lesson_id' => 11),
			array('teacher_id' => 9, 'lesson_id' => 12),
			array('teacher_id' => 10, 'lesson_id' => 13),
			array('teacher_id' => 11, 'lesson_id' => 14),
			array('teacher_id' => 11, 'lesson_id' => 15),
			array('teacher_id' => 11, 'lesson_id' => 16),
		);
		$query = \DB::insert('attachment_lesson')->columns(array('teacher_id','lesson_id'));
		foreach($attachment_lesson_lists as $attachment)
		{
			$query->values(array($attachment['teacher_id'], $attachment['lesson_id']));
		}
		$query->execute();

		/* 時間割 */
		$timetable = array(
			array(
				array('lesson_id' => 1, 'room_number' => '30711', 'notes' => ''),
				array('lesson_id' => 1, 'room_number' => '30711', 'notes' => ''),
				array('lesson_id' => 1, 'room_number' => '30711', 'notes' => ''),
				array(),
				array('lesson_id' => 2, 'room_number' => '30615', 'notes' => 'PC持参'),
				array('lesson_id' => 2, 'room_number' => '30615', 'notes' => 'PC持参'),
				array('lesson_id' => 3, 'room_number' => '30705A', 'notes' => ''),
				array('lesson_id' => 3, 'room_number' => '30705A', 'notes' => ''),
			),
			array(
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array(),
				array(),
				array(),
				array(),
				array(),
			),
			array(
				array(),
				array(),
				array(),
				array(),
				array('lesson_id' => 5, 'room_number' => '30502', 'notes' => ''),
				array('lesson_id' => 5, 'room_number' => '30503', 'notes' => ''),
				array(),
				array(),
			),
			array(
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array(),
				array('lesson_id' => 6, 'room_number' => '30507', 'notes' => ''),
				array('lesson_id' => 6, 'room_number' => '30507', 'notes' => ''),
				array('lesson_id' => 6, 'room_number' => '30507', 'notes' => ''),
				array(),
			),
			array(
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
				array(),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
				array(),
			),
		);
		$query = \DB::insert('timetable')->columns(array('name','html','created_at','updated_at','is_active','class_id'));
		$query->values(array('IS07-1前期時間割', json_encode($timetable), time(), null, 1, 1));
		$query->execute();

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