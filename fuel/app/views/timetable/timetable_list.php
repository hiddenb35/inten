<div id="COLLEGE_LIST">
	<section class="content-header">
		<h1>
			<?php echo $class_name; ?> 時間割一覧
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-body">
				<table class="table table-bordered table-striped" id="college_list_table">
					<tbody>
					<tr>
						<th>時間割名</th>
						<th>作成日</th>
						<th>更新日</th>
						<th>ステータス</th>
						<th></th>
					</tr>
					<?php foreach($timetable_lists as $timetable): ?>
						<tr>
							<td><?php echo $timetable['name']; ?></td>
							<td><?php echo $timetable['created_at']; ?></td>
							<td><?php echo $timetable['updated_at']; ?></td>
							<td><?php echo $timetable['status']; ?></td>
							<td>
								<a href="<?php echo $timetable['edit_link']; ?>" class="btn btn-primary btn-sm">編集</a>
								<a href="<?php echo $timetable['delete_link']; ?>" class="btn btn-danger btn-sm">削除</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div>
		<div id="edit_modal_content" class="alert">
		</div>
	</section>
</div>