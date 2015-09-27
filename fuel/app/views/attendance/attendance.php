<section class="content-header">
	<h1>
		出席
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div id="ATTENDANCE">
		<form action="/attendance" method="post" class="container-fluid">
			<input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
			<?php foreach($student_lists as $index => $student): ?>
				<div class="form-group col-sm-4 col-md-3">
					<input type="hidden" name="attendance[<?php echo $index; ?>][student_id]" value="<?php echo $student['id']; ?>">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title"><span class="number"><?php echo $student['number']; ?></span><b><?php echo $student['full_name']; ?></b></h3>
							<div class="box-tools pull-right">
								<b class="attendance-status"></b>
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div data-toggle="buttons" class="text-center">
								<label class="btn btn-default btn-lg" data-box-class="box-success" data-attendance-class="text-success"><input type="radio" name="attendance[<?php echo $index; ?>][status]" value="1">出席</label>
								<label class="btn btn-default btn-lg" data-box-class="box-warning" data-attendance-class="text-warning"><input type="radio" name="attendance[<?php echo $index; ?>][status]" value="2">遅刻</label>
								<label class="btn btn-default btn-lg" data-box-class="box-danger" data-attendance-class="text-danger"><input type="radio" name="attendance[<?php echo $index; ?>][status]" value="3">欠席</label>
								<label class="btn btn-default btn-lg" data-box-class="box-info" data-attendance-class="text-info"><input type="radio" name="attendance[<?php echo $index; ?>][status]" value="4">公欠</label>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<div class="form-group col-xs-12 text-center">
				<button type="submit" class="btn btn-primary btn-lg">送信</button>
				<button type="reset" class="btn btn-warning btn-lg">リセット</button>
			</div>
		</form>
	</div>
</section>
<script>
	$(function(){
		$('.box-body label').click(function(){
			var status = $(this).text();
			var box_color = $(this).data('box-class');
			var attendance_color = $(this).data('attendance-class');

			$(this).parents('.box').removeClass(function(index, className) {
				return (className.match(/\bbox-\S+/g) || []).join(' ');
			});
			$(this).parents('.box').find('.attendance-status').removeClass(function(index, className) {
				return (className.match(/\btext-\S+/g) || []).join(' ');
			}).addClass(attendance_color).text(status);
			$(this).parents('.box').addClass(box_color).find('button').click();
		});

	})
</script>
<style>
	#ATTENDANCE .number { font-size: 0.8em; margin-right: 8px; }
</style>