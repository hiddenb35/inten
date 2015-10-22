<div id="COURSE_LIST">
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
							<td class="course-text-course-code" data-course-id="<?php echo $course_list['id']?>"><?php echo $course_list['code']; ?></td>
							<td class="course-text-course-name"><?php echo $course_list['name']; ?></td>
							<td class="course-text-course-year-system"><?php echo $course_list['year_system']; ?></td>
							<td class="course-pull-down-college-name" data-college-id="<?php echo $course_list['college_id']; ?>"><?php echo $course_list['college_name']; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div>
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">学科追加</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form action="/admin/course/add" method="post" role="form" class="form-horizontal">
					<div class="row">
						<div class="form-group" id="form_course_add">
							<label for="name" class="col-sm-1 control-label">学科名</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="name" name="name">
							</div>
							<label for="college_id" class="col-sm-1 control-label">カレッジ</label>
							<div class="col-sm-3">
								<select id="college_id" name="college_id" class="form-control">
									<?php foreach($college_lists as $college_list): ?>
										<option value="<?php echo $college_list['id'] ?>"><?php echo $college_list['name']?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-button col-sm-4">
								<button type="submit" class="btn btn-primary">登録</button>
								<button type="reset" class="btn btn-warning">キャンセル</button>
							</div>
						</div>
					</div>
				</form>
			</div><!-- /.box-body -->
		</div>
		<div id="edit_modal_content" class="alert">
		</div>
	</section>
</div>
