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
				<input type="text" class="form-control" id="titleEdit" name="name" style="display:none;">
				<button type="button" id="selection" class="btn btn-sm btn-primary pull-right">選択した項目を編集</button>
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
								<td class="text-center" data-lesson-id="1"><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>2時限目</span><br>10:00-10:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>3時限目</span><br>11:00-11:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>4時限目</span><br>12:00-12:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>5時限目</span><br>13:00-13:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>6時限目</span><br>14:00-14:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>7時限目</span><br>15:00-15:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
							</tr>
							<tr>
								<th class="text-center bg-info"><span>8時限目</span><br>16:00-16:50</th>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
								<td class="text-center" data-lesson-id=""><p class="subject"></p><p class="teacher"></p><p class="classroom"></p><p class="note"></p></td>
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
						<!-- <h3 class="modal-title" id="myModalLabel">月曜日 9:00-10:00</h3> -->
					</div>
					<div class="modal-body">
						<form class="form col-md-12 center-block">
							<div class="controls form-group">
								<label for="class_id">教科名：</label>
								<select class="form-control " name="class_id" size="1" id="subject">
									<option value="0">----教科を選択してください----</option><!-- 芦沢ゾーン -->
									<?php foreach($lesson_lists as $lesson): ?>
										<option value="<?php echo $lesson['id']; ?>" data-teacher="<?php echo $lesson['teacher_name']; ?>"><?php echo $lesson['name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div id="test">
								<label for="teachername">教員名：</label>
								<input type="text" name="teachername" class="form-control input-lg" readonly placeholder="教員名" id="teacher">
							</div>

							<div class="form-group">
								<label for="classroom">教室番号：</label>
								<input type="text" name="classroom" class="form-control input-lg" placeholder="教室番号" id="classroom">
							</div>

							<div class="form-group">
								<textarea id="note" name="テキストエリア" rows="3" cols="50" wrap="hard" class="form-control input-lg" placeholder="備考" style="width:100%; height:200px;"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" id="set">Set</button>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group text-right">
			<button type="submit" class="btn btn-primary">作成</button>
			<button type="reset" class="btn btn-warning" id="transmission">キャンセル</button>
		</div>
	</section>
</div>
