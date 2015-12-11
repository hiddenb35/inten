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
			'太郎', 'タロウ', '蒲田', 'カマタ', 10);
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
			array('username' => 'k013c1112', 'pass' => 'narumi', 'date' => '1994/10/13', 'email' => 'k013c1112@it-neec.jp', 'f_name' => '翔太', 'f_name_k' => 'ショウタ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ', 'class_id' => 1),
			array('username' => 'k013c1113', 'pass' => 'pass', 'date' => '1994/10/13', 'email' => 'k013c1113@student.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ', 'class_id' => 1),
			array('username' => 'k013c1114', 'pass' => 'pass', 'date' => '1994/10/13', 'email' => 'k013c1114@student.jp', 'f_name' => '二郎', 'f_name_k' => 'ジロウ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ', 'class_id' => 1),
			array('username' => 'k013c1115', 'pass' => 'pass', 'date' => '1994/10/13', 'email' => 'k013c1115@student.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ', 'class_id' => 1),
			array('username' => 'k013c1116', 'pass' => 'pass', 'date' => '1994/10/13', 'email' => 'k013c1116@student.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ', 'class_id' => 1),
			array('username' => 'k013c1117', 'pass' => 'pass', 'date' => '1994/10/13', 'email' => 'k013c1117@student.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '鳴海', 'l_name_k' => 'ナルミ', 'class_id' => 1),
			array('username' => 'k013c1118', 'pass' => 'ashizawa', 'date' => '1994/5/25', 'email' => 'k013c1118@it-neec.jp', 'f_name' => '勇輝', 'f_name_k' => 'ユウキ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1119', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1119@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1120', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1120@it-neec.jp', 'f_name' => '二郎', 'f_name_k' => 'ジロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1121', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1121@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1122', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1122@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1123', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1123@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1124', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1124@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1125', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1125@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1126', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1126@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1127', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1127@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1128', 'pass' => 'pass', 'date' => '1994/5/25', 'email' => 'k013c1128@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '芦沢', 'l_name_k' => 'アシザワ', 'class_id' => 1),
			array('username' => 'k013c1129', 'pass' => 'watanabe', 'date' => '1994/9/3', 'email' => 'ywatanabeznzt@gmail.com', 'f_name' => '優樹', 'f_name_k' => 'ユウキ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1130', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1130@gmail.com', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1131', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1131@gmail.com', 'f_name' => '二郎', 'f_name_k' => 'ジロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1132', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1132@gmail.com', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1133', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1133@gmail.com', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1134', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1134@gmail.com', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1135', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1135@gmail.com', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1136', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1136@gmail.com', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1137', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1137@gmail.com', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1138', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1138@gmail.com', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1139', 'pass' => 'pass', 'date' => '1994/9/3', 'email' => 'k013c1139@gmail.com', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '渡辺', 'l_name_k' => 'ワタナベ', 'class_id' => 1),
			array('username' => 'k013c1140', 'pass' => 'kato', 'date' => '1994/10/12', 'email' => 'k013c1140@it-neec.jp', 'f_name' => '拓磨', 'f_name_k' => 'タクマ', 'l_name' => '加藤', 'l_name_k' => 'カトウ', 'class_id' => 1),
			array('username' => 'k013c1141', 'pass' => 'pass', 'date' => '1994/10/12', 'email' => 'k013c1141@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '加藤', 'l_name_k' => 'カトウ', 'class_id' => 1),
			array('username' => 'k013c1142', 'pass' => 'pass', 'date' => '1994/10/12', 'email' => 'k013c1142@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '加藤', 'l_name_k' => 'カトウ', 'class_id' => 1),
			array('username' => 'k013c1143', 'pass' => 'pass', 'date' => '1994/10/12', 'email' => 'k013c1143@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '加藤', 'l_name_k' => 'カトウ', 'class_id' => 1),
			array('username' => 'k013c1144', 'pass' => 'pass', 'date' => '1994/10/12', 'email' => 'k013c1144@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '加藤', 'l_name_k' => 'カトウ', 'class_id' => 1),
			array('username' => 'k013c1296', 'pass' => 'sasaki', 'date' => '1994/4/30', 'email' => 'k013c1296@it-neec.jp', 'f_name' => '佑梨', 'f_name_k' => 'ユリ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 1),
			array('username' => 'k013c1345', 'pass' => 'kasai', 'date' => '1994/12/30', 'email' => 'k013c1345@it-neec.jp', 'f_name' => '啓太', 'f_name_k' => 'ケイタ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1346', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1346@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1347', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1347@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1348', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1348@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1349', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1349@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1350', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1350@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1351', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1351@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1352', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1352@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1353', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1353@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1354', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1354@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1355', 'pass' => 'pass', 'date' => '1994/12/30', 'email' => 'k013c1355@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '笠井', 'l_name_k' => 'カサイ', 'class_id' => 1),
			array('username' => 'k013c1356', 'pass' => 'pass', 'date' => '1994/1/1', 'email' => 'k013c1356@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '武田', 'l_name_k' => 'タケダ', 'class_id' => 2),
			array('username' => 'k013c1357', 'pass' => 'pass', 'date' => '1994/1/1', 'email' => 'k013c1357@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '武田', 'l_name_k' => 'タケダ', 'class_id' => 2),
			array('username' => 'k013c1358', 'pass' => 'pass', 'date' => '1994/1/1', 'email' => 'k013c1358@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '武田', 'l_name_k' => 'タケダ', 'class_id' => 2),
			array('username' => 'k013c1359', 'pass' => 'pass', 'date' => '1994/1/1', 'email' => 'k013c1359@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '武田', 'l_name_k' => 'タケダ', 'class_id' => 2),
			array('username' => 'k013c1360', 'pass' => 'pass', 'date' => '1994/1/1', 'email' => 'k013c1360@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '武田', 'l_name_k' => 'タケダ', 'class_id' => 2),
			array('username' => 'k013c1361', 'pass' => 'pass', 'date' => '1994/1/1', 'email' => 'k013c1361@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '武田', 'l_name_k' => 'タケダ', 'class_id' => 2),
			array('username' => 'k013c1362', 'pass' => 'pass', 'date' => '1994/1/1', 'email' => 'k013c1362@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '武田', 'l_name_k' => 'タケダ', 'class_id' => 2),
			array('username' => 'k013c1363', 'pass' => 'pass', 'date' => '1994/1/1', 'email' => 'k013c1363@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '武田', 'l_name_k' => 'タケダ', 'class_id' => 2),
			array('username' => 'k013c1364', 'pass' => 'pass', 'date' => '1994/1/1', 'email' => 'k013c1364@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '武田', 'l_name_k' => 'タケダ', 'class_id' => 2),
			array('username' => 'k013c1365', 'pass' => 'pass', 'date' => '1994/1/1', 'email' => 'k013c1365@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '武田', 'l_name_k' => 'タケダ', 'class_id' => 2),
			array('username' => 'k013c1366', 'pass' => 'pass', 'date' => '1994/1/2', 'email' => 'k013c1366@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '近藤', 'l_name_k' => 'コンドウ', 'class_id' => 2),
			array('username' => 'k013c1367', 'pass' => 'pass', 'date' => '1994/1/2', 'email' => 'k013c1367@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '近藤', 'l_name_k' => 'コンドウ', 'class_id' => 2),
			array('username' => 'k013c1368', 'pass' => 'pass', 'date' => '1994/1/2', 'email' => 'k013c1368@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '近藤', 'l_name_k' => 'コンドウ', 'class_id' => 2),
			array('username' => 'k013c1369', 'pass' => 'pass', 'date' => '1994/1/2', 'email' => 'k013c1369@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '近藤', 'l_name_k' => 'コンドウ', 'class_id' => 2),
			array('username' => 'k013c1370', 'pass' => 'pass', 'date' => '1994/1/2', 'email' => 'k013c1370@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '近藤', 'l_name_k' => 'コンドウ', 'class_id' => 2),
			array('username' => 'k013c1371', 'pass' => 'pass', 'date' => '1994/1/2', 'email' => 'k013c1371@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '近藤', 'l_name_k' => 'コンドウ', 'class_id' => 2),
			array('username' => 'k013c1372', 'pass' => 'pass', 'date' => '1994/1/2', 'email' => 'k013c1372@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '近藤', 'l_name_k' => 'コンドウ', 'class_id' => 2),
			array('username' => 'k013c1373', 'pass' => 'pass', 'date' => '1994/1/2', 'email' => 'k013c1373@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '近藤', 'l_name_k' => 'コンドウ', 'class_id' => 2),
			array('username' => 'k013c1374', 'pass' => 'pass', 'date' => '1994/1/2', 'email' => 'k013c1374@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '近藤', 'l_name_k' => 'コンドウ', 'class_id' => 2),
			array('username' => 'k013c1375', 'pass' => 'pass', 'date' => '1994/1/2', 'email' => 'k013c1375@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '近藤', 'l_name_k' => 'コンドウ', 'class_id' => 2),
			array('username' => 'k013c1376', 'pass' => 'pass', 'date' => '1994/1/3', 'email' => 'k013c1376@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '宮村', 'l_name_k' => 'ミヤムラ', 'class_id' => 2),
			array('username' => 'k013c1377', 'pass' => 'pass', 'date' => '1994/1/3', 'email' => 'k013c1377@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '宮村', 'l_name_k' => 'ミヤムラ', 'class_id' => 2),
			array('username' => 'k013c1378', 'pass' => 'pass', 'date' => '1994/1/3', 'email' => 'k013c1378@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '宮村', 'l_name_k' => 'ミヤムラ', 'class_id' => 2),
			array('username' => 'k013c1379', 'pass' => 'pass', 'date' => '1994/1/3', 'email' => 'k013c1379@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '宮村', 'l_name_k' => 'ミヤムラ', 'class_id' => 2),
			array('username' => 'k013c1380', 'pass' => 'pass', 'date' => '1994/1/3', 'email' => 'k013c1380@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '宮村', 'l_name_k' => 'ミヤムラ', 'class_id' => 2),
			array('username' => 'k013c1381', 'pass' => 'pass', 'date' => '1994/1/3', 'email' => 'k013c1381@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '宮村', 'l_name_k' => 'ミヤムラ', 'class_id' => 2),
			array('username' => 'k013c1382', 'pass' => 'pass', 'date' => '1994/1/3', 'email' => 'k013c1382@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '宮村', 'l_name_k' => 'ミヤムラ', 'class_id' => 2),
			array('username' => 'k013c1383', 'pass' => 'pass', 'date' => '1994/1/3', 'email' => 'k013c1383@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '宮村', 'l_name_k' => 'ミヤムラ', 'class_id' => 2),
			array('username' => 'k013c1384', 'pass' => 'pass', 'date' => '1994/1/3', 'email' => 'k013c1384@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '宮村', 'l_name_k' => 'ミヤムラ', 'class_id' => 2),
			array('username' => 'k013c1385', 'pass' => 'pass', 'date' => '1994/1/3', 'email' => 'k013c1385@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '宮村', 'l_name_k' => 'ミヤムラ', 'class_id' => 2),
			array('username' => 'k013c1386', 'pass' => 'pass', 'date' => '1994/1/4', 'email' => 'k013c1386@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '宮田', 'l_name_k' => 'ミヤタ', 'class_id' => 3),
			array('username' => 'k013c1387', 'pass' => 'pass', 'date' => '1994/1/4', 'email' => 'k013c1387@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '宮田', 'l_name_k' => 'ミヤタ', 'class_id' => 3),
			array('username' => 'k013c1388', 'pass' => 'pass', 'date' => '1994/1/4', 'email' => 'k013c1388@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '宮田', 'l_name_k' => 'ミヤタ', 'class_id' => 3),
			array('username' => 'k013c1389', 'pass' => 'pass', 'date' => '1994/1/4', 'email' => 'k013c1389@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '宮田', 'l_name_k' => 'ミヤタ', 'class_id' => 3),
			array('username' => 'k013c1390', 'pass' => 'pass', 'date' => '1994/1/4', 'email' => 'k013c1390@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '宮田', 'l_name_k' => 'ミヤタ', 'class_id' => 3),
			array('username' => 'k013c1391', 'pass' => 'pass', 'date' => '1994/1/4', 'email' => 'k013c1391@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '宮田', 'l_name_k' => 'ミヤタ', 'class_id' => 3),
			array('username' => 'k013c1392', 'pass' => 'pass', 'date' => '1994/1/4', 'email' => 'k013c1392@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '宮田', 'l_name_k' => 'ミヤタ', 'class_id' => 3),
			array('username' => 'k013c1393', 'pass' => 'pass', 'date' => '1994/1/4', 'email' => 'k013c1393@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '宮田', 'l_name_k' => 'ミヤタ', 'class_id' => 3),
			array('username' => 'k013c1394', 'pass' => 'pass', 'date' => '1994/1/4', 'email' => 'k013c1394@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '宮田', 'l_name_k' => 'ミヤタ', 'class_id' => 3),
			array('username' => 'k013c1395', 'pass' => 'pass', 'date' => '1994/1/4', 'email' => 'k013c1395@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '宮田', 'l_name_k' => 'ミヤタ', 'class_id' => 3),
			array('username' => 'k013c1396', 'pass' => 'pass', 'date' => '1994/1/5', 'email' => 'k013c1396@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '紺野', 'l_name_k' => 'コンノ', 'class_id' => 3),
			array('username' => 'k013c1397', 'pass' => 'pass', 'date' => '1994/1/5', 'email' => 'k013c1397@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '紺野', 'l_name_k' => 'コンノ', 'class_id' => 3),
			array('username' => 'k013c1398', 'pass' => 'pass', 'date' => '1994/1/5', 'email' => 'k013c1398@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '紺野', 'l_name_k' => 'コンノ', 'class_id' => 3),
			array('username' => 'k013c1399', 'pass' => 'pass', 'date' => '1994/1/5', 'email' => 'k013c1399@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '紺野', 'l_name_k' => 'コンノ', 'class_id' => 3),
			array('username' => 'k013c1400', 'pass' => 'pass', 'date' => '1994/1/5', 'email' => 'k013c1400@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '紺野', 'l_name_k' => 'コンノ', 'class_id' => 3),
			array('username' => 'k013c1401', 'pass' => 'pass', 'date' => '1994/1/5', 'email' => 'k013c1401@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '紺野', 'l_name_k' => 'コンノ', 'class_id' => 3),
			array('username' => 'k013c1402', 'pass' => 'pass', 'date' => '1994/1/5', 'email' => 'k013c1402@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '紺野', 'l_name_k' => 'コンノ', 'class_id' => 3),
			array('username' => 'k013c1403', 'pass' => 'pass', 'date' => '1994/1/5', 'email' => 'k013c1403@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '紺野', 'l_name_k' => 'コンノ', 'class_id' => 3),
			array('username' => 'k013c1404', 'pass' => 'pass', 'date' => '1994/1/5', 'email' => 'k013c1404@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '紺野', 'l_name_k' => 'コンノ', 'class_id' => 3),
			array('username' => 'k013c1405', 'pass' => 'pass', 'date' => '1994/1/5', 'email' => 'k013c1405@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '紺野', 'l_name_k' => 'コンノ', 'class_id' => 3),
			array('username' => 'k013c1406', 'pass' => 'pass', 'date' => '1994/1/6', 'email' => 'k013c1406@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 3),
			array('username' => 'k013c1407', 'pass' => 'pass', 'date' => '1994/1/6', 'email' => 'k013c1407@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 3),
			array('username' => 'k013c1408', 'pass' => 'pass', 'date' => '1994/1/6', 'email' => 'k013c1408@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 3),
			array('username' => 'k013c1409', 'pass' => 'pass', 'date' => '1994/1/6', 'email' => 'k013c1409@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 3),
			array('username' => 'k013c1410', 'pass' => 'pass', 'date' => '1994/1/6', 'email' => 'k013c1410@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 3),
			array('username' => 'k013c1411', 'pass' => 'pass', 'date' => '1994/1/6', 'email' => 'k013c1411@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 3),
			array('username' => 'k013c1412', 'pass' => 'pass', 'date' => '1994/1/6', 'email' => 'k013c1412@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 3),
			array('username' => 'k013c1413', 'pass' => 'pass', 'date' => '1994/1/6', 'email' => 'k013c1413@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 3),
			array('username' => 'k013c1414', 'pass' => 'pass', 'date' => '1994/1/6', 'email' => 'k013c1414@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 3),
			array('username' => 'k013c1415', 'pass' => 'pass', 'date' => '1994/1/6', 'email' => 'k013c1415@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 3),
			array('username' => 'k013c1416', 'pass' => 'pass', 'date' => '1994/1/7', 'email' => 'k013c1416@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '田中', 'l_name_k' => 'タナカ', 'class_id' => 4),
			array('username' => 'k013c1417', 'pass' => 'pass', 'date' => '1994/1/7', 'email' => 'k013c1417@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '田中', 'l_name_k' => 'タナカ', 'class_id' => 4),
			array('username' => 'k013c1418', 'pass' => 'pass', 'date' => '1994/1/7', 'email' => 'k013c1418@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '田中', 'l_name_k' => 'タナカ', 'class_id' => 4),
			array('username' => 'k013c1419', 'pass' => 'pass', 'date' => '1994/1/7', 'email' => 'k013c1419@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '田中', 'l_name_k' => 'タナカ', 'class_id' => 4),
			array('username' => 'k013c1420', 'pass' => 'pass', 'date' => '1994/1/7', 'email' => 'k013c1420@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '田中', 'l_name_k' => 'タナカ', 'class_id' => 4),
			array('username' => 'k013c1421', 'pass' => 'pass', 'date' => '1994/1/7', 'email' => 'k013c1421@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '田中', 'l_name_k' => 'タナカ', 'class_id' => 4),
			array('username' => 'k013c1422', 'pass' => 'pass', 'date' => '1994/1/7', 'email' => 'k013c1422@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '田中', 'l_name_k' => 'タナカ', 'class_id' => 4),
			array('username' => 'k013c1423', 'pass' => 'pass', 'date' => '1994/1/7', 'email' => 'k013c1423@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '田中', 'l_name_k' => 'タナカ', 'class_id' => 4),
			array('username' => 'k013c1424', 'pass' => 'pass', 'date' => '1994/1/7', 'email' => 'k013c1424@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '田中', 'l_name_k' => 'タナカ', 'class_id' => 4),
			array('username' => 'k013c1425', 'pass' => 'pass', 'date' => '1994/1/7', 'email' => 'k013c1425@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '田中', 'l_name_k' => 'タナカ', 'class_id' => 4),
			array('username' => 'k013c1426', 'pass' => 'pass', 'date' => '1994/1/8', 'email' => 'k013c1426@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '安藤', 'l_name_k' => 'アンドウ', 'class_id' => 4),
			array('username' => 'k013c1427', 'pass' => 'pass', 'date' => '1994/1/8', 'email' => 'k013c1427@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '安藤', 'l_name_k' => 'アンドウ', 'class_id' => 4),
			array('username' => 'k013c1428', 'pass' => 'pass', 'date' => '1994/1/8', 'email' => 'k013c1428@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '安藤', 'l_name_k' => 'アンドウ', 'class_id' => 4),
			array('username' => 'k013c1429', 'pass' => 'pass', 'date' => '1994/1/8', 'email' => 'k013c1429@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '安藤', 'l_name_k' => 'アンドウ', 'class_id' => 4),
			array('username' => 'k013c1430', 'pass' => 'pass', 'date' => '1994/1/8', 'email' => 'k013c1430@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '安藤', 'l_name_k' => 'アンドウ', 'class_id' => 4),
			array('username' => 'k013c1431', 'pass' => 'pass', 'date' => '1994/1/8', 'email' => 'k013c1431@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '安藤', 'l_name_k' => 'アンドウ', 'class_id' => 4),
			array('username' => 'k013c1432', 'pass' => 'pass', 'date' => '1994/1/8', 'email' => 'k013c1432@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '安藤', 'l_name_k' => 'アンドウ', 'class_id' => 4),
			array('username' => 'k013c1433', 'pass' => 'pass', 'date' => '1994/1/8', 'email' => 'k013c1433@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '安藤', 'l_name_k' => 'アンドウ', 'class_id' => 4),
			array('username' => 'k013c1434', 'pass' => 'pass', 'date' => '1994/1/8', 'email' => 'k013c1434@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '安藤', 'l_name_k' => 'アンドウ', 'class_id' => 4),
			array('username' => 'k013c1435', 'pass' => 'pass', 'date' => '1994/1/8', 'email' => 'k013c1435@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '安藤', 'l_name_k' => 'アンドウ', 'class_id' => 4),
			array('username' => 'k013c1436', 'pass' => 'pass', 'date' => '1994/1/9', 'email' => 'k013c1436@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '新田', 'l_name_k' => 'ニッタ', 'class_id' => 4),
			array('username' => 'k013c1437', 'pass' => 'pass', 'date' => '1994/1/9', 'email' => 'k013c1437@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '新田', 'l_name_k' => 'ニッタ', 'class_id' => 4),
			array('username' => 'k013c1438', 'pass' => 'pass', 'date' => '1994/1/9', 'email' => 'k013c1438@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '新田', 'l_name_k' => 'ニッタ', 'class_id' => 4),
			array('username' => 'k013c1439', 'pass' => 'pass', 'date' => '1994/1/9', 'email' => 'k013c1439@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '新田', 'l_name_k' => 'ニッタ', 'class_id' => 4),
			array('username' => 'k013c1440', 'pass' => 'pass', 'date' => '1994/1/9', 'email' => 'k013c1440@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '新田', 'l_name_k' => 'ニッタ', 'class_id' => 4),
			array('username' => 'k013c1441', 'pass' => 'pass', 'date' => '1994/1/9', 'email' => 'k013c1441@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '新田', 'l_name_k' => 'ニッタ', 'class_id' => 4),
			array('username' => 'k013c1442', 'pass' => 'pass', 'date' => '1994/1/9', 'email' => 'k013c1442@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '新田', 'l_name_k' => 'ニッタ', 'class_id' => 4),
			array('username' => 'k013c1443', 'pass' => 'pass', 'date' => '1994/1/9', 'email' => 'k013c1443@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '新田', 'l_name_k' => 'ニッタ', 'class_id' => 4),
			array('username' => 'k013c1444', 'pass' => 'pass', 'date' => '1994/1/9', 'email' => 'k013c1444@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '新田', 'l_name_k' => 'ニッタ', 'class_id' => 4),
			array('username' => 'k013c1445', 'pass' => 'pass', 'date' => '1994/1/9', 'email' => 'k013c1445@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '新田', 'l_name_k' => 'ニッタ', 'class_id' => 4),
			array('username' => 'k013c1446', 'pass' => 'pass', 'date' => '1994/1/10', 'email' => 'k013c1446@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 5),
			array('username' => 'k013c1447', 'pass' => 'pass', 'date' => '1994/1/10', 'email' => 'k013c1447@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 5),
			array('username' => 'k013c1448', 'pass' => 'pass', 'date' => '1994/1/10', 'email' => 'k013c1448@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 5),
			array('username' => 'k013c1449', 'pass' => 'pass', 'date' => '1994/1/10', 'email' => 'k013c1449@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 5),
			array('username' => 'k013c1450', 'pass' => 'pass', 'date' => '1994/1/10', 'email' => 'k013c1450@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 5),
			array('username' => 'k013c1451', 'pass' => 'pass', 'date' => '1994/1/10', 'email' => 'k013c1451@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 5),
			array('username' => 'k013c1452', 'pass' => 'pass', 'date' => '1994/1/10', 'email' => 'k013c1452@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 5),
			array('username' => 'k013c1453', 'pass' => 'pass', 'date' => '1994/1/10', 'email' => 'k013c1453@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 5),
			array('username' => 'k013c1454', 'pass' => 'pass', 'date' => '1994/1/10', 'email' => 'k013c1454@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 5),
			array('username' => 'k013c1455', 'pass' => 'pass', 'date' => '1994/1/10', 'email' => 'k013c1455@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '佐藤', 'l_name_k' => 'サトウ', 'class_id' => 5),
			array('username' => 'k013c1456', 'pass' => 'pass', 'date' => '1994/1/11', 'email' => 'k013c1456@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '伊藤', 'l_name_k' => 'イトウ', 'class_id' => 5),
			array('username' => 'k013c1457', 'pass' => 'pass', 'date' => '1994/1/11', 'email' => 'k013c1457@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '伊藤', 'l_name_k' => 'イトウ', 'class_id' => 5),
			array('username' => 'k013c1458', 'pass' => 'pass', 'date' => '1994/1/11', 'email' => 'k013c1458@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '伊藤', 'l_name_k' => 'イトウ', 'class_id' => 5),
			array('username' => 'k013c1459', 'pass' => 'pass', 'date' => '1994/1/11', 'email' => 'k013c1459@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '伊藤', 'l_name_k' => 'イトウ', 'class_id' => 5),
			array('username' => 'k013c1460', 'pass' => 'pass', 'date' => '1994/1/11', 'email' => 'k013c1460@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '伊藤', 'l_name_k' => 'イトウ', 'class_id' => 5),
			array('username' => 'k013c1461', 'pass' => 'pass', 'date' => '1994/1/11', 'email' => 'k013c1461@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '伊藤', 'l_name_k' => 'イトウ', 'class_id' => 5),
			array('username' => 'k013c1462', 'pass' => 'pass', 'date' => '1994/1/11', 'email' => 'k013c1462@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '伊藤', 'l_name_k' => 'イトウ', 'class_id' => 5),
			array('username' => 'k013c1463', 'pass' => 'pass', 'date' => '1994/1/11', 'email' => 'k013c1463@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '伊藤', 'l_name_k' => 'イトウ', 'class_id' => 5),
			array('username' => 'k013c1464', 'pass' => 'pass', 'date' => '1994/1/11', 'email' => 'k013c1464@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '伊藤', 'l_name_k' => 'イトウ', 'class_id' => 5),
			array('username' => 'k013c1465', 'pass' => 'pass', 'date' => '1994/1/11', 'email' => 'k013c1465@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '伊藤', 'l_name_k' => 'イトウ', 'class_id' => 5),
			array('username' => 'k013c1466', 'pass' => 'pass', 'date' => '1994/1/12', 'email' => 'k013c1466@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '小林', 'l_name_k' => 'コバヤシ', 'class_id' => 5),
			array('username' => 'k013c1467', 'pass' => 'pass', 'date' => '1994/1/12', 'email' => 'k013c1467@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '小林', 'l_name_k' => 'コバヤシ', 'class_id' => 5),
			array('username' => 'k013c1468', 'pass' => 'pass', 'date' => '1994/1/12', 'email' => 'k013c1468@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '小林', 'l_name_k' => 'コバヤシ', 'class_id' => 5),
			array('username' => 'k013c1469', 'pass' => 'pass', 'date' => '1994/1/12', 'email' => 'k013c1469@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '小林', 'l_name_k' => 'コバヤシ', 'class_id' => 5),
			array('username' => 'k013c1470', 'pass' => 'pass', 'date' => '1994/1/12', 'email' => 'k013c1470@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '小林', 'l_name_k' => 'コバヤシ', 'class_id' => 5),
			array('username' => 'k013c1471', 'pass' => 'pass', 'date' => '1994/1/12', 'email' => 'k013c1471@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '小林', 'l_name_k' => 'コバヤシ', 'class_id' => 5),
			array('username' => 'k013c1472', 'pass' => 'pass', 'date' => '1994/1/12', 'email' => 'k013c1472@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '小林', 'l_name_k' => 'コバヤシ', 'class_id' => 5),
			array('username' => 'k013c1473', 'pass' => 'pass', 'date' => '1994/1/12', 'email' => 'k013c1473@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '小林', 'l_name_k' => 'コバヤシ', 'class_id' => 5),
			array('username' => 'k013c1474', 'pass' => 'pass', 'date' => '1994/1/12', 'email' => 'k013c1474@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '小林', 'l_name_k' => 'コバヤシ', 'class_id' => 5),
			array('username' => 'k013c1475', 'pass' => 'pass', 'date' => '1994/1/12', 'email' => 'k013c1475@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '小林', 'l_name_k' => 'コバヤシ', 'class_id' => 5),
			array('username' => 'k013c1476', 'pass' => 'pass', 'date' => '1994/1/13', 'email' => 'k013c1476@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '吉田', 'l_name_k' => 'ヨシダ', 'class_id' => 6),
			array('username' => 'k013c1477', 'pass' => 'pass', 'date' => '1994/1/13', 'email' => 'k013c1477@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '吉田', 'l_name_k' => 'ヨシダ', 'class_id' => 6),
			array('username' => 'k013c1478', 'pass' => 'pass', 'date' => '1994/1/13', 'email' => 'k013c1478@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '吉田', 'l_name_k' => 'ヨシダ', 'class_id' => 6),
			array('username' => 'k013c1479', 'pass' => 'pass', 'date' => '1994/1/13', 'email' => 'k013c1479@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '吉田', 'l_name_k' => 'ヨシダ', 'class_id' => 6),
			array('username' => 'k013c1480', 'pass' => 'pass', 'date' => '1994/1/13', 'email' => 'k013c1480@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '吉田', 'l_name_k' => 'ヨシダ', 'class_id' => 6),
			array('username' => 'k013c1481', 'pass' => 'pass', 'date' => '1994/1/13', 'email' => 'k013c1481@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '吉田', 'l_name_k' => 'ヨシダ', 'class_id' => 6),
			array('username' => 'k013c1482', 'pass' => 'pass', 'date' => '1994/1/13', 'email' => 'k013c1482@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '吉田', 'l_name_k' => 'ヨシダ', 'class_id' => 6),
			array('username' => 'k013c1483', 'pass' => 'pass', 'date' => '1994/1/13', 'email' => 'k013c1483@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '吉田', 'l_name_k' => 'ヨシダ', 'class_id' => 6),
			array('username' => 'k013c1484', 'pass' => 'pass', 'date' => '1994/1/13', 'email' => 'k013c1484@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '吉田', 'l_name_k' => 'ヨシダ', 'class_id' => 6),
			array('username' => 'k013c1485', 'pass' => 'pass', 'date' => '1994/1/13', 'email' => 'k013c1485@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '吉田', 'l_name_k' => 'ヨシダ', 'class_id' => 6),
			array('username' => 'k013c1486', 'pass' => 'pass', 'date' => '1994/1/14', 'email' => 'k013c1486@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 6),
			array('username' => 'k013c1487', 'pass' => 'pass', 'date' => '1994/1/14', 'email' => 'k013c1487@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 6),
			array('username' => 'k013c1488', 'pass' => 'pass', 'date' => '1994/1/14', 'email' => 'k013c1488@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 6),
			array('username' => 'k013c1489', 'pass' => 'pass', 'date' => '1994/1/14', 'email' => 'k013c1489@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 6),
			array('username' => 'k013c1490', 'pass' => 'pass', 'date' => '1994/1/14', 'email' => 'k013c1490@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 6),
			array('username' => 'k013c1491', 'pass' => 'pass', 'date' => '1994/1/14', 'email' => 'k013c1491@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 6),
			array('username' => 'k013c1492', 'pass' => 'pass', 'date' => '1994/1/14', 'email' => 'k013c1492@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 6),
			array('username' => 'k013c1493', 'pass' => 'pass', 'date' => '1994/1/14', 'email' => 'k013c1493@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 6),
			array('username' => 'k013c1494', 'pass' => 'pass', 'date' => '1994/1/14', 'email' => 'k013c1494@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 6),
			array('username' => 'k013c1495', 'pass' => 'pass', 'date' => '1994/1/14', 'email' => 'k013c1495@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '佐々木', 'l_name_k' => 'ササキ', 'class_id' => 6),
			array('username' => 'k013c1496', 'pass' => 'pass', 'date' => '1994/1/15', 'email' => 'k013c1496@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '松本', 'l_name_k' => 'マツモト', 'class_id' => 6),
			array('username' => 'k013c1497', 'pass' => 'pass', 'date' => '1994/1/15', 'email' => 'k013c1497@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '松本', 'l_name_k' => 'マツモト', 'class_id' => 6),
			array('username' => 'k013c1498', 'pass' => 'pass', 'date' => '1994/1/15', 'email' => 'k013c1498@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '松本', 'l_name_k' => 'マツモト', 'class_id' => 6),
			array('username' => 'k013c1499', 'pass' => 'pass', 'date' => '1994/1/15', 'email' => 'k013c1599@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '松本', 'l_name_k' => 'マツモト', 'class_id' => 6),
			array('username' => 'k013c1500', 'pass' => 'pass', 'date' => '1994/1/15', 'email' => 'k013c1500@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '松本', 'l_name_k' => 'マツモト', 'class_id' => 6),
			array('username' => 'k013c1501', 'pass' => 'pass', 'date' => '1994/1/15', 'email' => 'k013c1501@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '松本', 'l_name_k' => 'マツモト', 'class_id' => 6),
			array('username' => 'k013c1502', 'pass' => 'pass', 'date' => '1994/1/15', 'email' => 'k013c1502@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '松本', 'l_name_k' => 'マツモト', 'class_id' => 6),
			array('username' => 'k013c1503', 'pass' => 'pass', 'date' => '1994/1/15', 'email' => 'k013c1503@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '松本', 'l_name_k' => 'マツモト', 'class_id' => 6),
			array('username' => 'k013c1504', 'pass' => 'pass', 'date' => '1994/1/15', 'email' => 'k013c1504@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '松本', 'l_name_k' => 'マツモト', 'class_id' => 6),
			array('username' => 'k013c1505', 'pass' => 'pass', 'date' => '1994/1/15', 'email' => 'k013c1505@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '松本', 'l_name_k' => 'マツモト', 'class_id' => 6),
			array('username' => 'k013c1506', 'pass' => 'pass', 'date' => '1994/1/16', 'email' => 'k013c1506@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '木村', 'l_name_k' => 'キムラ', 'class_id' => 7),
			array('username' => 'k013c1507', 'pass' => 'pass', 'date' => '1994/1/16', 'email' => 'k013c1507@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '木村', 'l_name_k' => 'キムラ', 'class_id' => 7),
			array('username' => 'k013c1508', 'pass' => 'pass', 'date' => '1994/1/16', 'email' => 'k013c1508@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '木村', 'l_name_k' => 'キムラ', 'class_id' => 7),
			array('username' => 'k013c1509', 'pass' => 'pass', 'date' => '1994/1/16', 'email' => 'k013c1509@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '木村', 'l_name_k' => 'キムラ', 'class_id' => 7),
			array('username' => 'k013c1510', 'pass' => 'pass', 'date' => '1994/1/16', 'email' => 'k013c1510@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '木村', 'l_name_k' => 'キムラ', 'class_id' => 7),
			array('username' => 'k013c1511', 'pass' => 'pass', 'date' => '1994/1/16', 'email' => 'k013c1511@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '木村', 'l_name_k' => 'キムラ', 'class_id' => 7),
			array('username' => 'k013c1512', 'pass' => 'pass', 'date' => '1994/1/16', 'email' => 'k013c1512@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '木村', 'l_name_k' => 'キムラ', 'class_id' => 7),
			array('username' => 'k013c1513', 'pass' => 'pass', 'date' => '1994/1/16', 'email' => 'k013c1513@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '木村', 'l_name_k' => 'キムラ', 'class_id' => 7),
			array('username' => 'k013c1514', 'pass' => 'pass', 'date' => '1994/1/16', 'email' => 'k013c1514@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '木村', 'l_name_k' => 'キムラ', 'class_id' => 7),
			array('username' => 'k013c1515', 'pass' => 'pass', 'date' => '1994/1/16', 'email' => 'k013c1515@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '木村', 'l_name_k' => 'キムラ', 'class_id' => 7),
			array('username' => 'k013c1516', 'pass' => 'pass', 'date' => '1994/1/17', 'email' => 'k013c1516@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '斎藤', 'l_name_k' => 'サイトウ', 'class_id' => 7),
			array('username' => 'k013c1517', 'pass' => 'pass', 'date' => '1994/1/17', 'email' => 'k013c1517@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '斎藤', 'l_name_k' => 'サイトウ', 'class_id' => 7),
			array('username' => 'k013c1518', 'pass' => 'pass', 'date' => '1994/1/17', 'email' => 'k013c1518@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '斎藤', 'l_name_k' => 'サイトウ', 'class_id' => 7),
			array('username' => 'k013c1519', 'pass' => 'pass', 'date' => '1994/1/17', 'email' => 'k013c1519@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '斎藤', 'l_name_k' => 'サイトウ', 'class_id' => 7),
			array('username' => 'k013c1520', 'pass' => 'pass', 'date' => '1994/1/17', 'email' => 'k013c1520@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '斎藤', 'l_name_k' => 'サイトウ', 'class_id' => 7),
			array('username' => 'k013c1521', 'pass' => 'pass', 'date' => '1994/1/17', 'email' => 'k013c1521@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '斎藤', 'l_name_k' => 'サイトウ', 'class_id' => 7),
			array('username' => 'k013c1522', 'pass' => 'pass', 'date' => '1994/1/17', 'email' => 'k013c1522@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '斎藤', 'l_name_k' => 'サイトウ', 'class_id' => 7),
			array('username' => 'k013c1523', 'pass' => 'pass', 'date' => '1994/1/17', 'email' => 'k013c1523@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '斎藤', 'l_name_k' => 'サイトウ', 'class_id' => 7),
			array('username' => 'k013c1524', 'pass' => 'pass', 'date' => '1994/1/17', 'email' => 'k013c1524@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '斎藤', 'l_name_k' => 'サイトウ', 'class_id' => 7),
			array('username' => 'k013c1525', 'pass' => 'pass', 'date' => '1994/1/17', 'email' => 'k013c1525@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '斎藤', 'l_name_k' => 'サイトウ', 'class_id' => 7),
			array('username' => 'k013c1526', 'pass' => 'pass', 'date' => '1994/1/18', 'email' => 'k013c1526@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '山崎', 'l_name_k' => 'ヤマザキ', 'class_id' => 7),
			array('username' => 'k013c1527', 'pass' => 'pass', 'date' => '1994/1/18', 'email' => 'k013c1527@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '山崎', 'l_name_k' => 'ヤマザキ', 'class_id' => 7),
			array('username' => 'k013c1528', 'pass' => 'pass', 'date' => '1994/1/18', 'email' => 'k013c1528@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '山崎', 'l_name_k' => 'ヤマザキ', 'class_id' => 7),
			array('username' => 'k013c1529', 'pass' => 'pass', 'date' => '1994/1/18', 'email' => 'k013c1529@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '山崎', 'l_name_k' => 'ヤマザキ', 'class_id' => 7),
			array('username' => 'k013c1530', 'pass' => 'pass', 'date' => '1994/1/18', 'email' => 'k013c1530@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '山崎', 'l_name_k' => 'ヤマザキ', 'class_id' => 7),
			array('username' => 'k013c1531', 'pass' => 'pass', 'date' => '1994/1/18', 'email' => 'k013c1531@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '山崎', 'l_name_k' => 'ヤマザキ', 'class_id' => 7),
			array('username' => 'k013c1532', 'pass' => 'pass', 'date' => '1994/1/18', 'email' => 'k013c1532@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '山崎', 'l_name_k' => 'ヤマザキ', 'class_id' => 7),
			array('username' => 'k013c1533', 'pass' => 'pass', 'date' => '1994/1/18', 'email' => 'k013c1533@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '山崎', 'l_name_k' => 'ヤマザキ', 'class_id' => 7),
			array('username' => 'k013c1534', 'pass' => 'pass', 'date' => '1994/1/18', 'email' => 'k013c1534@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '山崎', 'l_name_k' => 'ヤマザキ', 'class_id' => 7),
			array('username' => 'k013c1535', 'pass' => 'pass', 'date' => '1994/1/18', 'email' => 'k013c1535@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '山崎', 'l_name_k' => 'ヤマザキ', 'class_id' => 7),
			array('username' => 'k013c1536', 'pass' => 'pass', 'date' => '1994/1/19', 'email' => 'k013c1536@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '森', 'l_name_k' => 'モリ', 'class_id' => 8),
			array('username' => 'k013c1537', 'pass' => 'pass', 'date' => '1994/1/19', 'email' => 'k013c1537@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '森', 'l_name_k' => 'モリ', 'class_id' => 8),
			array('username' => 'k013c1538', 'pass' => 'pass', 'date' => '1994/1/19', 'email' => 'k013c1538@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '森', 'l_name_k' => 'モリ', 'class_id' => 8),
			array('username' => 'k013c1539', 'pass' => 'pass', 'date' => '1994/1/19', 'email' => 'k013c1539@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '森', 'l_name_k' => 'モリ', 'class_id' => 8),
			array('username' => 'k013c1540', 'pass' => 'pass', 'date' => '1994/1/19', 'email' => 'k013c1540@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '森', 'l_name_k' => 'モリ', 'class_id' => 8),
			array('username' => 'k013c1541', 'pass' => 'pass', 'date' => '1994/1/19', 'email' => 'k013c1541@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '森', 'l_name_k' => 'モリ', 'class_id' => 8),
			array('username' => 'k013c1542', 'pass' => 'pass', 'date' => '1994/1/19', 'email' => 'k013c1542@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '森', 'l_name_k' => 'モリ', 'class_id' => 8),
			array('username' => 'k013c1543', 'pass' => 'pass', 'date' => '1994/1/19', 'email' => 'k013c1543@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '森', 'l_name_k' => 'モリ', 'class_id' => 8),
			array('username' => 'k013c1544', 'pass' => 'pass', 'date' => '1994/1/19', 'email' => 'k013c1544@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '森', 'l_name_k' => 'モリ', 'class_id' => 8),
			array('username' => 'k013c1545', 'pass' => 'pass', 'date' => '1994/1/19', 'email' => 'k013c1545@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '森', 'l_name_k' => 'モリ', 'class_id' => 8),
			array('username' => 'k013c1546', 'pass' => 'pass', 'date' => '1994/1/20', 'email' => 'k013c1546@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '橋本', 'l_name_k' => 'ハシモト', 'class_id' => 8),
			array('username' => 'k013c1547', 'pass' => 'pass', 'date' => '1994/1/20', 'email' => 'k013c1547@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '橋本', 'l_name_k' => 'ハシモト', 'class_id' => 8),
			array('username' => 'k013c1548', 'pass' => 'pass', 'date' => '1994/1/20', 'email' => 'k013c1548@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '橋本', 'l_name_k' => 'ハシモト', 'class_id' => 8),
			array('username' => 'k013c1549', 'pass' => 'pass', 'date' => '1994/1/20', 'email' => 'k013c1549@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '橋本', 'l_name_k' => 'ハシモト', 'class_id' => 8),
			array('username' => 'k013c1550', 'pass' => 'pass', 'date' => '1994/1/20', 'email' => 'k013c1550@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '橋本', 'l_name_k' => 'ハシモト', 'class_id' => 8),
			array('username' => 'k013c1551', 'pass' => 'pass', 'date' => '1994/1/20', 'email' => 'k013c1551@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '橋本', 'l_name_k' => 'ハシモト', 'class_id' => 8),
			array('username' => 'k013c1552', 'pass' => 'pass', 'date' => '1994/1/20', 'email' => 'k013c1552@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '橋本', 'l_name_k' => 'ハシモト', 'class_id' => 8),
			array('username' => 'k013c1553', 'pass' => 'pass', 'date' => '1994/1/20', 'email' => 'k013c1553@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '橋本', 'l_name_k' => 'ハシモト', 'class_id' => 8),
			array('username' => 'k013c1554', 'pass' => 'pass', 'date' => '1994/1/20', 'email' => 'k013c1554@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '橋本', 'l_name_k' => 'ハシモト', 'class_id' => 8),
			array('username' => 'k013c1555', 'pass' => 'pass', 'date' => '1994/1/20', 'email' => 'k013c1555@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '橋本', 'l_name_k' => 'ハシモト', 'class_id' => 8),
			array('username' => 'k013c1556', 'pass' => 'pass', 'date' => '1994/1/21', 'email' => 'k013c1556@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '石川', 'l_name_k' => 'イシカワ', 'class_id' => 8),
			array('username' => 'k013c1557', 'pass' => 'pass', 'date' => '1994/1/21', 'email' => 'k013c1557@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '石川', 'l_name_k' => 'イシカワ', 'class_id' => 8),
			array('username' => 'k013c1558', 'pass' => 'pass', 'date' => '1994/1/21', 'email' => 'k013c1558@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '石川', 'l_name_k' => 'イシカワ', 'class_id' => 8),
			array('username' => 'k013c1559', 'pass' => 'pass', 'date' => '1994/1/21', 'email' => 'k013c1559@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '石川', 'l_name_k' => 'イシカワ', 'class_id' => 8),
			array('username' => 'k013c1560', 'pass' => 'pass', 'date' => '1994/1/21', 'email' => 'k013c1560@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '石川', 'l_name_k' => 'イシカワ', 'class_id' => 8),
			array('username' => 'k013c1561', 'pass' => 'pass', 'date' => '1994/1/21', 'email' => 'k013c1561@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '石川', 'l_name_k' => 'イシカワ', 'class_id' => 8),
			array('username' => 'k013c1562', 'pass' => 'pass', 'date' => '1994/1/21', 'email' => 'k013c1562@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '石川', 'l_name_k' => 'イシカワ', 'class_id' => 8),
			array('username' => 'k013c1563', 'pass' => 'pass', 'date' => '1994/1/21', 'email' => 'k013c1563@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '石川', 'l_name_k' => 'イシカワ', 'class_id' => 8),
			array('username' => 'k013c1564', 'pass' => 'pass', 'date' => '1994/1/21', 'email' => 'k013c1564@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '石川', 'l_name_k' => 'イシカワ', 'class_id' => 8),
			array('username' => 'k013c1565', 'pass' => 'pass', 'date' => '1994/1/21', 'email' => 'k013c1565@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '石川', 'l_name_k' => 'イシカワ', 'class_id' => 8),
			array('username' => 'k013c1566', 'pass' => 'pass', 'date' => '1994/1/22', 'email' => 'k013c1566@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '前田', 'l_name_k' => 'マエダ', 'class_id' => 9),
			array('username' => 'k013c1567', 'pass' => 'pass', 'date' => '1994/1/22', 'email' => 'k013c1567@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '前田', 'l_name_k' => 'マエダ', 'class_id' => 9),
			array('username' => 'k013c1568', 'pass' => 'pass', 'date' => '1994/1/22', 'email' => 'k013c1568@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '前田', 'l_name_k' => 'マエダ', 'class_id' => 9),
			array('username' => 'k013c1569', 'pass' => 'pass', 'date' => '1994/1/22', 'email' => 'k013c1569@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '前田', 'l_name_k' => 'マエダ', 'class_id' => 9),
			array('username' => 'k013c1570', 'pass' => 'pass', 'date' => '1994/1/22', 'email' => 'k013c1570@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '前田', 'l_name_k' => 'マエダ', 'class_id' => 9),
			array('username' => 'k013c1571', 'pass' => 'pass', 'date' => '1994/1/22', 'email' => 'k013c1571@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '前田', 'l_name_k' => 'マエダ', 'class_id' => 9),
			array('username' => 'k013c1572', 'pass' => 'pass', 'date' => '1994/1/22', 'email' => 'k013c1572@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '前田', 'l_name_k' => 'マエダ', 'class_id' => 9),
			array('username' => 'k013c1573', 'pass' => 'pass', 'date' => '1994/1/22', 'email' => 'k013c1573@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '前田', 'l_name_k' => 'マエダ', 'class_id' => 9),
			array('username' => 'k013c1574', 'pass' => 'pass', 'date' => '1994/1/22', 'email' => 'k013c1574@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '前田', 'l_name_k' => 'マエダ', 'class_id' => 9),
			array('username' => 'k013c1575', 'pass' => 'pass', 'date' => '1994/1/22', 'email' => 'k013c1575@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '前田', 'l_name_k' => 'マエダ', 'class_id' => 9),
			array('username' => 'k013c1576', 'pass' => 'pass', 'date' => '1994/1/23', 'email' => 'k013c1576@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '後藤', 'l_name_k' => 'ゴトウ', 'class_id' => 9),
			array('username' => 'k013c1577', 'pass' => 'pass', 'date' => '1994/1/23', 'email' => 'k013c1577@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '後藤', 'l_name_k' => 'ゴトウ', 'class_id' => 9),
			array('username' => 'k013c1578', 'pass' => 'pass', 'date' => '1994/1/23', 'email' => 'k013c1578@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '後藤', 'l_name_k' => 'ゴトウ', 'class_id' => 9),
			array('username' => 'k013c1579', 'pass' => 'pass', 'date' => '1994/1/23', 'email' => 'k013c1579@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '後藤', 'l_name_k' => 'ゴトウ', 'class_id' => 9),
			array('username' => 'k013c1580', 'pass' => 'pass', 'date' => '1994/1/23', 'email' => 'k013c1580@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '後藤', 'l_name_k' => 'ゴトウ', 'class_id' => 9),
			array('username' => 'k013c1581', 'pass' => 'pass', 'date' => '1994/1/23', 'email' => 'k013c1581@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '後藤', 'l_name_k' => 'ゴトウ', 'class_id' => 9),
			array('username' => 'k013c1582', 'pass' => 'pass', 'date' => '1994/1/23', 'email' => 'k013c1582@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '後藤', 'l_name_k' => 'ゴトウ', 'class_id' => 9),
			array('username' => 'k013c1583', 'pass' => 'pass', 'date' => '1994/1/23', 'email' => 'k013c1583@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '後藤', 'l_name_k' => 'ゴトウ', 'class_id' => 9),
			array('username' => 'k013c1584', 'pass' => 'pass', 'date' => '1994/1/23', 'email' => 'k013c1584@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '後藤', 'l_name_k' => 'ゴトウ', 'class_id' => 9),
			array('username' => 'k013c1585', 'pass' => 'pass', 'date' => '1994/1/23', 'email' => 'k013c1585@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '後藤', 'l_name_k' => 'ゴトウ', 'class_id' => 9),
			array('username' => 'k013c1586', 'pass' => 'pass', 'date' => '1994/1/24', 'email' => 'k013c1586@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '岡田', 'l_name_k' => 'オクダ', 'class_id' => 9),
			array('username' => 'k013c1587', 'pass' => 'pass', 'date' => '1994/1/24', 'email' => 'k013c1587@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '岡田', 'l_name_k' => 'オクダ', 'class_id' => 9),
			array('username' => 'k013c1588', 'pass' => 'pass', 'date' => '1994/1/24', 'email' => 'k013c1588@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '岡田', 'l_name_k' => 'オクダ', 'class_id' => 9),
			array('username' => 'k013c1589', 'pass' => 'pass', 'date' => '1994/1/24', 'email' => 'k013c1589@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '岡田', 'l_name_k' => 'オクダ', 'class_id' => 9),
			array('username' => 'k013c1590', 'pass' => 'pass', 'date' => '1994/1/24', 'email' => 'k013c1590@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '岡田', 'l_name_k' => 'オクダ', 'class_id' => 9),
			array('username' => 'k013c1591', 'pass' => 'pass', 'date' => '1994/1/24', 'email' => 'k013c1591@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '岡田', 'l_name_k' => 'オクダ', 'class_id' => 9),
			array('username' => 'k013c1592', 'pass' => 'pass', 'date' => '1994/1/24', 'email' => 'k013c1592@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '岡田', 'l_name_k' => 'オクダ', 'class_id' => 9),
			array('username' => 'k013c1593', 'pass' => 'pass', 'date' => '1994/1/24', 'email' => 'k013c1593@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '岡田', 'l_name_k' => 'オクダ', 'class_id' => 9),
			array('username' => 'k013c1594', 'pass' => 'pass', 'date' => '1994/1/24', 'email' => 'k013c1594@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '岡田', 'l_name_k' => 'オクダ', 'class_id' => 9),
			array('username' => 'k013c1595', 'pass' => 'pass', 'date' => '1994/1/24', 'email' => 'k013c1595@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '岡田', 'l_name_k' => 'オクダ', 'class_id' => 9),
			array('username' => 'k013c1596', 'pass' => 'pass', 'date' => '1994/1/25', 'email' => 'k013c1596@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '石井', 'l_name_k' => 'イシイ', 'class_id' => 10),
			array('username' => 'k013c1597', 'pass' => 'pass', 'date' => '1994/1/25', 'email' => 'k013c1597@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '石井', 'l_name_k' => 'イシイ', 'class_id' => 10),
			array('username' => 'k013c1598', 'pass' => 'pass', 'date' => '1994/1/25', 'email' => 'k013c1698@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '石井', 'l_name_k' => 'イシイ', 'class_id' => 10),
			array('username' => 'k013c1599', 'pass' => 'pass', 'date' => '1994/1/25', 'email' => 'k013c1699@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '石井', 'l_name_k' => 'イシイ', 'class_id' => 10),
			array('username' => 'k013c1600', 'pass' => 'pass', 'date' => '1994/1/25', 'email' => 'k013c1600@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '石井', 'l_name_k' => 'イシイ', 'class_id' => 10),
			array('username' => 'k013c1601', 'pass' => 'pass', 'date' => '1994/1/25', 'email' => 'k013c1601@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '石井', 'l_name_k' => 'イシイ', 'class_id' => 10),
			array('username' => 'k013c1602', 'pass' => 'pass', 'date' => '1994/1/25', 'email' => 'k013c1602@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '石井', 'l_name_k' => 'イシイ', 'class_id' => 10),
			array('username' => 'k013c1603', 'pass' => 'pass', 'date' => '1994/1/25', 'email' => 'k013c1603@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '石井', 'l_name_k' => 'イシイ', 'class_id' => 10),
			array('username' => 'k013c1604', 'pass' => 'pass', 'date' => '1994/1/25', 'email' => 'k013c1604@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '石井', 'l_name_k' => 'イシイ', 'class_id' => 10),
			array('username' => 'k013c1605', 'pass' => 'pass', 'date' => '1994/1/25', 'email' => 'k013c1605@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '石井', 'l_name_k' => 'イシイ', 'class_id' => 10),
			array('username' => 'k013c1606', 'pass' => 'pass', 'date' => '1994/1/26', 'email' => 'k013c1606@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '坂本', 'l_name_k' => 'サカモト', 'class_id' => 10),
			array('username' => 'k013c1607', 'pass' => 'pass', 'date' => '1994/1/26', 'email' => 'k013c1607@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '坂本', 'l_name_k' => 'サカモト', 'class_id' => 10),
			array('username' => 'k013c1608', 'pass' => 'pass', 'date' => '1994/1/26', 'email' => 'k013c1608@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '坂本', 'l_name_k' => 'サカモト', 'class_id' => 10),
			array('username' => 'k013c1609', 'pass' => 'pass', 'date' => '1994/1/26', 'email' => 'k013c1609@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '坂本', 'l_name_k' => 'サカモト', 'class_id' => 10),
			array('username' => 'k013c1610', 'pass' => 'pass', 'date' => '1994/1/26', 'email' => 'k013c1610@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '坂本', 'l_name_k' => 'サカモト', 'class_id' => 10),
			array('username' => 'k013c1611', 'pass' => 'pass', 'date' => '1994/1/26', 'email' => 'k013c1611@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '坂本', 'l_name_k' => 'サカモト', 'class_id' => 10),
			array('username' => 'k013c1612', 'pass' => 'pass', 'date' => '1994/1/26', 'email' => 'k013c1612@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '坂本', 'l_name_k' => 'サカモト', 'class_id' => 10),
			array('username' => 'k013c1613', 'pass' => 'pass', 'date' => '1994/1/26', 'email' => 'k013c1613@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '坂本', 'l_name_k' => 'サカモト', 'class_id' => 10),
			array('username' => 'k013c1614', 'pass' => 'pass', 'date' => '1994/1/26', 'email' => 'k013c1614@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '坂本', 'l_name_k' => 'サカモト', 'class_id' => 10),
			array('username' => 'k013c1615', 'pass' => 'pass', 'date' => '1994/1/26', 'email' => 'k013c1615@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '坂本', 'l_name_k' => 'サカモト', 'class_id' => 10),
			array('username' => 'k013c1616', 'pass' => 'pass', 'date' => '1994/1/27', 'email' => 'k013c1616@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '藤井', 'l_name_k' => 'フジイ', 'class_id' => 10),
			array('username' => 'k013c1617', 'pass' => 'pass', 'date' => '1994/1/27', 'email' => 'k013c1617@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '藤井', 'l_name_k' => 'フジイ', 'class_id' => 10),
			array('username' => 'k013c1618', 'pass' => 'pass', 'date' => '1994/1/27', 'email' => 'k013c1618@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '藤井', 'l_name_k' => 'フジイ', 'class_id' => 10),
			array('username' => 'k013c1619', 'pass' => 'pass', 'date' => '1994/1/27', 'email' => 'k013c1619@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '藤井', 'l_name_k' => 'フジイ', 'class_id' => 10),
			array('username' => 'k013c1620', 'pass' => 'pass', 'date' => '1994/1/27', 'email' => 'k013c1620@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '藤井', 'l_name_k' => 'フジイ', 'class_id' => 10),
			array('username' => 'k013c1621', 'pass' => 'pass', 'date' => '1994/1/27', 'email' => 'k013c1621@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '藤井', 'l_name_k' => 'フジイ', 'class_id' => 10),
			array('username' => 'k013c1622', 'pass' => 'pass', 'date' => '1994/1/27', 'email' => 'k013c1622@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '藤井', 'l_name_k' => 'フジイ', 'class_id' => 10),
			array('username' => 'k013c1623', 'pass' => 'pass', 'date' => '1994/1/27', 'email' => 'k013c1623@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '藤井', 'l_name_k' => 'フジイ', 'class_id' => 10),
			array('username' => 'k013c1624', 'pass' => 'pass', 'date' => '1994/1/27', 'email' => 'k013c1624@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '藤井', 'l_name_k' => 'フジイ', 'class_id' => 10),
			array('username' => 'k013c1625', 'pass' => 'pass', 'date' => '1994/1/27', 'email' => 'k013c1625@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '藤井', 'l_name_k' => 'フジイ', 'class_id' => 10),
			array('username' => 'k013c1626', 'pass' => 'pass', 'date' => '1994/1/28', 'email' => 'k013c1626@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '福田', 'l_name_k' => 'フクダ', 'class_id' => 11),
			array('username' => 'k013c1627', 'pass' => 'pass', 'date' => '1994/1/28', 'email' => 'k013c1627@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '福田', 'l_name_k' => 'フクダ', 'class_id' => 11),
			array('username' => 'k013c1628', 'pass' => 'pass', 'date' => '1994/1/28', 'email' => 'k013c1628@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '福田', 'l_name_k' => 'フクダ', 'class_id' => 11),
			array('username' => 'k013c1629', 'pass' => 'pass', 'date' => '1994/1/28', 'email' => 'k013c1629@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '福田', 'l_name_k' => 'フクダ', 'class_id' => 11),
			array('username' => 'k013c1630', 'pass' => 'pass', 'date' => '1994/1/28', 'email' => 'k013c1630@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '福田', 'l_name_k' => 'フクダ', 'class_id' => 11),
			array('username' => 'k013c1631', 'pass' => 'pass', 'date' => '1994/1/28', 'email' => 'k013c1631@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '福田', 'l_name_k' => 'フクダ', 'class_id' => 11),
			array('username' => 'k013c1632', 'pass' => 'pass', 'date' => '1994/1/28', 'email' => 'k013c1632@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '福田', 'l_name_k' => 'フクダ', 'class_id' => 11),
			array('username' => 'k013c1633', 'pass' => 'pass', 'date' => '1994/1/28', 'email' => 'k013c1633@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '福田', 'l_name_k' => 'フクダ', 'class_id' => 11),
			array('username' => 'k013c1634', 'pass' => 'pass', 'date' => '1994/1/28', 'email' => 'k013c1634@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '福田', 'l_name_k' => 'フクダ', 'class_id' => 11),
			array('username' => 'k013c1635', 'pass' => 'pass', 'date' => '1994/1/28', 'email' => 'k013c1635@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '福田', 'l_name_k' => 'フクダ', 'class_id' => 11),
			array('username' => 'k013c1636', 'pass' => 'pass', 'date' => '1994/1/29', 'email' => 'k013c1636@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '西村', 'l_name_k' => 'ニシムラ', 'class_id' => 11),
			array('username' => 'k013c1637', 'pass' => 'pass', 'date' => '1994/1/29', 'email' => 'k013c1637@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '西村', 'l_name_k' => 'ニシムラ', 'class_id' => 11),
			array('username' => 'k013c1638', 'pass' => 'pass', 'date' => '1994/1/29', 'email' => 'k013c1638@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '西村', 'l_name_k' => 'ニシムラ', 'class_id' => 11),
			array('username' => 'k013c1639', 'pass' => 'pass', 'date' => '1994/1/29', 'email' => 'k013c1639@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '西村', 'l_name_k' => 'ニシムラ', 'class_id' => 11),
			array('username' => 'k013c1640', 'pass' => 'pass', 'date' => '1994/1/29', 'email' => 'k013c1640@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '西村', 'l_name_k' => 'ニシムラ', 'class_id' => 11),
			array('username' => 'k013c1641', 'pass' => 'pass', 'date' => '1994/1/29', 'email' => 'k013c1641@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '西村', 'l_name_k' => 'ニシムラ', 'class_id' => 11),
			array('username' => 'k013c1642', 'pass' => 'pass', 'date' => '1994/1/29', 'email' => 'k013c1642@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '西村', 'l_name_k' => 'ニシムラ', 'class_id' => 11),
			array('username' => 'k013c1643', 'pass' => 'pass', 'date' => '1994/1/29', 'email' => 'k013c1643@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '西村', 'l_name_k' => 'ニシムラ', 'class_id' => 11),
			array('username' => 'k013c1644', 'pass' => 'pass', 'date' => '1994/1/29', 'email' => 'k013c1644@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '西村', 'l_name_k' => 'ニシムラ', 'class_id' => 11),
			array('username' => 'k013c1645', 'pass' => 'pass', 'date' => '1994/1/29', 'email' => 'k013c1645@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '西村', 'l_name_k' => 'ニシムラ', 'class_id' => 11),
			array('username' => 'k013c1646', 'pass' => 'pass', 'date' => '1994/1/30', 'email' => 'k013c1646@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '太田', 'l_name_k' => 'フトダ', 'class_id' => 11),
			array('username' => 'k013c1647', 'pass' => 'pass', 'date' => '1994/1/30', 'email' => 'k013c1647@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '太田', 'l_name_k' => 'フトダ', 'class_id' => 11),
			array('username' => 'k013c1648', 'pass' => 'pass', 'date' => '1994/1/30', 'email' => 'k013c1648@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '太田', 'l_name_k' => 'フトダ', 'class_id' => 11),
			array('username' => 'k013c1649', 'pass' => 'pass', 'date' => '1994/1/30', 'email' => 'k013c1649@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '太田', 'l_name_k' => 'フトダ', 'class_id' => 11),
			array('username' => 'k013c1650', 'pass' => 'pass', 'date' => '1994/1/30', 'email' => 'k013c1650@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '太田', 'l_name_k' => 'フトダ', 'class_id' => 11),
			array('username' => 'k013c1651', 'pass' => 'pass', 'date' => '1994/1/30', 'email' => 'k013c1651@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '太田', 'l_name_k' => 'フトダ', 'class_id' => 11),
			array('username' => 'k013c1652', 'pass' => 'pass', 'date' => '1994/1/30', 'email' => 'k013c1652@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '太田', 'l_name_k' => 'フトダ', 'class_id' => 11),
			array('username' => 'k013c1653', 'pass' => 'pass', 'date' => '1994/1/30', 'email' => 'k013c1653@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '太田', 'l_name_k' => 'フトダ', 'class_id' => 11),
			array('username' => 'k013c1654', 'pass' => 'pass', 'date' => '1994/1/30', 'email' => 'k013c1654@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '太田', 'l_name_k' => 'フトダ', 'class_id' => 11),
			array('username' => 'k013c1655', 'pass' => 'pass', 'date' => '1994/1/30', 'email' => 'k013c1655@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '太田', 'l_name_k' => 'フトダ', 'class_id' => 11),
			array('username' => 'k013c1656', 'pass' => 'pass', 'date' => '1994/1/31', 'email' => 'k013c1656@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '原田', 'l_name_k' => 'ハラダ', 'class_id' => 12),
			array('username' => 'k013c1657', 'pass' => 'pass', 'date' => '1994/1/31', 'email' => 'k013c1657@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '原田', 'l_name_k' => 'ハラダ', 'class_id' => 12),
			array('username' => 'k013c1658', 'pass' => 'pass', 'date' => '1994/1/31', 'email' => 'k013c1658@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '原田', 'l_name_k' => 'ハラダ', 'class_id' => 12),
			array('username' => 'k013c1659', 'pass' => 'pass', 'date' => '1994/1/31', 'email' => 'k013c1659@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '原田', 'l_name_k' => 'ハラダ', 'class_id' => 12),
			array('username' => 'k013c1660', 'pass' => 'pass', 'date' => '1994/1/31', 'email' => 'k013c1660@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '原田', 'l_name_k' => 'ハラダ', 'class_id' => 12),
			array('username' => 'k013c1661', 'pass' => 'pass', 'date' => '1994/1/31', 'email' => 'k013c1661@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '原田', 'l_name_k' => 'ハラダ', 'class_id' => 12),
			array('username' => 'k013c1662', 'pass' => 'pass', 'date' => '1994/1/31', 'email' => 'k013c1662@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '原田', 'l_name_k' => 'ハラダ', 'class_id' => 12),
			array('username' => 'k013c1663', 'pass' => 'pass', 'date' => '1994/1/31', 'email' => 'k013c1663@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '原田', 'l_name_k' => 'ハラダ', 'class_id' => 12),
			array('username' => 'k013c1664', 'pass' => 'pass', 'date' => '1994/1/31', 'email' => 'k013c1664@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '原田', 'l_name_k' => 'ハラダ', 'class_id' => 12),
			array('username' => 'k013c1665', 'pass' => 'pass', 'date' => '1994/1/31', 'email' => 'k013c1665@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '原田', 'l_name_k' => 'ハラダ', 'class_id' => 12),
			array('username' => 'k013c1666', 'pass' => 'pass', 'date' => '1994/2/1', 'email' => 'k013c1666@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '中野', 'l_name_k' => 'ナカノ', 'class_id' => 12),
			array('username' => 'k013c1667', 'pass' => 'pass', 'date' => '1994/2/1', 'email' => 'k013c1667@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '中野', 'l_name_k' => 'ナカノ', 'class_id' => 12),
			array('username' => 'k013c1668', 'pass' => 'pass', 'date' => '1994/2/1', 'email' => 'k013c1668@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '中野', 'l_name_k' => 'ナカノ', 'class_id' => 12),
			array('username' => 'k013c1669', 'pass' => 'pass', 'date' => '1994/2/1', 'email' => 'k013c1669@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '中野', 'l_name_k' => 'ナカノ', 'class_id' => 12),
			array('username' => 'k013c1670', 'pass' => 'pass', 'date' => '1994/2/1', 'email' => 'k013c1670@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '中野', 'l_name_k' => 'ナカノ', 'class_id' => 12),
			array('username' => 'k013c1671', 'pass' => 'pass', 'date' => '1994/2/1', 'email' => 'k013c1671@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '中野', 'l_name_k' => 'ナカノ', 'class_id' => 12),
			array('username' => 'k013c1672', 'pass' => 'pass', 'date' => '1994/2/1', 'email' => 'k013c1672@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '中野', 'l_name_k' => 'ナカノ', 'class_id' => 12),
			array('username' => 'k013c1673', 'pass' => 'pass', 'date' => '1994/2/1', 'email' => 'k013c1673@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '中野', 'l_name_k' => 'ナカノ', 'class_id' => 12),
			array('username' => 'k013c1674', 'pass' => 'pass', 'date' => '1994/2/1', 'email' => 'k013c1674@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '中野', 'l_name_k' => 'ナカノ', 'class_id' => 12),
			array('username' => 'k013c1675', 'pass' => 'pass', 'date' => '1994/2/1', 'email' => 'k013c1675@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '中野', 'l_name_k' => 'ナカノ', 'class_id' => 12),
			array('username' => 'k013c1676', 'pass' => 'pass', 'date' => '1994/2/2', 'email' => 'k013c1676@it-neec.jp', 'f_name' => '一郎', 'f_name_k' => 'イチロウ', 'l_name' => '小野', 'l_name_k' => 'オノ', 'class_id' => 12),
			array('username' => 'k013c1677', 'pass' => 'pass', 'date' => '1994/2/2', 'email' => 'k013c1677@it-neec.jp', 'f_name' => '次郎', 'f_name_k' => 'ジロウ', 'l_name' => '小野', 'l_name_k' => 'オノ', 'class_id' => 12),
			array('username' => 'k013c1678', 'pass' => 'pass', 'date' => '1994/2/2', 'email' => 'k013c1678@it-neec.jp', 'f_name' => '三郎', 'f_name_k' => 'サブロウ', 'l_name' => '小野', 'l_name_k' => 'オノ', 'class_id' => 12),
			array('username' => 'k013c1679', 'pass' => 'pass', 'date' => '1994/2/2', 'email' => 'k013c1679@it-neec.jp', 'f_name' => '四郎', 'f_name_k' => 'シロウ', 'l_name' => '小野', 'l_name_k' => 'オノ', 'class_id' => 12),
			array('username' => 'k013c1680', 'pass' => 'pass', 'date' => '1994/2/2', 'email' => 'k013c1680@it-neec.jp', 'f_name' => '五郎', 'f_name_k' => 'ゴロウ', 'l_name' => '小野', 'l_name_k' => 'オノ', 'class_id' => 12),
			array('username' => 'k013c1681', 'pass' => 'pass', 'date' => '1994/2/2', 'email' => 'k013c1681@it-neec.jp', 'f_name' => '六郎', 'f_name_k' => 'ロクロウ', 'l_name' => '小野', 'l_name_k' => 'オノ', 'class_id' => 12),
			array('username' => 'k013c1682', 'pass' => 'pass', 'date' => '1994/2/2', 'email' => 'k013c1682@it-neec.jp', 'f_name' => '七郎', 'f_name_k' => 'ナナロウ', 'l_name' => '小野', 'l_name_k' => 'オノ', 'class_id' => 12),
			array('username' => 'k013c1683', 'pass' => 'pass', 'date' => '1994/2/2', 'email' => 'k013c1683@it-neec.jp', 'f_name' => '八郎', 'f_name_k' => 'ハチロウ', 'l_name' => '小野', 'l_name_k' => 'オノ', 'class_id' => 12),
			array('username' => 'k013c1684', 'pass' => 'pass', 'date' => '1994/2/2', 'email' => 'k013c1684@it-neec.jp', 'f_name' => '九郎', 'f_name_k' => 'クロウ', 'l_name' => '小野', 'l_name_k' => 'オノ', 'class_id' => 12),
			array('username' => 'k013c1685', 'pass' => 'pass', 'date' => '1994/2/2', 'email' => 'k013c1685@it-neec.jp', 'f_name' => '十郎', 'f_name_k' => 'ジュウロウ', 'l_name' => '小野', 'l_name_k' => 'オノ', 'class_id' => 12),


		);

		foreach($student_lists as $student)
		{
			\Auth::instance('studentauth')
			     ->create_student($student['username'],$student['pass'],$student['date'],$student['email'],0,$student['f_name'],$student['f_name_k'],
				     $student['l_name'],$student['l_name_k'],$student['class_id']);
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
			array('name' => '合同資格対策講座', 'term' => 2, 'sum_credit' => 27, 'class_id' => 1),
			array('name' => 'マーケティング', 'term' => 2, 'sum_credit' => 18, 'class_id' => 1),
			array('name' => 'プロジェクトマネジメント', 'term' => 2, 'sum_credit' => 18, 'class_id' => 1),
			array('name' => 'キャリアデザイン2', 'term' => 2, 'sum_credit' => 27, 'class_id' => 1),
			array('name' => 'ビジネススキル4', 'term' => 2, 'sum_credit' => 18, 'class_id' => 1),
			array('name' => 'モバイルプログラミング', 'term' => 2, 'sum_credit' => 54, 'class_id' => 1),
			array('name' => 'システム開発グループ演習1', 'term' => 2, 'sum_credit' => 54, 'class_id' => 1),
			array('name' => '資格対策講座6', 'term' => 2, 'sum_credit' => 9, 'class_id' => 1),
		);

		$query = \DB::insert('lesson')->columns(array('name','term','sum_credit','created_at','updated_at','class_id'));
		foreach($lesson_lists as $lesson)
		{
			$query->values(array($lesson['name'], $lesson['term'], $lesson['sum_credit'], time(), null, $lesson['class_id']));
		}
		$query->execute();

		/* 授業割り当て */
		$attachment_lesson_lists = array(
			array('teacher_id' => 1, 'lesson_id' => 1),
			array('teacher_id' => 2, 'lesson_id' => 2),
			array('teacher_id' => 3, 'lesson_id' => 3),
			array('teacher_id' => 4, 'lesson_id' => 4),
			array('teacher_id' => 5, 'lesson_id' => 5),
			array('teacher_id' => 6, 'lesson_id' => 5),
			array('teacher_id' => 7, 'lesson_id' => 6),
			array('teacher_id' => 8, 'lesson_id' => 7),
			array('teacher_id' => 9, 'lesson_id' => 8),
			array('teacher_id' => 10, 'lesson_id' => 9),
			array('teacher_id' => 11, 'lesson_id' => 10),
			array('teacher_id' => 1, 'lesson_id' => 10),
			array('teacher_id' => 2, 'lesson_id' => 11),
			array('teacher_id' => 3, 'lesson_id' => 12),
			array('teacher_id' => 4, 'lesson_id' => 13),
			array('teacher_id' => 5, 'lesson_id' => 14),
			array('teacher_id' => 6, 'lesson_id' => 15),
			array('teacher_id' => 7, 'lesson_id' => 15),
			array('teacher_id' => 8, 'lesson_id' => 16),

			array('teacher_id' => 1, 'lesson_id' => 17),
			array('teacher_id' => 2, 'lesson_id' => 17),
			array('teacher_id' => 3, 'lesson_id' => 17),
			array('teacher_id' => 4, 'lesson_id' => 17),
			array('teacher_id' => 5, 'lesson_id' => 18),
			array('teacher_id' => 6, 'lesson_id' => 19),
			array('teacher_id' => 7, 'lesson_id' => 20),
			array('teacher_id' => 8, 'lesson_id' => 21),
			array('teacher_id' => 9, 'lesson_id' => 22),
			array('teacher_id' => 10, 'lesson_id' => 23),
			array('teacher_id' => 11, 'lesson_id' => 24),

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
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array(),
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
			),
			array(
				array('lesson_id' => 1, 'room_number' => '30711', 'notes' => ''),
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array(),
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
			),
			array(
				array('lesson_id' => 1, 'room_number' => '30711', 'notes' => ''),
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array(),
				array('lesson_id' => 4, 'room_number' => '30615', 'notes' => 'PC持参'),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
			),
			array( array(), array(), array(), array(), array(),),
			array(
				array('lesson_id' => 2, 'room_number' => '30615', 'notes' => 'PC持参'),
				array(),
				array('lesson_id' => 5, 'room_number' => '30503', 'notes' => ''),
				array('lesson_id' => 6, 'room_number' => '30507', 'notes' => ''),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
			),
			array(
				array('lesson_id' => 2, 'room_number' => '30615', 'notes' => 'PC持参'),
				array(),
				array('lesson_id' => 5, 'room_number' => '30503', 'notes' => ''),
				array('lesson_id' => 6, 'room_number' => '30507', 'notes' => ''),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
			),
			array(
				array('lesson_id' => 3, 'room_number' => '30615', 'notes' => ''),
				array(),
				array(),
				array('lesson_id' => 6, 'room_number' => '30507', 'notes' => ''),
				array('lesson_id' => 7, 'room_number' => '30718', 'notes' => 'PC持参'),
			),
			array(
				array('lesson_id' => 3, 'room_number' => '30615', 'notes' => ''),
				array(),
				array(),
				array(),
				array(),
			),
		);
		$timetable2 = array(
			array(
				array('lesson_id' => 17, 'room_number' => 'それぞれ', 'notes' => ''),
				array('lesson_id' => 20, 'room_number' => '30605', 'notes' => 'PC持参'),
				array('lesson_id' => 21, 'room_number' => '30707', 'notes' => ''),
				array(),
				array('lesson_id' => 23, 'room_number' => '30715', 'notes' => ''),
			),
			array(
				array('lesson_id' => 17, 'room_number' => 'それぞれ', 'notes' => ''),
				array('lesson_id' => 20, 'room_number' => '30605', 'notes' => 'PC持参'),
				array('lesson_id' => 21, 'room_number' => '30707', 'notes' => ''),
				array(),
				array('lesson_id' => 23, 'room_number' => '30715', 'notes' => ''),
			),
			array(
				array('lesson_id' => 17, 'room_number' => 'それぞれ', 'notes' => ''),
				array('lesson_id' => 20, 'room_number' => '30605', 'notes' => 'PC持参'),
				array(),
				array(),
				array('lesson_id' => 23, 'room_number' => '30715', 'notes' => ''),
			),
			array( array(), array(), array(), array(), array(),),
			array(
				array('lesson_id' => 18, 'room_number' => '30714', 'notes' => 'PC持参'),
				array(),
				array('lesson_id' => 22, 'room_number' => '30717', 'notes' => ''),
				array('lesson_id' => 22, 'room_number' => '30714', 'notes' => ''),
				array('lesson_id' => 23, 'room_number' => '30715', 'notes' => ''),
			),
			array(
				array('lesson_id' => 18, 'room_number' => '30714', 'notes' => 'PC持参'),
				array(),
				array('lesson_id' => 22, 'room_number' => '30717', 'notes' => ''),
				array('lesson_id' => 22, 'room_number' => '30714', 'notes' => ''),
				array('lesson_id' => 23, 'room_number' => '30715', 'notes' => ''),
			),
			array(
				array('lesson_id' => 19, 'room_number' => '30714', 'notes' => ''),
				array(),
				array('lesson_id' => 22, 'room_number' => '30717', 'notes' => ''),
				array('lesson_id' => 22, 'room_number' => '30714', 'notes' => ''),
				array('lesson_id' => 23, 'room_number' => '30715', 'notes' => ''),
			),
			array(
				array('lesson_id' => 19, 'room_number' => '30714', 'notes' => ''),
				array(),
				array(),
				array(),
				array('lesson_id' => 24, 'room_number' => '30715', 'notes' => ''),
			),
		);

		$query = \DB::insert('timetable')->columns(array('name','html','created_at','updated_at','is_active','class_id'));
		$query->values(array('IS07-1前期時間割', json_encode($timetable), time(), null, 1, 1));
		$query->values(array('IS07-1後期時間割', json_encode($timetable2), time() + 1, null, 1, 1));
		$query->execute();


		/* 学内説明会 */
		$oncampus_lists = array(
			array(
				'company_name' => '株式会社KATO',
				'company_code' => '2315235',
				'start_date'   => '2016/1/12',
				'start_time'   => '13:00:00',
				'end_time'     => '17:00:00',
				'entry_start'  => '2015/12/31',
				'entry_end'    => '2016/1/6',
				'target'       => '2017年度卒業見込み者',
				'location'     => '30715教室',
				'content'      => '会社説明会',
				'explainer'    => '加藤拓磨',
				'bring'        => 'バイク',
				'url'          => 'http://kato.com',
				'recruitment'  => '["システムエンジニア","プログラマ"]',
				'files'        => '[]',
				'note'         => '道路交通法は守りましょう',
				'teacher_id'   => 1,
			),
			array(
				'company_name' => '株式会社黄金りんご',
				'company_code' => '123132',
				'start_date'   => '2016/1/12',
				'start_time'   => '13:00:00',
				'end_time'     => '17:00:00',
				'entry_start'  => '2015/12/31',
				'entry_end'    => '2016/1/6',
				'target'       => '2017年度卒業見込み者',
				'location'     => '30617教室',
				'content'      => 'りんご説明会',
				'explainer'    => '鳴海翔太',
				'bring'        => 'りんご',
				'url'          => 'http://narumi.com',
				'recruitment'  => '["農業","畜産業"]',
				'files'        => '[]',
				'note'         => '神',
				'teacher_id'   => 1,
			),
			array(
				'company_name' => '老人ホームSASAKI',
				'company_code' => '54315235',
				'start_date'   => '2016/1/12',
				'start_time'   => '13:00:00',
				'end_time'     => '17:00:00',
				'entry_start'  => '2015/12/31',
				'entry_end'    => '2016/1/6',
				'target'       => '2017年度卒業見込み者',
				'location'     => '30715教室',
				'content'      => '会社説明会',
				'explainer'    => '佐々木佑梨',
				'bring'        => 'お土産',
				'url'          => 'http://sasaki.com',
				'recruitment'  => '["介護"]',
				'files'        => '[]',
				'note'         => '',
				'teacher_id'   => 1,
			),

		);

		for($i = 0; $i < 500; $i++)
		{
			$entry_start = self::random_date();
			$entry_end = self::random_date($entry_start);

			$start_date = self::random_date($entry_end);
			$start_time = self::random_time();
			$end_time = self::random_time($start_time);

			$oncampus_lists[] = array(
				'company_name' => self::random_company_name(),
				'company_code' => mt_rand(100000, 999999),
				'start_date'   => $start_date,
				'start_time'   => $start_time,
				'end_time'     => $end_time,
				'entry_start'  => $entry_start,
				'entry_end'    => $entry_end,
				'target'       => '2017年度卒業見込み者',
				'location'     => '30715教室',
				'content'      => '会社説明会',
				'explainer'    => '未定',
				'bring'        => self::random_bring(),
				'url'          => 'http://' . self::random_string() . '.com',
				'recruitment'  => self::random_recruitment(),
				'files'        => '[]',
				'note'         => self::random_text(),
				'teacher_id'   => 1,
			);
		}

		$query = \DB::insert('oncampus')->columns(
			array('company_name', 'company_code', 'start_date', 'start_time',
			'end_time', 'entry_start', 'entry_end', 'target', 'location', 'content', 'explainer', 'bring',
			'url', 'recruitment', 'files', 'note', 'created_at', 'updated_at', 'teacher_id')
		);

		foreach($oncampus_lists as $oncampus)
		{
			$query->values(
				array($oncampus['company_name'], $oncampus['company_code'], $oncampus['start_date'],
					$oncampus['start_time'], $oncampus['end_time'], $oncampus['entry_start'],
					$oncampus['entry_end'], $oncampus['target'], $oncampus['location'],
					$oncampus['content'], $oncampus['explainer'], $oncampus['bring'],
					$oncampus['url'], $oncampus['recruitment'], $oncampus['files'],
					$oncampus['note'], time(), null, $oncampus['teacher_id'])
			);
		}
		$query->execute();


		/* 学内説明会参加者 */
		$onparticipant_lists = array(
			// 渡辺
			array('oncampus_id' => 1, 'student_id' => 18, 'entry_at' => '2016/1/2 13:00:00'),
			array('oncampus_id' => 2, 'student_id' => 18, 'entry_at' => '2016/1/2 13:30:00'),
			array('oncampus_id' => 3, 'student_id' => 18, 'entry_at' => '2016/1/3 14:00:00'),
			// 加藤
			array('oncampus_id' => 2, 'student_id' => 29, 'entry_at' => '2016/1/2 15:30:00'),
			array('oncampus_id' => 3, 'student_id' => 29, 'entry_at' => '2016/1/3 16:00:00'),
			// 笠井
			array('oncampus_id' => 1, 'student_id' => 35, 'entry_at' => '2016/1/1 9:00:00'),
			array('oncampus_id' => 2, 'student_id' => 35, 'entry_at' => '2016/1/1 9:30:00'),
			array('oncampus_id' => 3, 'student_id' => 35, 'entry_at' => '2016/1/1 9:55:00'),
			// 鳴海
			array('oncampus_id' => 1, 'student_id' => 1, 'entry_at' => '2016/1/3 19:00:00'),
			array('oncampus_id' => 3, 'student_id' => 1, 'entry_at' => '2016/1/3 19:55:00'),
			// 佐々木
			array('oncampus_id' => 1, 'student_id' => 34, 'entry_at' => '2016/1/3 21:00:00'),
			array('oncampus_id' => 2, 'student_id' => 34, 'entry_at' => '2016/1/3 23:55:00'),
			// 芦沢
			array('oncampus_id' => 2, 'student_id' => 7, 'entry_at' => '2016/1/4 1:00:00'),
		);

		$query = \DB::insert('onparticipant')->columns(array('oncampus_id', 'student_id', 'entry_at'));
		foreach($onparticipant_lists as $onparticipant)
		{
			$query->values(array($onparticipant['oncampus_id'], $onparticipant['student_id'],
				strtotime($onparticipant['entry_at'])));
		}
		$query->execute();


		/* 学外説明会 */
		$offcampus_lists = array(
			array(
				'company_name' => 'KATO Holdings Inc.',
				'company_code' => '2315235',
				'start_date'   => '2016/2/12',
				'start_time'   => '13:00:00',
				'end_time'     => '17:00:00',
				'entry_start'  => '2016/1/15/',
				'entry_end'    => '2016/2/6',
				'target'       => '2017年度卒業見込み者',
				'location'     => '30715教室',
				'content'      => '会社説明会',
				'explainer'    => 'Takuma K',
				'bring'        => 'Bike',
				'url'          => 'http://kato.com',
				'entry_method' => 'Webから',
				'tel'          => '000-0000-0000',
				'email'        => 'email@email.com',
				'recruitment'  => '["システムエンジニア","プログラマ"]',
				'files'        => '[]',
				'note'         => '道路交通法は守りましょう',
				'teacher_id'   => 1,
			),
			array(
				'company_name' => 'Ringo Holdings Inc.',
				'company_code' => '123132',
				'start_date'   => '2016/2/12',
				'start_time'   => '13:00:00',
				'end_time'     => '17:00:00',
				'entry_start'  => '2016/1/16/',
				'entry_end'    => '2016/2/6',
				'target'       => '2017年度卒業見込み者',
				'location'     => '30617教室',
				'content'      => 'Apple説明会',
				'explainer'    => 'Syota N',
				'bring'        => 'Apple',
				'url'          => 'http://narumi.com',
				'entry_method' => 'Webから',
				'tel'          => '00-0000-0000',
				'email'        => 'email@email.com',
				'recruitment'  => '["農業","畜産業"]',
				'files'        => '[]',
				'note'         => '神',
				'teacher_id'   => 1,
			),
			array(
				'company_name' => 'SASAKI Holdings Inc.',
				'company_code' => '54315235',
				'start_date'   => '2016/2/12',
				'start_time'   => '13:00:00',
				'end_time'     => '17:00:00',
				'entry_start'  => '2016/1/20/',
				'entry_end'    => '2016/2/6',
				'target'       => '2017年度卒業見込み者',
				'location'     => '30715教室',
				'content'      => '会社説明会',
				'explainer'    => 'Yuri S',
				'bring'        => '貢物',
				'url'          => 'http://sasaki.com',
				'entry_method' => '電話申し込み',
				'tel'          => '00-0000-0000',
				'email'        => 'email@email.com',
				'recruitment'  => '["介護"]',
				'files'        => '[]',
				'note'         => '',
				'teacher_id'   => 1,
			),

		);

		for($i = 0; $i < 500; $i++)
		{
			$entry_start = self::random_date();
			$entry_end = self::random_date($entry_start);

			$start_date = self::random_date($entry_end);
			$start_time = self::random_time();
			$end_time = self::random_time($start_time);

			$offcampus_lists[] = array(
				'company_name' => self::random_company_name(),
				'company_code' => mt_rand(100000, 999999),
				'start_date'   => $start_date,
				'start_time'   => $start_time,
				'end_time'     => $end_time,
				'entry_start'  => $entry_start,
				'entry_end'    => $entry_end,
				'target'       => '2017年度卒業見込み者',
				'location'     => '30715教室',
				'content'      => '会社説明会',
				'explainer'    => '未定',
				'bring'        => self::random_bring(),
				'url'          => 'http://' . self::random_string() . '.com',
				'entry_method' => '電話申し込み',
				'tel'          => '00-0000-0000',
				'email'        => self::random_string() . '@' . self::random_string() . '.com',
				'recruitment'  => self::random_recruitment(),
				'files'        => '[]',
				'note'         => self::random_text(),
				'teacher_id'   => 1,
			);
		}
		$query = \DB::insert('offcampus')->columns(
			array('company_name', 'company_code', 'start_date', 'start_time',
				'end_time', 'entry_start', 'entry_end', 'target', 'location', 'content',
				'explainer', 'bring', 'url', 'entry_method', 'tel', 'email', 'recruitment',
				'files', 'note', 'created_at', 'updated_at', 'teacher_id')
		);

		foreach($offcampus_lists as $offcampus)
		{
			$query->values(
				array($offcampus['company_name'], $offcampus['company_code'], $offcampus['start_date'],
					$offcampus['start_time'], $offcampus['end_time'], $offcampus['entry_start'],
					$offcampus['entry_end'], $offcampus['target'], $offcampus['location'],
					$offcampus['content'], $offcampus['explainer'], $offcampus['bring'],
					$offcampus['url'], $offcampus['entry_method'], $offcampus['tel'],
					$offcampus['email'], $offcampus['recruitment'], $offcampus['files'],
					$offcampus['note'], time(), null, $offcampus['teacher_id'])
			);
		}
		$query->execute();


		/* 学外説明会参加者 */
		$offparticipant_lists = array(
			// 渡辺
			array('offcampus_id' => 1, 'student_id' => 18, 'entry_at' => '2016/2/2 13:00:00'),
			array('offcampus_id' => 2, 'student_id' => 18, 'entry_at' => '2016/2/2 13:30:00'),
			array('offcampus_id' => 3, 'student_id' => 18, 'entry_at' => '2016/2/3 14:00:00'),
			// 加藤
			array('offcampus_id' => 2, 'student_id' => 29, 'entry_at' => '2016/2/2 15:30:00'),
			array('offcampus_id' => 3, 'student_id' => 29, 'entry_at' => '2016/2/3 16:00:00'),
			// 笠井
			array('offcampus_id' => 1, 'student_id' => 35, 'entry_at' => '2016/2/1 9:00:00'),
			array('offcampus_id' => 2, 'student_id' => 35, 'entry_at' => '2016/2/1 9:30:00'),
			array('offcampus_id' => 3, 'student_id' => 35, 'entry_at' => '2016/2/1 9:55:00'),
			// 鳴海
			array('offcampus_id' => 1, 'student_id' => 1, 'entry_at' => '2016/2/3 19:00:00'),
			array('offcampus_id' => 3, 'student_id' => 1, 'entry_at' => '2016/2/3 19:55:00'),
			// 佐々木
			array('offcampus_id' => 1, 'student_id' => 34, 'entry_at' => '2016/2/3 21:00:00'),
			array('offcampus_id' => 2, 'student_id' => 34, 'entry_at' => '2016/2/3 23:55:00'),
			// 芦沢
			array('offcampus_id' => 2, 'student_id' => 7, 'entry_at' => '2016/2/4 1:00:00'),
		);

		$query = \DB::insert('offparticipant')->columns(array('offcampus_id', 'student_id', 'entry_at'));
		foreach($offparticipant_lists as $offparticipant)
		{
			$query->values(array($offparticipant['offcampus_id'], $offparticipant['student_id'],
				strtotime($offparticipant['entry_at'])));
		}
		$query->execute();
	}

	public static function delete()
	{
		$tables = array(
			'offparticipant',
			'offcampus',
			'onparticipant',
			'oncampus',
			'attendance_status',
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

	private static function random_string()
	{
		static $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ';
		$length = mt_rand(8, 20);
		$result = '';
		for($i = 0; $i < $length; $i++)
		{
			$result .= $chars[mt_rand(0, strlen($chars) - 1)];
		}

		return $result;
	}
	private static function random_text()
	{
		$line = mt_rand(2, 15);
		$result = '';

		for($i = 0; $i < $line; $i++)
		{
			$result .= self::random_string() . ' ';
			(mt_rand(0, 2)) or $result .= "\n";
		}

		return $result;
	}

	private static function random_company_name()
	{
		$result = self::random_string();
		$result = (mt_rand(0,1)) ? ('株式会社' . $result) : ($result . ' Inc.');
		return $result;
	}

	private static function random_date($from = null)
	{
		$start_year = 2015;
		$start_month = 1;
		$start_day = 1;

		(is_null($from)) or list($start_year, $start_month, $start_day) = explode('/', $from);

		return sprintf('%02d/%02d/%02d', mt_rand($start_year, $start_year + 1), mt_rand($start_month, 12), mt_rand($start_day, 29));
	}

	private static function random_time($from = null)
	{
		$start_hour = 0;
		$start_minute = 0;
		$start_second = 0;

		(is_null($from)) or list($start_hour, $start_minute, $start_second) = explode(':', $from);

		return sprintf('%02d:%02d:%02d', mt_rand($start_hour, 23), mt_rand($start_minute, 59), mt_rand($start_second, 59));
	}

	private static function random_bring()
	{
		static $brings = array('筆記用具', 'メモ', 'ノート', '貢物', 'りんご', 'Apple', 'apple', 'APPLE', 'PC', 'スマホ',
			'LANケーブル', '財布', '受験票', 'パンフレット', '申込書', '電卓', 'やる気', '手提げ', 'バッグ');
		$quantity = mt_rand(1, 3);
		$used = array();
		$result = '';

		for($i = 0; $i < $quantity; $i++)
		{
			$index = mt_rand(0, count($brings) - 1);
			if(in_array($index, $used))
			{
				$i--;
			}
			else
			{
				$result .= $brings[$index] . ' ';
				$used[] = $index;
			}
		}

		return $result;
	}

	private static function random_recruitment()
	{
		static $recruitments = array('システムエンジニア', 'プログラマ', 'ITコンサルタント', 'システムコンサルト',
			'アプリケーションエンジニア', '通信インフラエンジニア', 'ヘルプデスク', 'ネットワークエンジニア',
			'サーバエンジニア', 'データベースエンジニア', 'セキュリティエンジニア', 'Webプログラマ',
			'フロントエンドプログラマ', 'バックエンドプログラマ', 'Webディレクター', '経理アシスタント', '財務アシスタント',
			'総務アシスタント', '法務アシスタント', '公報アシスタント', 'マーケティングアシスタント', '秘書', '受付',
			'CADオペレータ', 'サービスエンジニア', 'プロジェクトマネージャ', 'メディカルドクター', 'ファンドマネージャ',
			'サウンドクリエイター', 'イラストレイター', 'シナリオライター', 'プロダクトデザイナ', 'アナリスト');
		$quantity = mt_rand(1, 5);
		$used = array();
		$result = array();

		for($i = 0; $i < $quantity; $i++)
		{
			$index = mt_rand(0, count($recruitments) - 1);
			if(in_array($index, $used))
			{
				$i--;
			}
			else
			{
				$result[] = $recruitments[$index];
				$used[] = $index;
			}
		}

		return json_encode($result);
	}
}