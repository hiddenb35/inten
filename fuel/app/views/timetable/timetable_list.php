<!-- Main content -->
<section id="COLLEGE_LIST" class="content">
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
	<a href="<?php echo Uri::create('timetable/add', array(), array('class_id' => $class_id)); ?>" class="btn btn-primary">時間割を作成</a>


</section>