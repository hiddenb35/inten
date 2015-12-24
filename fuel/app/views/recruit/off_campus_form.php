<!-- Main content -->
<section id="OFF_CAMPUS_FORM" class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form action="/recruit/offcampus/confirm" method="post" class="form-horizontal" role="form" id="off_campus_form_form" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php if(isset($inputs["company_id"])) { echo $inputs["id"]; }?>">
					<div class="info-box" id="off_campus_form_box">
						<div class="inside_box">
							<div class="form-group">
								<label for="company_name" class="col-md-2 control-label">企業名</label>
								<div class="col-md-10">
									<input type="text" id="company_name" name="company_name" class="form-control" value="<?php if(isset($inputs["company_name"])) { echo $inputs["company_name"]; }; ?>" required>
									<span class="help-block text-red"><?php if(isset($errors["company_name"])) { echo $errors["company_name"]; }; ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="company_code" class="col-md-2 control-label">企業コード</label>
								<div class="col-md-10">
									<input type="text" id="company_code" name="company_code" class="form-control" value="<?php if(isset($inputs["company_code"])) { echo $inputs["company_code"]; }; ?>" required>
									<span class="help-block text-red"><?php if(isset($errors["company_code"])) { echo $errors["company_code"]; }; ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="date_time" class="col-md-2 control-label">日時</label>
								<div class="col-md-10">
									<div class="row">
										<div class="col-md-4">
											<input type="text" name="start_date" id="start_date" class="form-control daterangepicker-date" value="<?php if(isset($inputs["start_date"])) { echo $inputs["start_date"]; }; ?>">
											<span class="help-block text-red"><?php if(isset($errors["start_date"])) { echo $errors["start_date"]; }; ?></span>
										</div>
										<div class="col-md-3 col-xs-10">
											<input type="text" name="start_time" class="form-control daterangepicker-time" value="<?php if(isset($inputs["start_time"])) { echo $inputs["start_time"]; }; ?>">
											<span class="help-block text-red"><?php if(isset($errors["start_time"])) { echo $errors["start_time"]; }; ?></span>
										</div>
										<div class="col-md-1 col-xs-1">
											<span class="help-block"><b>～</b></span>
										</div>
										<div class="col-md-3 col-xs-11 col-xs-offset-1 col-sm-offset-0">
											<input type="text" name="end_time" class="form-control daterangepicker-time" value="<?php if(isset($inputs["end_time"])) { echo $inputs["end_time"]; }; ?>">
											<span class="help-block text-red"><?php if(isset($errors["end_time"])) { echo $errors["end_time"]; }; ?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="deadline" class="col-md-2 control-label">申込期限</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="deadline" value="<?php if(isset($inputs["entry_start"]) && isset($inputs["entry_end"])) { echo $inputs["entry_start"] . " - " . $inputs["entry_end"]; }; ?>">
									<span class="help-block text-red"><?php if(isset($errors["entry_start"])) { echo $errors["entry_start"]; }; ?></span>
									<span class="help-block text-red"><?php if(isset($errors["entry_end"])) { echo $errors["entry_end"]; }; ?></span>
									<input type="hidden" id="entry_start" name="entry_start" value="<?php if(isset($inputs["entry_start"])) { echo $inputs["entry_start"]; }; ?>">
									<input type="hidden" id="entry_end" name="entry_end" value="<?php if(isset($inputs["entry_end"])) { echo $inputs["entry_end"]; }; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="target" class="col-md-2 control-label">対象者</label>
								<div class="col-md-10">
									<textarea id="target" name="target" class="form-control" rows="3"><?php if(isset($inputs["target"])) { echo $inputs["target"]; }; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="location" class="col-md-2 control-label">場所</label>
								<div class="col-md-10">
									<input type="text" id="location" name="location" class="form-control" value="<?php if(isset($inputs["company_name"])) { echo $inputs["company_name"]; }; ?>" required>
									<span class="help-block text-red"><?php if(isset($errors["location"])) { echo $errors["location"]; }; ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="content" class="col-md-2 control-label">内容</label>
								<div class="col-md-10">
									<textarea id="briefing_session_content" name="content" class="form-control" rows="3"><?php if(isset($inputs["content"])) { echo $inputs["content"]; }; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="explainer" class="col-md-2 control-label">説明者</label>
								<div class="col-md-10">
									<input type="text" id="explainer" name="explainer" class="form-control" value="<?php if(isset($inputs["explainer"])) { echo $inputs["explainer"]; }; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="bring" class="col-md-2 control-label">当日の持ち物</label>
								<div class="col-md-10">
									<textarea id="bring" name="bring" class="form-control" rows="3"><?php if(isset($inputs["bring"])) { echo $inputs["bring"]; }; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="url" class="col-md-2 control-label">URL</label>
								<div class="col-md-10">
									<input type="text" id="url" name="url" class="form-control" value="<?php if(isset($inputs["url"])) { echo $inputs["url"]; }; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="entry_method" class="col-md-2 control-label">申し込み方法</label>
								<div class="col-md-10">
									<textarea id="entry_method" name="entry_method" class="form-control" rows="3"><?php if(isset($inputs["entry_method"])) { echo $inputs["entry_method"]; }; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-md-2 control-label">E-mail</label>
								<div class="col-md-10">
									<input type="email" id="email" name="email" class="form-control" value="<?php if(isset($inputs["email"])) { echo $inputs["email"]; }; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="tel" class="col-md-2 control-label">TEL</label>
								<div class="col-md-10">
									<input type="tel" id="tel" name="tel" class="form-control" value="<?php if(isset($inputs["tel"])) { echo $inputs["tel"]; }; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="recruitment" class="col-md-2 control-label">
									募集職種
								</label>
								<div class="col-md-10 row" id="recruitment_area">
									<div class="col-xs-2 col-sm-2">
										<button type="button" class="btn btn-primary" id="work_add">追加</button>
									</div>
									<div class="col-xs-10 col-sm-10 input-group">
										<input type="text" id="recruitment" name="recruitment[]" class="form-control" value="<?php if(isset($inputs["recruitment"])) {}; ?>">
										<span class="input-group-btn">
											<button type="button" class="btn"><i class="fa fa-lg fa-close"></i></button>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="note" class="col-md-2 control-label">備考</label>
								<div class="col-md-10">
									<textarea id="note" name="note" class="form-control" rows="3"><?php if(isset($inputs["note"])) { echo $inputs["note"]; }; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="file" class="col-md-2 control-label">
									添付ファイル
								</label>
								<div class="col-md-10 row" id="file_area">
									<div class="col-xs-2 col-sm-2">
										<button type="button" class="btn btn-primary" id="file_add">添付</button>
									</div>
									<div class="col-xs-10 col-sm-10 hidden input-group">
										<input type="text" id="file" class="form-control">
										<span class="input-group-btn">
											<button type="button" class="btn"><i class="fa fa-lg fa-close"></i></button>
										</span>
									</div>
								</div>
								<div id="file_fild" class="hidden">
									<input type="file" name="file[]">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group" id="off_campus_form_form_button">
						<button type="submit" class="btn btn-danger btn-lg"><?php if(isset($oncampus_id)) { echo "変更"; } else { echo "新規登録"; } ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
