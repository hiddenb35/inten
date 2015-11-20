<div id="ATTENDANCE_RATE_LIST">
	<section class="content-header">
		<h1>
			担当する授業の出席率一覧画面
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover table-condensed">
						<thead>
						<tr>
							<th>学籍番号</th>
							<th>名前</th>
							<th class="hidden-xs">フリガナ</th>
							<th colspan="2">出席率</th>
						</tr>
						</thead>
						<tbody class="row">
						<?php foreach($student_lists as $student_list): ?>
							<tr>
								<td><?php echo $student_list['id']; ?></td>
								<td><?php echo $student_list['full_name']; ?></td>
								<td class="hidden-xs"><?php echo $student_list['full_name_kana']; ?></td>
								<td class="col-md-2 hidden-xs progress progress-xs progress-striped active"><div class="progress-bar <?php echo $student_list['rate_bar_class']; ?>" style="width: <?php echo $student_list['rate']; ?>;"></div></td>
								<td class="col-md-1 badge <?php echo $student_list['rate_bg_class']; ?>"><?php echo $student_list['rate']; ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>
