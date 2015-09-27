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
			<div class="form-group col-sm-4 col-md-3">
				<input type="hidden" name="attendance[0][student_id]" value="1">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">k013c1129 渡辺優樹</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div data-toggle="buttons" class="text-center">
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[0][status]" value="1">出席</label>
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[0][status]" value="2">遅刻</label>
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[0][status]" value="3">欠席</label>
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[0][status]" value="4">公欠</label>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group col-sm-4 col-md-3">
				<input type="hidden" name="attendance[1][student_id]" value="2">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">k013c1130 渡辺優樹</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div data-toggle="buttons" class="text-center">
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[1][status]" value="1">出席</label>
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[1][status]" value="2">遅刻</label>
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[1][status]" value="3">欠席</label>
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[1][status]" value="4">公欠</label>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group col-sm-4 col-md-3">
				<input type="hidden" name="attendance[2][student_id]" value="3">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">k013c1131 渡辺優樹</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div data-toggle="buttons" class="text-center">
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[2][status]" value="1">出席</label>
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[2][status]" value="2">遅刻</label>
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[2][status]" value="3">欠席</label>
							<label class="btn btn-default btn-lg"><input type="radio" name="attendance[2][status]" value="4">公欠</label>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group col-xs-12 text-center">
				<button type="submit" class="btn btn-primary">送信</button>
				<button type="reset" class="btn btn-warning">リセット</button>
			</div>
		</form>
	</div>
</section>
<script>
	$(function(){
		$('.box-body label').click(function(){
			$(this).parents('.box').find('button').click();
		});
	})
</script>