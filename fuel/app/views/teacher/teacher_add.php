<!-- Main content -->
<section id="TEACHER_ADD" class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<form action="" method="post" class="form-horizontal" role="form" id="teacher_add_form" enctype="multipart/form-data">
					<input type="hidden" name="id" value="">
					<div class="info-box" id="teacher_add_box">
						<div class="inside_box">
							<div class="form-group">
								<label for="username" class="control-label col-sm-2">教員番号</label>
								<div class="col-sm-10">
									<div class="input-group col-sm-12">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control" id="username" name="username" placeholder="12345">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="control-label col-sm-2">パスワード</label>
								<div class="col-sm-10">
									<div class="input-group col-sm-12">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" class="form-control" id="password" name="password">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="password_confirm" class="control-label col-sm-2">パスワード(確認)</label>
								<div class="col-sm-10">
									<div class="input-group col-sm-12">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" class="form-control" id="password_confirm" name="password_confirm">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">名前</label>
								<div class="col-sm-10">
									<div class="row">
										<div class="col-sm-6">
											<div class="input-group">
												<span class="input-group-addon"><b>姓</b></span>
												<input type="text" class="form-control" id="last_name" name="last_name" placeholder="蒲田">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-group">
												<span class="input-group-addon"><b>名</b></span>
												<input type="text" class="form-control" id="first_name" name="first_name" placeholder="太郎">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">名前(フリガナ)</label>
								<div class="col-sm-10">
									<div class="row">
										<div class="col-sm-6">
											<div class="input-group">
												<span class="input-group-addon"><b>セイ</b></span>
												<input type="text" class="form-control" id="last_name_kana" name="last_name_kana" placeholder="カマタ">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-group">
												<span class="input-group-addon"><b>メイ</b></span>
												<input type="text" class="form-control" id="first_name_kana" name="first_name_kana" placeholder="タロウ">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="date_time" class="col-md-2 control-label">生年月日</label>
								<div class="col-md-10">
											<input type="text" name="start_date" id="start_date" class="form-control daterangepicker-date" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="control-label col-sm-2">メールアドレス</label>
								<div class="col-sm-10">
									<div class="input-group col-sm-12">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="text" class="form-control" id="email" name="email" placeholder="teacher@kamata.neec.jp">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="email_confirm" class="control-label col-sm-2">メールアドレス(確認)</label>
								<div class="col-sm-10">
									<div class="input-group col-sm-12">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="text" class="form-control" id="email_confirm" name="email_confirm" placeholder="teacher@kamata.neec.jp">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">性別</label>
								<div class="col-sm-10">
									<div class="row">
										<div class="col-sm-12">
											<div data-toggle="buttons">
												<label class="btn btn-default"><input type="radio" name="gender" value="1">男性</label>
												<label class="btn btn-default"><input type="radio" name="gender" value="2">女性</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group text-center" id="on_campus_confirm_form_button">
						<div class="col-xs-6">
							<button type="submit" class="btn btn-primary btn-lg">送信</button>
						</div>
						<div class="col-xs-6">
							<button type="reset" class="btn btn-warning btn-lg">キャンセル</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>