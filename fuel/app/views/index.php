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
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $name ?></h3>
				<div id="week-select" class="visible-xs">
					<button type="button" class="btn btn-default">月</button>
					<button type="button" class="btn btn-default">火</button>
					<button type="button" class="btn btn-default">水</button>
					<button type="button" class="btn btn-default">木</button>
					<button type="button" class="btn btn-default">金</button>
				</div>
			</div>
			<div class="box-body">
				<div class="container-fluid">
					<?php echo Timetable::generate($html); ?>
				</div>
			</div>
		</div>
	</section>
</div>