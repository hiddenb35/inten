<!-- Main content -->
<section id="ATTENDANCE_INFO_LIST" class="content">
	<div class="">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="center-block student-table">
					<div class="student-table-row">
						<div class="student-table-cell"><h3>学籍番号</h3></div>
						<div class="student-table-cell"><h3>:K013C1296</h3></div>
					</div>
					<div class="student-table-row">
						<div class="student-table-cell"><h3>名前</h3></div>
						<div class="student-table-cell"><h3>:佐々木aaaaa</h3></div>
					</div>
				</div>

				<div class="text-center">
					<div class="row">
						<div class="col-xs-6">
							<select>
								<option>1学年</option>
								<option>2学年</option>
								<option>3学年</option>
								<option>4学年</option>
								<option>5学年</option>
							</select>
						</div>
						<div class="col-xs-6">
							<select>
								<option>前期</option>
								<option>後期</option>
							</select>
						</div>
					</div>
				</div>

				<div class="info-box">
					<div class="text-center">
						<h3 class=""><span class="glyphicon glyphicon-star" aria-hidden="true">全体</span></h3>
					</div>
					<div class="row all-attendance-rate">
						<div class="col-sm-6 all-attendance-rate-col">
							<table class="table">
								<tr class="bg-primary"><th>授業日数</th><th>出席数</th><th>欠席数</th></tr>
								<tr><td>150</td><td>124</td><td>26</td></tr>
							</table>
						</div>
						<div class="col-sm-6 all-attendance-rate-col">
							<table class="table">
								<tr class="bg-primary"><th>遅刻数</th><th>不足</th><th>出席率</th></tr>
								<tr><td>0</td><td>1</td><td>74.6%</td></tr>
							</table>
						</div>
					</div>
				</div>

				<div class="info-box">
					<div class="text-center">
						<h3 class="mainitem"><span class="mainitem glyphicon glyphicon-star" aria-hidden="true">講義別</span></h3>
					</div>
					<div class="visible-xs text-center">
						<select>
							<option>ビジネスマナー</option>
							<option>経営科学</option>
						</select>
					</div>
					<div class="lesson-attendance">

						<div class="">
							<div class="row">
								<div class="col-sm-6">
									<div class="col-sm-8">
										<h3><a href="#">ビジネスマナー</a></h3>
									</div>
									<div class="col-sm-4">
										<a class="btn btn-social btn-search" style="margin-top:10%;">
											<i class="fa fa-search"></i>詳細
										</a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="hidden-xs col-sm-6" id="highcharts"></div>
								<div class="col-sm-6">
									<table class="table">
										<tr class="bg-primary"><th>授業数</th><th>不足</th><th>出席率</th></tr>
										<tr><td>15</td><td>0</td><td>80.0％</td></tr>
										<tr class="bg-primary"><th>出席</th><th>欠席</th><th>遅刻</th></tr>
										<tr><td>12</td><td>3</td><td>0</td></tr>
									</table>
								</div>
							</div>
						</div>

						<div class="lesson-attendance-box">
							<div class="row">
								<div class="col-sm-6">
									<h3><a href="#">経営科学</a></h3>
								</div>
							</div>
							<div class="row">
								<div class="hidden-xs col-sm-6" id="highcharts3d"></div>
								<div class="col-sm-6">
									<a class="btn btn-social btn-search" style="margin-bottom:5%;"><i class="fa fa-search"></i>詳細</a>
									<table class="table">
										<tr class="bg-primary"><th>学籍番号</th><th>学籍番号</th><th>学籍番号</th></tr>
										<tr><td>名前</td><td>名前</td><td>名前</td></tr>
										<tr class="bg-primary"><th>学籍番号</th><th>学籍番号</th><th>学籍番号</th></tr>
										<tr><td>名前</td><td>名前</td><td>名前</td></tr>
									</table>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!------------------------------------------------------------------------------------------------>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.0/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.0/highcharts-3d.js"></script>
<script>
	/**********Highcharts.js**********/
	var h_data = [
		{name: "出席", y: 80, sliced: true, selected: true},
		{name: "遅刻", y: 9},
		{name: "欠席", y: 6},
		{name: "公欠", y: 3},
		{name: "休校", y: 2}
	];
	$('#highcharts').highcharts({
		title: {text: ''},
		colors: ['#0f0','#ff0', '#f00', '#00f', '#0ff'],
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b>:'+ this.percentage + '%';
					}
				}
			}
		},
		series: [{ type: 'pie', name: '', data: h_data}],
		tooltip: {
			formatter: function() { return this.y +'%';},
			enabled:true
		},
		chart: { backgroundColor: 'transparent', height: 300},
		credits: {enabled: false}
	});
	/************ Hifhcharts-3d.js ***********/
	$('#highcharts3d').highcharts({
		title: {text: ''},
		colors: ['#0f0','#ff0', '#f00', '#00f', '#0ff'],
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				depth: 35,
				dataLabels: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b>:'+ this.percentage + '%';
					}
				}
			}
		},
		series: [{
			type: 'pie',
			name: '',
			data: h_data
		}],
		tooltip: {
			formatter: function() {
				return this.y +'%';},
			enabled:true
		},
		chart: {
			type: 'pie',
			options3d: {
				enabled: true,
				alpha: 45,
				beta: 0
			},
			backgroundColor: 'transparent',
			height: 300
		},
		credits: {enabled: false}
	});
</script>
