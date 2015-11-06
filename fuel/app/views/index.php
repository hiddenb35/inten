<!-- Content Header (Page header) -->
<div id="TIMETABLE_VIEW">
	<section class="content-header">
		<h1>
			時間割表示
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa ion-clock"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<?php if(empty($html)): ?>
			<h4>時間割が登録されていません</h4>
		<?php else: ?>
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $name ?></h3>
				</div>
				<div class="box-body">
					<div id="week-select" class="visible-xs row">
						<button type="button" class="btn btn-default col-xs-2 col-xs-offset-1">月</button>
						<button type="button" class="btn btn-default col-xs-2">火</button>
						<button type="button" class="btn btn-default col-xs-2">水</button>
						<button type="button" class="btn btn-default col-xs-2">木</button>
						<button type="button" class="btn btn-default col-xs-2">金</button>
					</div>
					<div class="container-fluid">
						<?php echo Timetable::generate($html); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</section>
	<div id="noteView"></div>
</div>

