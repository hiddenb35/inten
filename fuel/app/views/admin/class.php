<!-- Main content -->
<section id="CLASS_LIST" class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">クラス一覧</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered table-striped table-hover" id="class_list_table">
							<tbody>
							<tr>
								<th>クラス名</th>
								<th>担任名</th>
								<th>所属学科名</th>
								<th>所属カレッジ名</th>
							</tr>
							<?php foreach ($class_lists as $class_list): ?>
								<tr>
									<td class="class-text-class-name" data-class-id="<?php echo $class_list['id']; ?>"><?php echo $class_list['name']; ?></td>
									<td class="class-pull-down-teacher-name" data-teacher-id="<?php echo $class_list['teacher_id']; ?>"><?php echo $class_list['teacher_name']; ?></td>
									<td class="class-pull-down-course-name" data-course-id="<?php echo $class_list['course_id']; ?>"><?php echo $class_list['course_name']; ?></td>
									<td><?php echo $class_list['college_name']; ?></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div><!-- /.box-body -->
				</div>

				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">クラス追加</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<form action="/admin/class/add#class_form" method="post" role="form" class="form-horizontal" id="class_form">
							<div class="form-group col-sm-6">
								<label for="name" class="control-label col-sm-3">クラス名</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" name="name" value="<?php if (isset($inputs['name'])) { echo $inputs['name']; }; ?>">
								</div>
							</div>
							<div class="form-group col-sm-3">
								<label for="teacher_id" class="control-label col-sm-6">担任</label>
								<div class="col-sm-6">
									<select id="teacher_id" name="teacher_id" class="form-control">
										<?php foreach ($teacher_lists as $teacher_list): ?>
											<option value="<?php echo $teacher_list['id']; ?>"><?php echo $teacher_list['full_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group col-sm-6">
								<label for="course_id" class="control-label col-sm-6">学科</label>
								<div class="col-sm-6">
									<select id="course_id" name="course_id" class="form-control">
										<?php foreach ($course_lists as $course_list): ?>
											<option value="<?php echo $course_list['id'] ?>"><?php echo $course_list['name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-button col-sm-1">
								<button type="submit" class="btn btn-primary">登録</button>
							</div>
							<div class="row">
								<div class="text-danger col-sm-3 col-sm-offset-1"><?php if (isset($errors['name'])) { echo $errors['name']; }; ?></div>
								<div class="text-danger col-sm-3"><?php if (isset($errors['course_id'])) { echo $errors['course_id']; }; ?></div>
								<div class="text-danger col-sm-4"><?php if (isset($errors['teacher_id'])) { echo $errors['teacher_id']; }; ?></div>
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