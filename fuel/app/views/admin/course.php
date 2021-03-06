<!-- Main content -->
<section id="COURSE_LIST" class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">学科一覧</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered table-striped table-hover" id="course_list_table">
							<tbody>
							<tr>
								<th class="col-sm-2">学科コード</th>
								<th class="col-sm-4">学科名</th>
								<th class="col-sm-2">年制</th>
								<th class="col-sm-4">所属カレッジ名</th>
							</tr>
							<?php foreach ($course_lists as $course_list): ?>
								<tr>
									<td class="course-text-course-code" data-course-id="<?php echo $course_list['id'] ?>"><?php echo $course_list['code']; ?></td>
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
						<form action="/admin/course/add#course_form" method="post" role="form" class="form-horizontal"
							  id="course_form">
							<div class="row">
								<div class="col-sm-5" id="form_course_add">
									<label for="name" class="control-label col-sm-4">学科名</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="name" name="name" value="<?php if (isset($inputs['name'])) { echo $inputs['name']; }; ?>">
									</div>
								</div>
								<div class="col-sm-5">
									<label for="college_id" class="control-label col-sm-4">カレッジ</label>
									<div class="col-sm-8">
										<select id="college_id" name="college_id" class="form-control">
											<?php foreach ($college_lists as $college_list): ?>
												<option value="<?php echo $college_list['id'] ?>"><?php echo $college_list['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="text-danger col-sm-3 col-sm-offset-1"><?php if (isset($errors['name'])) { echo $errors['name']; }; ?></div>
								<div class="text-danger col-sm-3"><?php if (isset($errors['college_id'])) { echo $errors['college_id']; }; ?></div>
							</div>
							<div class="row course-add-second">
								<div class="col-sm-5">
									<label for="code" class="control-label col-sm-4">学科コード</label>
									<div class="col-sm-3">
										<input type="text" id="code" name="code" class="form-control" value="<?php if (isset($inputs['code'])) { echo $inputs['code']; }; ?>">
									</div>
								</div>
								<div class="col-sm-5">
									<label for="year_system" class="control-label col-sm-4">年制</label>
									<div class="col-sm-4">
										<select id="year_system" name="year_system" class="form-control">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="text-danger col-sm-4"><?php if (isset($errors['code'])) { echo $errors['code']; }; ?></div>
							</div>
							<div class="row">
								<div class="form-button col-sm-1 col-sm-offset-5 col-xs-offset-4 register-button">
									<button type="submit" class="btn btn-primary">登録</button>
								</div>
							</div>
						</form>
					</div><!-- /.box-body -->
				</div>
			</div>
		</div>
	</div>
	<div id="edit_modal_content" class="alert">
	</div>
</section>
