<section class="content-header">
	<h1>
		生徒情報閲覧(教員用)
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
<div id="TEACHER_LIST">
	<div class="container">
		<div class="table-responsive">
			<table class="table table-borderd table-striped table-hover">
				<thead>
					<tr>
						<th>学籍番号</th>
						<th>姓</th>
						<th>名</th>
						<th>セイ</th>
						<th>メイ</th>
						<th>生年月日(西暦)</th>
						<th>生年月日(月)</th>
						<th>生年月日(日)</th>
						<th>E-mail</th>
						<th>性別</th>
						<th>クラス</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($teacher_lists as $teacher_list): ?>
					<tr>
						<td>k013c1140</td>
						<td>加藤</td>
						<td>拓磨</td>
						<td>カトウ</td>
						<td>タクマ</td>
						<td>1994</td>
						<td>10</td>
						<td>12</td>
						<td>k013c1140@it-neec.jp</td>
						<td>女</td>
						<td>1</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<table class="table table-borderd table-striped table-hover">
				<thead>
					<tr>
						<th>教員番号</th>
						<th>氏名</th>
						<th>カナ</th>
						<th>生年月日</th>
						<th>E-mail</th>
						<th>性別</th>
						<th>クラス</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($teacher_lists as $teacher_list): ?>
					<tr>
						<td><?php echo $teacher_list['number']; ?></td>
						<td><?php echo $teacher_list['full_name']; ?></td>
						<td><?php echo $teacher_list['full_name_kana']; ?></td>
						<td><?php echo $teacher_list['birthday']; ?></td>
						<td><?php echo $teacher_list['email']; ?></td>
						<td><?php echo $teacher_list['gender']; ?></td>
						<td>1</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</section>