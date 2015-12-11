<div id="OFF_CAMPUS_CONFIRM">
	<section class="content-header">
		<h1>
			学外説明会登録 確認画面
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<form action="/recruit/offcampus/register" method="post" class="form-horizontal" role="form" id="off_campus_confirm_form">
						<div class="info-box" id="off_campus_confirm_box">
							<div class="inside_box">
								<div class="form-group put-bottom-line">
									<label for="company_name" class="col-md-3 control-label">企業名</label>
									<div class="col-md-9">
										<p class="form-control-static">第一商事</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="company_code" class="col-md-3 control-label">企業コード</label>
									<div class="col-md-9">
										<p class="form-control-static">0210201</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="date_time" class="col-md-3 control-label">日時</label>
									<div class="col-md-9">
										<p class="form-control-static">2015-12-08 23:59～00:59</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="deadline" class="col-md-3 control-label">申込期限</label>
									<div class="col-md-9">
										<p class="form-control-static">2015-12-08～2015-12-15</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="" class="col-md-3 control-label">対象者</label>
									<div class="col-md-9">
										<p class="form-control-static">なるみのみ</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="place" class="col-md-3 control-label">場所</label>
									<div class="col-md-9">
										<p class="form-control-static">なるみのいえ</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="briefing_session_content" class="col-md-3 control-label">内容</label>
									<div class="col-md-9">
										<p class="form-control-static">なるみをびんた</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="explainer" class="col-md-3 control-label">説明者</label>
									<div class="col-md-9">
										<p class="form-control-static">なるみ父</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="" class="col-md-3 control-label">当日の持ち物</label>
									<div class="col-md-9">
										<p class="form-control-static">なるみのwifi</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="company_url" class="col-md-3 control-label">URL</label>
									<div class="col-md-9">
										<p class="form-control-static">narumi.com</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="entry_method" class="col-md-3 control-label">申し込み方法</label>
									<div class="col-md-9">
										<p class="form-control-static">申し込み方法？</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="email" class="col-md-3 control-label">E-mail</label>
									<div class="col-md-9">
										<p class="form-control-static">narumi@it-neec.jp</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="tel" class="col-md-3 control-label">TEL</label>
									<div class="col-md-9">
										<p class="form-control-static">1440056</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="place" class="col-md-3 control-label">募集職種</label>
									<div class="col-md-9">
										<p class="form-control-static">システムエンジニア</p>
									</div>
								</div>
								<div class="form-group put-bottom-line">
									<label for="place" class="col-md-3 control-label">添付ファイル</label>
									<div class="col-md-9">
										<p class="form-control-static">なるみ.mp4(327.0MB)(※ハードコーディングです。)</p>
									</div>
								</div>
								<div class="form-group">
									<label for="place" class="col-md-3 control-label">備考</label>
									<div class="col-md-9">
										<p class="form-control-static">備考</p>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group" id="off_campus_confirm_form_button">
							<div class="col-xs-6">
								<button type="submit" class="btn btn-primary btn-lg">送信</button>
							</div>
							<div class="col-xs-6">
								<button type="button" name="back" class="btn btn-danger btn-lg" onclick="history.back()">修正</button>
							</div>
						</div>
<!--						<input type="hidden" name="id" value="--><?php //if(isset($inputs["company_id"])) { echo $inputs["id"]; }?><!--">-->
<!--						<input type="hidden" name="company_name" value="--><?php //echo $inputs["company_name"]; ?><!--">-->
<!--						<input type="hidden" name="company_code" value="--><?php //echo $inputs["company_code"]; ?><!--">-->
<!--						<input type="hidden" name="start_date" value="--><?php //echo $inputs["start_date"]; ?><!--">-->
<!--						<input type="hidden" name="start_time" value="--><?php //echo $inputs["start_time"]; ?><!--">-->
<!--						<input type="hidden" name="end_time" value="--><?php //echo $inputs["end_time"]; ?><!--">-->
<!--						<input type="hidden" name="entry_start" value="--><?php //echo $inputs["entry_start"]; ?><!--">-->
<!--						<input type="hidden" name="entry_end" value="--><?php //echo $inputs["entry_end"]; ?><!--">-->
<!--						<input type="hidden" name="target" value="--><?php //echo $inputs["target"]; ?><!--">-->
<!--						<input type="hidden" name="location" value="--><?php //echo $inputs["location"]; ?><!--">-->
<!--						<input type="hidden" name="content" value="--><?php //echo $inputs["content"]; ?><!--">-->
<!--						<input type="hidden" name="explainer" value="--><?php //echo $inputs["explainer"]; ?><!--">-->
<!--						<input type="hidden" name="bring" value="--><?php //echo $inputs["bring"]; ?><!--">-->
<!--						<input type="hidden" name="url" value="--><?php //echo $inputs["url"]; ?><!--">-->
<!--						--><?php //foreach($inputs["recruitment"] as $recruitment) { echo "<input type=\"hidden\" name=\"recruitment[]\" value=\"" . $recruitment . "\">"; } ?>
<!--						<!--						TODO filesがかえってきてないので保留-->
<!--						<!--						--><?php ////foreach($inputs["files"] as $files) { echo "<input type=\"hidden\" name=\"files[]\" value=\"" . $files . "\">"; } ?>
<!--						<input type="hidden" name="note" value="--><?php //echo $inputs["note"]; ?><!--">-->
					</form>
				</div>
			</div>
		</div>
	</section>
</div>