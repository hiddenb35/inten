<!-- Main content -->
<section id="TEACHER_ON_CAMPUS_LIST" class="content">
	<div class="container-fluid">
		<div class="hd-btn text-right">
			<a href="/recruit/offcampus/finished" class="btn btn-primary">締め切りログ</a>
		</div>
		<div class="box">
			<div class="box-header text-center outer-box-header clearfix">
				<a href="/recruit/offcampus/finished" class="btn btn-danger pull-right">締め切りログ</a>
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
								<div class="box-header inner-box-header clearfix">
									<span class="pull-left">
										<span class="label bg-red new-label" data-date="<?php if(!is_null($offcampus['updated_at'])){echo $offcampus['updated_at'];} else {echo $offcampus['created_at'];} ?>">NEW!</span>
										<?php echo $offcampus['company_name']; ?>
									</span>
								<span class="pull-right box-edit">
									<button type="button" class="btn btn-danger">編集</button>
								</span>
								</div>
								<div class="box-body inner-box-body clearfix">
									<div class="left-in-box pull-left left-box-color">
										<div><span class="inner-title">業種 </span>
											<?php foreach ($offcampus['recruitment'] as $recruit) echo $recruit . ' '; ?>
										</div>
										<div>
											<span class="inner-title">締め切り </span><span class="inner-content"><?php echo $offcampus['entry_end']; ?></span>
										</div>
									</div>
									<div class="right-in-box pull-right">
										<a href="<?php echo $offcampus['detail_link']; ?>" class="btn btn-danger">詳細</a>
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
