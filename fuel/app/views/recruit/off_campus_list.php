<div id="ON_CAMPUS_LIST">
	<section class="content-header">
		<h1>
			学外説明会一覧画面
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="hd-btn text-right">
				<a href="/recruit/offcampus/finished" class="btn btn-primary">締め切りログ</a>
			</div>
			<div class="box">
				<div class="box-header text-center outer-box-header clearfix">
					<a href="/recruit/offcampus/finished" class="btn btn-primary pull-right">締め切りログ</a>

					<div class="row pull-left button-box">
						<a href="#" class="btn btn-default tab col-xs-6 col-sm-3">新着
							<i class="fa fa-fw fa-arrow-up"></i>
						</a>
						<a href="#" class="btn btn-default tab col-xs-6 col-sm-3">新着
							<i class="fa fa-fw fa-arrow-down"></i>
						</a>
						<a href="#" class="btn btn-default tab col-xs-6 col-sm-3">締め切り
							<i class="fa fa-fw fa-arrow-up"></i>
						</a>
						<a href="#" class="btn btn-default tab col-xs-6 col-sm-3">締め切り
							<i class="fa fa-fw fa-arrow-down"></i>
						</a>
					</div>
				</div>
				<div class="outer-box-body">
					<div class="row">
						<?php foreach($offcampus_lists as $offcampus): ?>
							<div class="col-sm-6">
								<div class="box inner-box">
									<div class="box-header inner-box-header"><?php echo $offcampus['company_name']; ?></div>
									<div class="box-body inner-box-body clearfix">
										<div class="left-in-box pull-left">
											<div>
												<span class="inner-title">業種 </span>
											<span class="inner-content">
												<?php foreach($offcampus['recruitment'] as $recruit) echo $recruit . ' '; ?>
											</span>
											</div>
											<div><span class="inner-title">締め切り </span><span class="inner-content"><?php echo $offcampus['entry_end']; ?></span>
											</div>
										</div>
										<div class="right-in-box pull-right">
											<a href="<?php echo $offcampus['detail_link']; ?>" class="btn btn-primary">詳細</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
			<nav><?php echo Pagination::instance('pagination')->render(); ?></nav>
		</div>
	</section>
</div>