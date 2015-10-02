<div id="COLLEGE_LIST">
	<section class="content-header">
		<h1>
			カレッジ一覧
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">カレッジ一覧</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered table-striped" id="college_list_table">
					<tbody>
						<tr>
							<th>カレッジ名</th>
							<th>学科数</th>
							<th>クラス数</th>
							<th>専攻数</th>
						</tr>
						<?php foreach($college_lists as $college_list): ?>
						<tr>
							<td class="college-name"><?php echo $college_list['name']?></td>
							<td><?php echo $college_list['course_sum']; ?></td>
							<td><?php echo $college_list['class_sum']; ?></td>
							<td><?php echo $college_list['major_sum']; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div>
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">カレッジ追加</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form action="/admin/college/add" method="post" role="form" class="form-horizontal">
					<div class="row">
						<div class="form-group" id="form_college_add">
							<label for="name" class="col-sm-1 control-label">カレッジ名</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="name" name="name">
							</div>
							<div class="form-button col-sm-8">
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