<div id="STUDENT_LIST">
	<section class="content-header">
		<h1>
			生徒一覧
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover table-condensed">
					<thead>
					<tr class="info">
						<th>学籍番号</th>
						<th>フルネーム</th>
						<th>フルネーム(カナ)</th>
						<th>生年月日</th>
						<th>E-Mail</th>
						<th>性別</th>
						<th>クラス名</th>
						<th>専攻名</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($student_lists as $student_list): ?>
					<tr>
						<td><?php echo $student_list['number']; ?></td>
						<td><?php echo $student_list['full_name']; ?></td>
						<td><?php echo $student_list['full_name_kana']; ?></td>
						<td><?php echo $student_list['birthday']; ?></td>
						<td><?php echo $student_list['email']; ?></td>
						<td><?php echo $student_list['gender']; ?></td>
						<td><?php echo $student_list['class_name']; ?></td>
						<td><?php echo $student_list['major_name']; ?></td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
