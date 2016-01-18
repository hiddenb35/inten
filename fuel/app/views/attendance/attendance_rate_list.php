<!-- Main content -->
<section id="ATTENDANCE_RATE_LIST" class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover table-condensed">
						<thead class="row">
						<tr>
							<th class="col-sm-3 col-xs-5">学籍番号</th>
							<th class="col-sm-3 col-xs-5">名前</th>
							<th class="col-sm-3 hidden-xs">フリガナ</th>
							<th colspan="2" class="col-sm-3 col-xs-2">出席率</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach($student_lists as $student_list): ?>
							<tr>
								<td><?php echo $student_list['number']; ?></td>
								<td><?php echo $student_list['full_name']; ?></td>
								<td class="hidden-xs"><?php echo $student_list['full_name_kana']; ?></td>
								<td class="hidden-xs progress">
									<div class="progress-bar <?php echo $student_list['rate_bar_class']; ?>" style="width: <?php echo $student_list['rate']; ?>;"></div>
								</td>
								<td class="text-center"><span class="badge <?php echo $student_list['rate_bg_class']; ?>"><?php echo $student_list['rate']; ?></span></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>