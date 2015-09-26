<section class="content-header">
	<h1>
		専攻一覧
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
<div id="MAJOR_LIST">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">専攻一覧</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<table class="table table-bordered table-hover">
				<tbody>
					<tr>
						<th>#</th>
						<th>専攻名</th>
						<th>所属学科名</th>
						<th>所属カレッジ名</th>
					</tr>
					<?php foreach($major_lists as $major_list): ?>
					<tr>
						<td>1.</td>
						<td><?php echo $major_list['name']; ?></td>
						<td><?php echo $major_list['course_name']; ?></td>
						<td><?php echo $major_list['college_name']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.box-body -->
	</div>
</div>
</section>