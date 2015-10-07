<div id="TEACHER_LIST">
	<section class="content-header">
		<h1>
			教員一覧
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
						<th>教員番号</th>
						<th>フルネーム</th>
						<th>フルネーム(カナ)</th>
						<th>生年月日</th>
						<th>E-Mail</th>
						<th>性別</th>
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
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
