<!-- Main content -->
<section id="TEACHER_ON_CAMPUS_LIST" class="content">
	<div class="container-fluid">
		<div class="hd-btn text-right">
			<a href="/recruit/oncampus/finished" class="btn btn-primary">締め切りログ</a>
		</div>
		<div class="box">
			<div class="box-header text-center outer-box-header clearfix">
				<a href="/recruit/oncampus/finished" class="btn btn-danger pull-right">締め切りログ</a>
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
					<?php foreach($oncampus_lists as $oncampus): ?>
					<div class="col-sm-6">
						<div class="box inner-box">
							<div class="box-header inner-box-header clearfix">
								<span class="pull-left">
									<span class="label bg-red new-label" data-date="<?php if(!is_null($oncampus['updated_at'])){echo $oncampus['updated_at'];} else {echo $oncampus['created_at'];} ?>">NEW!</span>
									<?php echo $oncampus['company_name']; ?>
								</span>
								<span class="pull-right box-edit">
									<button type="button" class="btn btn-danger">編集</button>
								</span>
							</div>
							<div class="box-body inner-box-body clearfix">
								<table class="table table-base">
									<tr>
										<th>締め切り</th>
										<td><?php echo $oncampus['entry_end']; ?></td>
									</tr>
									<tr>
										<th>業種</th>
										<td>
											<?php for($i = 0; $i < Config::get('show_recruitment'); $i++): ?>
												<p><?php if(isset($oncampus['recruitment'][$i])) echo $oncampus['recruitment'][$i]; ?>　</p>
											<?php endfor; ?>
										</td>
									</tr>
									<tr><td colspan="2" class="text-right"><a href="<?php echo $oncampus['detail_link']; ?>" class="btn btn-primary">詳細</a></td></tr>
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