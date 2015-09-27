<section class="content-header">
	<h1>
		学科一覧
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
<div id="COURSE_LIST">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">学科一覧</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<table class="table table-bordered table-striped table-hover">
				<tbody>
					<tr>
						<th>学科コード</th>
						<th>学科名</th>
						<th>年制</th>
						<th>所属カレッジ名</th>
					</tr>
					<?php foreach($course_lists as $course_list): ?>
					<tr>
						<td><?php echo $course_list['code']; ?></td>
						<td><?php echo $course_list['name']; ?></td>
						<td><?php echo $course_list['year_system']; ?></td>
						<td><?php echo $course_list['college_name']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.box-body -->
	</div>
</div>
</section>