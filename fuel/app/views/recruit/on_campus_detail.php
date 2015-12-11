<div id="ON_CAMPUS_DETAIL">
	<section class="content-header">
		<h1>
			学内説明会詳細画面
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<button type="button"
						class="btn btn-primary btn-lg company-button col-xs-offset-3 col-xs-6 hidden-xs"
						disabled="disabled"><?php echo $oncampus['company_name']; ?>
				</button>
			</div>
			<div class="row">
				<div class="col-sm-7 col-md-offset-1 col-md-3 visible-xs">
					<div class="box deadline text-red">
						<div class="box-header">申込期限</div>
						<div class="box-body text-center">
							<div class="h2">2016/11/1</div>
							<div class="h2">17:00</div>
						</div>
					</div>
				</div>
				<div class="col-sm-7 col-md-offset-1 col-md-6">
					<div class="box company-information">
						<div class="box-header inner-box-header clearfix">
							<span class="pull-left h4"><strong><?php echo $oncampus['company_name']; ?></strong></span>
							<span class="pull-right box-edit">
								<!--↓JSで参加不参加を切り替えてください。-->
								<!--↓classにhiddenで消えます。visibleで表示されます。-->
								<button type="button" class="btn btn-danger button-disabled" disabled="disabled">不参加
								</button>
								<button type="button" class="btn btn-primary button-disabled hidden"
										disabled="disabled">参加
								</button>
							</span>
						</div>
						<div class="box-body">
							<div class="company-code row">
								<span class="inner-title col-xs-12 col-sm-6">企業コード</span><span
									class="col-xs-12 col-sm-6"><?php echo $oncampus['company_code']; ?></span>
							</div>
							<div class="date row">
								<div class="inner-title col-sm-6">日時</div>
								<div class="col-sm-6 row">
									<span class="col-xs-12"><?php echo $oncampus['start_date']; ?></span>
									<span class="col-xs-12"><?php echo $oncampus['start_time']; ?>～<?php echo $oncampus['end_time']; ?></span>
								</div>
							</div>
							<div class="target row">
								<span class="inner-title col-xs-12 col-sm-6">対象者</span><span class="col-xs-12 col-sm-6"><?php echo $oncampus['target']; ?></span>
							</div>
							<div class="location row">
								<span class="inner-title col-xs-12 col-sm-6">場所</span><span class="col-xs-12 col-sm-6"><?php echo $oncampus['location']; ?></span>
							</div>
							<div class="briefing-content row">
								<span class="inner-title col-xs-12 col-sm-6">内容</span><span class="col-xs-12 col-sm-6"><?php echo $oncampus['content']; ?></span>
							</div>
							<div class="explainer row">
								<span class="inner-title col-xs-12 col-sm-6">説明者</span><span class="col-xs-12 col-sm-6"><?php echo $oncampus['explainer']; ?></span>
							</div>
							<div class="belongings row">
								<span class="inner-title col-xs-12 col-sm-6">当日の持ち物</span><span
									class="col-xs-12 col-sm-6"><?php echo $oncampus['bring']; ?></span>
							</div>
							<div class="url row">
								<span class="inner-title col-xs-12 col-sm-6">URL</span><span
									class="col-xs-12 col-sm-6"><?php echo $oncampus['url']; ?></span>
							</div>
							<div class="remarks row">
								<span class="inner-title col-xs-12 col-sm-6">備考</span><span
									class="col-xs-12 col-sm-6"><?php echo $oncampus['note']; ?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5 col-md-offset-1 col-md-3">
					<div class="box deadline hidden-xs text-red">
						<div class="box-header h5"><strong>申込期限</strong></div>
						<div class="box-body text-center">
							<div class="h2"><?php echo $oncampus['entry_end']; ?></div>
							<div class="h2">17:00(ハードコード)</div>
						</div>
					</div>
					<div class="box job-category">
						<div class="box-header h5"><strong>募集職種</strong></div>
						<div class="box-body">
							<?php foreach($oncampus['recruitment'] as $recruit): ?>
								<div><?php echo $recruit; ?></div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="box attached-file">
						<div class="box-header h5"><strong>添付ファイル</strong></div>
						<div class="box-body files">
							<div><a href="#"><i class="fa fa-paperclip"></i><span>2017年_求人票.pdf(ハードコード)</span></a></div>
						</div>
					</div>

				</div>
			</div>
	</section>
</div>