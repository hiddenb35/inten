<div id="CLASS_LIST">
	<section class="content-header">
		<h1>
			クラス一覧
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">クラス一覧</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered table-striped table-hover">
					<tbody>
						<tr>
							<th>クラス名</th>
							<th>担任名</th>
							<th>所属学科名</th>
							<th>所属カレッジ名</th>
						</tr>
						<?php foreach($class_lists as $class_list): ?>
						<tr>
							<td class="class-edit-name"><?php echo $class_list['name']; ?></td>
							<td><?php echo $class_list['teacher_name']; ?></td>
							<td class="class-edit-college"><?php echo $class_list['course_name']; ?></td>
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
				<form action="/class/add" method="post" role="form" class="form-horizontal">
					<div class="row">
						<div class="form-group" id="form_class_add">
							<label for="name" class="col-sm-1 control-label">クラス名</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="name" name="name">
							</div>
							<label for="course_id" class="col-sm-1 control-label">学科</label>
							<div class="col-sm-2">
								<select id="course_id" name="course_id" class="form-control">
									<option value="1">ITスペシャリスト科</option>
									<option value="2">情報処理科</option>
									<option value="3">パソコン・ネットワーク科</option>
									<option value="4">情報ビジネス科</option>
								</select>
							</div>
							<label for="teacher_id" class="col-sm-1 control-label">担任</label>
							<div class="col-sm-2">
								<select id="teacher_id" name="teacher_id" class="form-control">
									<option value="1">黛</option>
									<option value="2">加藤</option>
									<option value="3">成美</option>
									<option value="4">笠井</option>
									<option value="5">渡辺</option>
									<option value="6">芦沢</option>
								</select>
							</div>
							<div class="form-button col-sm-3">
								<button type="submit" class="btn btn-primary">登録</button>
								<button type="reset" class="btn btn-warning">キャンセル</button>
							</div>
						</div>
					</div>
				</form>
			</div><!-- /.box-body -->
		</div>
	</section>
</div>
