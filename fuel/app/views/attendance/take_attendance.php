<div id="TAKE_ATTENDANCE">
	<section class="content-header">
		<h1>
			<?php echo $class_info['name']; ?> <?php echo $lesson_info['name'] ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<form action="/attendance/add" method="post" class="container-fluid">
			<input type="hidden" name="lesson_id" value="<?php echo $lesson_info['id']; ?>">
			<div class="row pc-size">
				<?php foreach($student_lists as $index => $student): ?>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="box">
						<div class="box-header">
							<input type="hidden" name="attendance[<?php echo $index; ?>][student_id]" value="<?php echo $student['id']; ?>">
							<h3 class="box-title"><?php echo $student['number']; ?></h3>
							<div class="kana"><?php echo $student['full_name_kana']; ?></div>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="box-content">
							<div class="h3 text-right"><?php echo $student['full_name']; ?></div>
						</div>
						<div class="box-footer text-center">
							<button type="button" class="btn btn-primary">出席</button>
							<button type="button" class="btn btn-warning">遅刻</button>
							<button type="button" class="btn btn-danger">欠席</button>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<!------------------------スマホ・タブレットサイズ-------------------------------->
			<div class="sp-size">
				<div class="text-center row">
					<button type="button" class="btn col-xs-offset-1 col-xs-10" data-toggle="modal" data-target="#myModal2" id="attendance">出席を取る</button>
				</div>
				<div class="panel-group" id="accordion">
					<?php foreach($student_lists as $index => $student): ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title h4">
								<!--------------学生の数だけstudentの数値が増加する---------------->
								<div class="text-center" data-toggle="collapse" data-parent="#accordion" href="#student<?php echo $index; ?>">
									<div class="cell create-circle"></div>
									<div class="cell"><?php echo $student['number']; ?> <?php echo $student['full_name']; ?></div>
									<ul class="cell">
										<li><?php echo $student['number']; ?></li>
										<li><?php echo $student['full_name']; ?></li>
									</ul>
								</div>
							</div>
						</div>
						<div id="student<?php echo $index; ?>" class="panel-collapse collapse">
							<div class="panel-body text-center">
								<button type="button" class="btn btn-primary">出席</button>
								<button type="button" class="btn btn-warning">遅刻</button>
								<button type="button" class="btn btn-danger">欠席</button>
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
								<input type="image" align="left" src="/assets/img/attendance.png" class="img-responsive"/>
								<input type="image" align="right" src="/assets/img/absence.png" class="img-responsive"/>
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
</div>
