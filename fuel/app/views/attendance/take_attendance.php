<!-- Main content -->
<section id="TAKE_ATTENDANCE" class="content">
	<!-- todo 実際のエラー表示に変えること -->
	<?php if(isset($errors)): ?><pre><?php Debug::dump($errors); ?></pre><?php endif; ?>
	<?php if(isset($inputs)): ?><pre><?php Debug::dump($inputs); ?></pre><?php endif; ?>
	<form action="/attendance/add" method="post" class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-offset-2 col-md-8" data-toggle="buttons">
				<input type="text" name="date" class="form-control daterangepicker-date col-xs-12">
				<label class="btn btn-default col-xs-3"><input type="checkbox" name="time_periods[]" value="1">１限目</label>
				<label class="btn btn-default col-xs-3"><input type="checkbox" name="time_periods[]" value="2">２限目</label>
				<label class="btn btn-default col-xs-3"><input type="checkbox" name="time_periods[]" value="3">３限目</label>
				<label class="btn btn-default col-xs-3"><input type="checkbox" name="time_periods[]" value="4">４限目</label>
				<label class="btn btn-default col-xs-3"><input type="checkbox" name="time_periods[]" value="5">５限目</label>
				<label class="btn btn-default col-xs-3"><input type="checkbox" name="time_periods[]" value="6">６限目</label>
				<label class="btn btn-default col-xs-3"><input type="checkbox" name="time_periods[]" value="7">７限目</label>
				<label class="btn btn-default col-xs-3"><input type="checkbox" name="time_periods[]" value="8">８限目</label>
			</div>
		</div>
		<input type="hidden" name="lesson_id" value="<?php echo $lesson_info['id']; ?>">
		<div class="row pc-size">
			<?php foreach($student_lists as $index => $student): ?>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="box">
					<div class="box-header">
						<input type="hidden" name="attendance[<?php echo $index; ?>][student_id]" value="<?php echo $student['id']; ?>">
						<input type="hidden" class="status" name="attendance[<?php echo $index; ?>][status]">
						<h3 class="box-title"><?php echo $student['number']; ?></h3>
						<div class="kana"><?php echo $student['full_name_kana']; ?></div>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="box-content">
						<div class="h3 text-center"><?php echo $student['full_name']; ?></div>
					</div>
					<div class="box-footer text-center">
						<button type="button" class="btn btn-primary abtn" data-status-code="1">出席</button>
						<button type="button" class="btn btn-warning abtn" data-status-code="2">遅刻</button>
						<button type="button" class="btn btn-danger abtn" data-status-code="3">欠席</button>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<!------------------------スマホ・タブレットサイズ-------------------------------->
		<div class="sp-size">
			<div class="text-center mtop"><!--mtop margin-top取ってます-->
				<button type="button" class="btn take-attendance" data-toggle="modal" data-target="#myModal2" id="attendance">出席を取る</button>
			</div>
			<div class="panel-group" id="accordion">
				<?php foreach($student_lists as $index => $student): ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title h4">
							<!--------------学生の数だけstudentの数値が増加する---------------->
							<div class="text-center" data-toggle="collapse" data-parent="#accordion" href="#student<?php echo $index; ?>">
								<div class="cell create-circle"></div>
								<div class="cell student-info"><?php echo $student['number']; ?> <?php echo $student['full_name']; ?></div>
								<ul class="cell hidden-student-info">
									<li><?php echo $student['number']; ?></li>
									<li><?php echo $student['full_name']; ?></li>
								</ul>
							</div>
						</div>
					</div>
					<div id="student<?php echo $index; ?>" class="panel-collapse collapse">
						<div class="panel-body text-center">
							<button type="button" class="btn btn-primary" data-status-code="1">出席</button>
							<button type="button" class="btn btn-warning" data-status-code="2">遅刻</button>
							<button type="button" class="btn btn-danger" data-status-code="3">欠席</button>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-primary">送信</button>
			<button type="reset" class="btn btn-danger">リセット</button>
		</div>
		<!-- popup -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-inner">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">閉じる</span><span class="sr-only">Close</span></button>
							<h3 class="modal-title" id="myModalLabel"></h3>
							<h3></h3>
							<h2 class="text-center"></h2>
						</div>
						<div class="modal-body text-center">
							<input type="image" src="/assets/img/attendance.png" class="pull-left img-responsive">
							<input type="image" src="/assets/img/absence.png" class="pull-right img-responsive">
						</div>
						<div class="modal-footer">
							<div class="text-center">
								<button type="button" class="btn btn-lg text-center">戻る</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- popup end -->
	</form>
</section>
<script>
	// todo JavaScriptファイルへ移すこと
	$(function() {
		$('.box-footer button').click(function () {
			var status = $(this).data('status-code');
			$(this).closest('.box').find('input.status').val(status);
		});
	});
</script>