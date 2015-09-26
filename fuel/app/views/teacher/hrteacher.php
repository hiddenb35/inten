<div id="HRTEACHER">
    <section class="content-header">
		<h1>
			担任割り当て
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box box-warning">
			<div class="box-body">
				<form action="/teacher/hrteacher" method="post" role="form">
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="teacher_id">教員</label>
							<select id="teacher_id" name="teacher_id" class="form-control">
								<?php foreach ($teacher_lists as $teacher_list): ?>
									<option value="<?php echo $teacher_list['id']?>"><?php echo $teacher_list['full_name']?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group col-sm-4">
							<label for="class_id">クラス名</label>
							<select id="class_id" name="class_id" class="form-control">
								<?php foreach ($class_lists as $class_list): ?>
									<option value="<?php echo $class_list['id']?>"><?php echo $class_list['name']?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="col-sm-4 form-button">
							<button type="submit" class="btn btn-primary">登録</button>
							<button type="reset" class="btn btn-warning">キャンセル</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>