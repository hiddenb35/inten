<!-- Main content -->
<section id="TIMETABLE_EDIT" class="content">
	<!-- ここにクラスID -->
	<input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
	<div class="box box-info">
		<div class="box-header with-border">
			<!-- ここにタイトルを表示 -->
			<h3 class="box-title"><?php echo $timetable['name']; ?></h3>
			<input type="text" class="form-control hidden" name="titleedit">
			<button type="button" id="selection" class="btn btn-sm btn-primary pull-right inactive">選択した項目を編集</button>
		</div>
		<div class="box-body">
			<div class="container-fluid">
				<?php echo Timetable::generate($timetable['html']); ?>
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
								<select name="subjectset" class="form-control">
									<option value="">----教科を選択してください----</option>
									<?php foreach($lesson_lists as $lesson): ?>
										<option value="<?php echo $lesson['id']; ?>" data-teacher="<?php echo $lesson['teacher_name']; ?>"><?php echo $lesson['name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="input-mail" class="col-sm-2 control-label">教員名</label>
							<div class="col-sm-10">
								<input name="teachername" type="text" class="form-control" placeholder="教員名は授業名から自動的に取得されます" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="input-mail" class="col-sm-2 control-label">教室番号</label>
							<div class="col-sm-10">
								<input name="classroom" type="text" class="form-control" placeholder="例) 30715">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">備考</label>
							<div class="col-sm-10">
								<textarea name="textarea" class="form-control" placeholder="例) PC持参" rows="3"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="reset">リセット</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="set">設定</button>
				</div>
			</div>
		</div>
	</div>
	<form action="/timetable/edit" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="hidden" name="name">
		<input type="hidden" name="json">
		<input type="hidden" name="class_id">
		<div class="form-group text-right">
			<button type="submit" class="btn btn-primary" id="transmission">作成</button>
			<button type="reset" class="btn btn-warning">キャンセル</button>
		</div>
	</form>
</section>