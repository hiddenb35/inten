<!-- Main content -->
<section id="TEACHER_ON_CAMPUS_LIST" class="content">
	<div class="container-fluid">
		<div class="hd-btn text-right">
			<a href="/session/finished" class="btn btn-primary">締め切りログ</a>
		</div>
		<div class="box">
			<div class="box-header text-center outer-box-header clearfix">
				<a href="/session/finished" class="btn btn-danger pull-right">締め切りログ</a>
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
					<?php foreach($session_lists as $session): ?>
						<div class="col-sm-6">
							<div class="box inner-box">
								<div class="box-header inner-box-header clearfix">
									<a href="<?php echo $session['detail_link']; ?>">
										<span class="label bg-red new-label" data-date="<?php if(!is_null($session['updated_at'])){echo $session['updated_at'];} else {echo $session['created_at'];} ?>">NEW!</span>
										<?php echo $session['company_name']; ?>
									</a>
								</div>
								<div class="box-body inner-box-body clearfix">
									<table class="table table-base">
										<tr>
											<th>締め切り</th>
											<td><?php echo $session['entry_end']; ?></td>
										</tr>
										<tr>
											<th>業種</th>
											<td>
												<?php for($i = 0; $i < Config::get('show_recruitment'); $i++): ?>
													<p><?php if(isset($session['recruitment'][$i])) echo $session['recruitment'][$i]; ?>　</p>
												<?php endfor; ?>
											</td>
										</tr>
										<tr class="btn-area">
											<td colspan="2" class="text-center">
												<a href="<?php echo $session['participant_link']; ?>" class="btn btn-info">参加者</a>
												<a href="<?php echo $session['detail_link']; ?>" class="btn btn-primary">詳細</a>
												<a href="#" class="btn btn-success">編集</a>
											</td>
										</tr>
									</table>
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
