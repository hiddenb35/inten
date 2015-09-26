<div id="COLLEGE_LIST">
	<section class="content-header">
		<h1>
			カレッジ一覧
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">カレッジ一覧</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered table-striped table-hover">
					<tbody>
						<tr>
							<th>#</th>
							<th>カレッジ名</th>
							<th>学科数</th>
							<th>クラス数</th>
							<th>専攻数</th>
						</tr>
						<tr>
							<td>1.</td>
							<td>ITカレッジ</td>
							<td>3</td>
							<td>10</td>
							<td>2</td>
						</tr>
						<tr>
							<td>2.</td>
							<td>クリエイターズカレッジ</td>
							<td>3</td>
							<td>10</td>
							<td>2</td>
						</tr>
						<tr>
							<td>3.</td>
							<td>ミュージックカレッジ</td>
							<td>3</td>
							<td>10</td>
							<td>2</td>
						</tr>
						<tr>
							<td>4.</td>
							<td>テクノロジーカレッジ</td>
							<td>3</td>
							<td>10</td>
							<td>2</td>
						</tr>
						<tr>
							<td>5.</td>
							<td>デザインカレッジ</td>
							<td>3</td>
							<td>10</td>
							<td>2</td>
						</tr>
						<tr>
							<td>6.</td>
							<td>医療カレッジ</td>
							<td>3</td>
							<td>10</td>
							<td>2</td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div>
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">カレッジ追加</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
                <form action="/teacher/hrteacher" method="post" role="form" class="form-horizontal">
                    <div class="row">
                        <div class="form-group" id="form_college_add">
                            <label for="name" class="col-sm-1 control-label">カレッジ名</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-button col-sm-8">
                                <button type="submit" class="btn btn-primary">登録</button>
                                <button type="reset" class="btn btn-warning">キャンセル</button>
                            </div>
                        </div>
                    </div>
                </form>
			</div><!-- /.box-body -->
		</div>
	</section>
</div>