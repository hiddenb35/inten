<!-- Main content -->
<section id="ON_CAMPUS_FORM" class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form action="/recruit/oncampus/confirm" method="post" class="form-horizontal" role="form" id="on_campus_form_form" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php if(isset($inputs["company_id"])) { echo $inputs["id"]; }?>">
					<div class="info-box" id="on_campus_form_box">
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
									<input type="text" id="start_date_time" class="form-control" value="<?php if(isset($inputs["start_date"]) && isset($inputs["start_time"]) &&isset($inputs["end_time"])) { echo $inputs["start_date"] . " " . $inputs["start_time"] . " - " . $inputs["start_date"] . " " . $inputs["end_time"]; }; ?>">
									<span class="help-block text-red"><?php if(isset($errors["start_date"])) { echo $errors["start_date"]; }; ?></span>
									<span class="help-block text-red"><?php if(isset($errors["start_time"])) { echo $errors["start_time"]; }; ?></span>
									<span class="help-block text-red"><?php if(isset($errors["end_time"])) { echo $errors["end_time"]; }; ?></span>
									<input type="hidden" name="start_date" id="start_date" class="form-control" value="<?php if(isset($inputs["start_date"])) { echo $inputs["start_date"]; }; ?>">
									<input type="hidden" name="start_time" id="start_time" class="form-control" value="<?php if(isset($inputs["start_time"])) { echo $inputs["start_time"]; }; ?>">
									<input type="hidden" name="end_time" id="end_time" class="form-control" value="<?php if(isset($inputs["end_time"])) { echo $inputs["end_time"]; }; ?>">
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
								<label for="recruitment" class="col-md-2 control-label">
									募集職種
								</label>
								<div class="col-md-10 row">
									<div class="col-md-11">
										<input type="text" id="recruitment" name="recruitment[]" class="form-control" value="<?php if(isset($inputs["recruitment"])) {}; ?>">
									</div>
									<div class="col-md-1">
										<button type="button" class="btn btn-primary" id="wook_add">追加</button>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="file" class="col-md-2 control-label">
									添付ファイル
									<button class="btn btn-primary">追加</button>
								</label>
								<div class="col-md-10">
									<input type="file" id="file" name="files[]">
								</div>
							</div>
							<div class="form-group">
								<label for="note" class="col-md-2 control-label">備考</label>
								<div class="col-md-10">
									<textarea id="note" name="note" class="form-control" rows="3"><?php if(isset($inputs["note"])) { echo $inputs["note"]; }; ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group" id="on_campus_form_form_button">
						<button type="submit" class="btn btn-danger btn-lg"><?php if(isset($oncampus_id)) { echo "変更"; } else { echo "新規登録"; } ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
