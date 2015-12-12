<div id="TEACHER_ON_CAMPUS_DEADLINE">
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
			<div class="header-title clearfix">
				<span class="inner-page-title pull-left">締め切りログ</span>
				<span class="page-count pull-right">76件中 1-5件</span>
			</div>
			<div class="outer-box-body">
				<div class="row">
					<?php foreach($offcampus_lists as $offcampus): ?>
						<div class="col-sm-6">
							<a href="#">
								<div class="box inner-box">
									<div class="box-header inner-box-header clearfix"><?php echo $offcampus['company_name']; ?></div>
									<div class="box-body inner-box-body clearfix">
										<div class="left-in-box pull-left left-box-color">
											<div>
												<span class="inner-title">業種 </span>
												<span class="inner-content"><?php foreach($offcampus['recruitment'] as $recruit) echo $recruit . ' '; ?></span>
											</div>
											<div>
												<span class="inner-title">締め切り </span>
												<span class="inner-content"><?php echo $offcampus['entry_end']; ?></span>
											</div>
										</div>
										<div class="right-in-box pull-right">
											<a href="<?php echo $offcampus['detail_link']; ?>" class="btn btn-danger">詳細</a>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<nav><?php echo Pagination::instance('pagination')->render(); ?></nav>
		</div>
	</section>
</div>