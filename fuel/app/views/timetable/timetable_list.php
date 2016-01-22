<!-- Main content -->
<section id="COLLEGE_LIST" class="content">
	<div class="box box-main">
		<div class="box-body">
			<table class="table table-base" id="college_list_table">
				<thead>
				<tr>
					<th class="col-xs-5 col-sm-2">時間割名</th>
					<th class="col-sm-3 hidden-xs">作成日</th>
					<th class="col-sm-3 hidden-xs">更新日</th>
					<th class="col-xs-3 col-sm-2">ステータス</th>
					<th class="col-xs-4 col-sm-2"></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach($timetable_lists as $timetable): ?>
					<tr>
						<td><?php echo $timetable['name']; ?></td>
						<td class="hidden-xs"><?php echo $timetable['created_at']; ?></td>
						<td class="hidden-xs"><?php echo $timetable['updated_at']; ?></td>
						<td><?php echo $timetable['status']; ?></td>
						<td class="text-center">
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