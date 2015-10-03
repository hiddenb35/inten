<div id="MAJOR_LIST">
	<section class="content-header">
		<h1>
			専攻一覧
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
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
						<?php foreach($major_lists as $major_list): ?>
						<tr>
							<td class="major-edit"><?php echo $major_list['name']; ?></td>
							<td class="major-edit-course"><?php echo $major_list['course_name']; ?></td>
							<td class="major-edit-college"><?php echo $major_list['college_name']; ?></td>
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
				<form action="/admin/major/add" method="post" role="form" class="form-horizontal">
					<div class="row">
						<div class="form-group" id="form_major_add">
							<label for="name" class="col-sm-1 control-label">専攻名</label>
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
							<label for="college_id" class="col-sm-1 control-label">カレッジ</label>
							<div class="col-sm-2">
								<select id="college_id" name="college_id" class="form-control">
									<option value="1">ITカレッジ</option>
									<option value="2">クリエーターズカレッジ</option>
									<option value="3">ミュージックカレッジ</option>
									<option value="4">テクノロジーカレッジ</option>
									<option value="5">デザインカレッジ</option>
									<option value="6">医療カレッジ</option>
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
