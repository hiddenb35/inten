<div id="LOGIN">
	<div id="login_body">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
					<div class="login-box">
						<div class="login-box-header text-center h1">
							<b class="hidden-xs">Student_Login</b>
							<b class="visible-xs">Login</b>
						</div>
						<div class="login-box-body">
							<form class="form-horizontal text-center" id="login_form" method="post">
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="ion-person"></i></span>
									<input type="text" name="username" class="form-control input-lg"
										   placeholder="Username">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="ion-locked"></i></span>
									<input type="password" name="password" class="form-control input-lg"
										   placeholder="Password">
								</div>
								<div class="form-group text-center">
									<button type="submit" class="btn btn-block btn-primary btn-lg login-button">
										Login
										<!-- <span class="glyphicon glyphicon-log-in"></span> -->
										<span class="ion-power"></span>
									</button>
								</div>
							</form>
						</div>
						<div class="text-right" id="change_login"><a href="/auth/tlogin">教員の方はこちら</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>