<div id="TIMETABLE_ADD">
	<section class="content-header">
		<h1>
			時間割作成
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title" id="title">時間割のタイトルを入力してください。</h3>
				<input type="text" class="form-control" id="titleEdit" name="name">
				<button type="button" id="selection" class="btn btn-sm btn-primary pull-right inactive">選択した項目を編集</button>
			</div>
			<div class="box-body">
				<div class="container-fluid">
					<table class="table table-bordered table-responsive table-striped">
						<thead>
							<tr class="bg-primary">
								<th class="text-center">#</th>
								<th class="text-center">月曜日</th>
								<th class="text-center">火曜日</th>
								<th class="text-center">水曜日</th>
								<th class="text-center">木曜日</th>
								<th class="text-center">金曜日</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th class="text-center bg-info"><span>1時限目</span><br>9:00-9:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>2時限目</span><br>10:00-10:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>3時限目</span><br>11:00-11:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>4時限目</span><br>12:00-12:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>5時限目</span><br>13:00-13:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>6時限目</span><br>14:00-14:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>7時限目</span><br>15:00-15:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>8時限目</span><br>16:00-16:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p><span class="badge bg-green">備考あり</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- popup -->
		<button type="button" class="btn btn-primary hidden" data-toggle="modal" data-target="#myModal" id="timeadd"></button>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						 <h3 class="modal-title" id="myModalLabel">時間割入力</h3>
					</div>
					<div class="modal-body">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-2 control-label">授業名</label>
								<div class="col-sm-10">
									<select name="subjectset" class="form-control" id="subject">
										<option value="0">----教科を選択してください----</option>
										<?php foreach($lesson_lists as $lesson): ?>
											<option value="<?php echo $lesson['id']; ?>" data-teacher="<?php echo $lesson['teacher_name']; ?>"><?php echo $lesson['name']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="input-mail" class="col-sm-2 control-label">教員名</label>
								<div class="col-sm-10">
									<input name="teachername" type="text" class="form-control" id="teacher" placeholder="教員名は授業名から自動的に取得されます" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="input-mail" class="col-sm-2 control-label">教室番号</label>
								<div class="col-sm-10">
									<input name="classroom" type="text" class="form-control" id="classroom" placeholder="例) 30715">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">備考</label>
								<div class="col-sm-10">
									<textarea id="note" name="textarea" class="form-control" placeholder="例) PC持参" rows="3"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" id="set">設定</button>
					</div>
				</div>
			</div>
		</div>
		<form>
		<div class="form-group text-right">
			<button type="submit" class="btn btn-primary" id="transmission">作成</button>
			<button type="reset" class="btn btn-warning">キャンセル</button>
		</div>
		</form>
	</section>
</div>
