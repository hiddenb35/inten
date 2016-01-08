<!-- Main content -->
<section id="COLLEGE_LIST" class="content">
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
						<td class="college-text-college-name" data-college-id="<?php echo $college_list['id']?>"><?php echo $college_list['name']?></td>
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
			<form action="/admin/college/add#college_form" method="post" role="form" class="form-horizontal">
					<div class="form-group college_form col-lg-7">
						<label for="name" class="control-label col-lg-3">カレッジ名</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" id="name" name="name" value="<?php if(isset($inputs)){ echo $inputs['name']; }; ?>">
							<div class="text-danger"><?php if(isset($errors)){ echo $errors['name']; }; ?></div>
						</div>
					</div>
					<div class="col-lg-1 college_form">
						<button type="submit" class="btn btn-primary">登録</button>
					</div>
			</form>
		</div><!-- /.box-body -->
	</div>
	<div id="edit_modal_content" class="alert">
	</div>
</section>