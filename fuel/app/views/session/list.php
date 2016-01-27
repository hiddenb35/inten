<!-- Main content -->
<section id="ON_CAMPUS_LIST" class="content">
	<div class="container-fluid">
		<div class="box">
			<div class="box-header text-right outer-box-header clearfix">
				<a href="#" class="btn btn-primary">参加済み説明会</a>
				<a href="/session/finished" class="btn btn-danger">終了済み説明会</a>
			</div>
			<div class="outer-box-body">
				<div class="row">
					<?php foreach($session_lists as $session): ?>
						<div class="col-sm-6">
							<div class="box inner-box">
								<div class="box-header inner-box-header">
									<a href="<?php echo $session['detail_link']; ?>">
										<span class="label bg-red new-label" data-date="<?php if(!is_null($session['updated_at'])){echo $session['updated_at'];} else {echo $session['created_at'];} ?>">NEW!</span>
										<?php echo $session['company_name']; ?>
									</a>
								</div>
								<div class="box-body inner-box-body clearfix">
									<table class="table table-base">
										<tr>
											<th>締め切り</th>
											<td><?php echo date('Y/m/d H:i', $session['entry_end']); ?></td>
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
												<a href="<?php echo $session['detail_link']; ?>" class="btn btn-primary">詳細</a>
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
