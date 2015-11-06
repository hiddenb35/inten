<div id="LESSON_LIST">
	<section class="content-header">
		<h1>
			授業一覧画面
		</h1>
		<ol class="breadcrumb">
			<li><a href="#">Home > 授業一覧画面</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-body">
				<table class="table table-bordered table-striped">
					<tbody>
					<tr>
						<th>授業名</th>
						<th>担当教員名</th>
						<th>クラス名</th>
						<th>前後期</th>
						<th>総単位数</th>
					</tr>
					<?php foreach($lesson_lists as $lesson_list): ?>
					<tr>
						<td><?php echo $lesson_list['name']?></td>
						<td><?php echo $lesson_list['teacher_name']?></td>
						<td><?php echo $lesson_list['class_name']?></td>
						<td><?php echo $lesson_list['term']?></td>
						<td><?php echo $lesson_list['sum_credit']?></td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div>
	</section>
</div>