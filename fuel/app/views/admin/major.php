<!-- Main content -->
<section id="MAJOR_LIST" class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">専攻一覧</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<table class="table table-bordered table-hover">
				<tbody>
				<tr>
					<th>専攻名</th>
					<th>所属学科名</th>
					<th>所属カレッジ名</th>
				</tr>
				<?php foreach ($major_lists as $major_list): ?>
					<tr>
						<td class="major-text-major-name" data-major-id="<?php echo $major_list['id']; ?>"><?php echo $major_list['name']; ?></td>
						<td class="major-pull-down-course-name" data-course-id="<?php echo $major_list['course_id']; ?>"><?php echo $major_list['course_name']; ?></td>
						<td class=""><?php echo $major_list['college_name']; ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.box-body -->
	</div>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">専攻追加</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<form action="/admin/major/add#magor_form" method="post" role="form" class="form-horizontal" id="magor_form">
				<div class="form-group row" id="form_major_add">
					<label for="name" class="col-sm-1 control-label">専攻名</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="name" name="name" value="<?php if (isset($inputs['name'])) { echo $inputs['name']; }; ?>">
					</div>
					<label for="course_id" class="col-sm-1 control-label">学科</label>
					<div class="col-sm-3">
						<select id="course_id" name="course_id" class="form-control">
							<?php foreach ($course_lists as $course_list): ?>
								<option value="<?php echo $course_list['id']; ?>"><?php echo $course_list['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-button col-sm-4">
						<button type="submit" class="btn btn-primary">登録</button>
						<button type="reset" class="btn btn-warning">キャンセル</button>
					</div>
				</div>
				<div class="row">
					<div class="text-danger col-sm-4 col-sm-offset-1"><?php if (isset($errors['name'])) { echo $errors['name']; }; ?></div>
					<div class="text-danger col-sm-5"><?php if (isset($errors['course_id'])) { echo $errors['course_id']; }; ?></div>
				</div>
			</form>
		</div><!-- /.box-body -->
	</div>
	<div id="edit_modal_content" class="alert">
	</div>
</section>
