<div id="HRTEACHER">
    <section class="content-header">
		<h1>
			担任割り当て
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box box-warning">
			<div class="box-body">
				<form action="/teacher/hrteacher" method="post" role="form">
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="teacher_id">教員</label>
							<select id="teacher_id" name="teacher_id" class="form-control">
								<option value="1">教員太郎</option><!-- 芦沢ゾーン -->
								<option value="2">担任太郎</option><!-- 芦沢ゾーン -->
								<option value="3">AdminAdmin</option><!-- 芦沢ゾーン -->
							</select>
						</div>

						<div class="form-group col-sm-4">
							<label for="name">クラス名</label>
							<select id="name" name="name" class="form-control">
								<option value="IS05-1">IS05-1</option><!-- 芦沢ゾーン -->
								<option value="IS05-2">IS05-2</option><!-- 芦沢ゾーン -->
								<option value="IS06-1">IS06-1</option><!-- 芦沢ゾーン -->
								<option value="IS06-2">IS06-2</option><!-- 芦沢ゾーン -->
								<option value="IS07-1">IS07-1</option><!-- 芦沢ゾーン -->
								<option value="IS07-2">IS07-2</option><!-- 芦沢ゾーン -->
							</select>
						</div>

						<div class="col-sm-4 form-button">
							<button type="submit" class="btn btn-primary">登録</button>
							<button type="reset" class="btn btn-warning">キャンセル</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>