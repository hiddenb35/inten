<!-- Main content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.8/excanvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.8/jquery.jqplot.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.8/plugins/jqplot.pieRenderer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.0/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.0/highcharts-3d.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.8/jquery.jqplot.min.css">
<style>
	.easy-pie {
		position: relative;
		display: inline-block;
		text-align: center;
		width: 300px
	}
	.easy-pie canvas {
		position: absolute;
		top: 0;
		left: 0;
	}
	.easy-pie-inner {
		display: inline-block;
		line-height: 300px;
		z-index: 2;
	}
	.easy-pie-inner .labeler {
		font-size: 1.6em;
		font-weight: bold;
	}
	.easy-pie-inner .percent {
		font-size: 2.5em;
		font-weight: bold;
	}
	.percent {
		color: #0f0;
	}
	.percent:after {
		content: '%';
		margin-left: 0.1em;
		font-size: 0.8em;
	}
	.title-span {
		display: inline-block;
		font-size: 3em;
		color: #f00;
	}
</style>
<section class="content">
	<div class="row">
		<div class="col-md-4"><span class="title-span">1</span><div id="morris1" style="width: 100%; height: 100%"></div></div>
		<div class="col-md-4 text-center"><span class="title-span">2</span>
			<div id="easypie1" class="easy-pie" data-percent="72">
				<div class="easy-pie-inner">
					<span class="labeler">出席率</span>
					<span class="percent">72</span>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-center"><span class="title-span">3</span><canvas id="chart1" height="300px" width="300px"></canvas></div>
	</div>
	<div class="row">
		<div class="col-md-4 text-center"><span class="title-span">4</span><canvas id="chart2" height="300px" width="300px"></canvas></div>
		<div class="col-md-4"><span class="title-span">5</span><div id="jqplot1" style="height: 400px; width: 100%;"></div></div>
		<div class="col-md-4"><span class="title-span">6</span><div id="jqplot2" style="height: 400px; width: 100%;"></div></div>
	</div>
	<div class="row">
		<div class="col-md-4"><span class="title-span">7</span><div id="jqplot3" style="height: 400px; width: 100%;"></div></div>
		<div class="col-md-4"><span class="title-span">8</span><div id="jqplot4" style="height: 400px; width: 100%;"></div></div>
		<div class="col-md-4"><span class="title-span">9</span><div id="jqplot5" style="height: 400px; width: 100%;"></div></div>
	</div>
	<div class="row">
		<div class="col-md-4"><span class="title-span">10</span><div id="jqplot6" style="height: 400px; width: 100%;"></div></div>
		<div class="col-md-4"><span class="title-span">11</span><div id="highcharts1"></div></div>
		<div class="col-md-4"><span class="title-span">12</span><div id="highcharts2"></div></div>
	</div>
	<script>
		$(function() {
			/********** Morris.js **********/
			new Morris.Donut({
				element: 'morris1',

				data: [
					{label: "出席", value: 80},
					{label: "遅刻", value: 9},
					{label: "欠席", value: 6},
					{label: "公欠", value: 3},
					{label: "休校", value: 2}
				],
				colors: [
					'#0f0','#ff0', '#f00', '#00f', '#0ff'
				],
				formatter: function(y, index) {
					return y + '%';
				},
				resize: true
			});

			/********** Chart.js **********/
			var pieData = [
				{ label: "出席", value: 80, color:"#0f0"},
				{ label: "遅刻", value : 9, color : "#ff0"},
				{ label: "欠席", value : 6, color : "#f00"},
				{ label: "公欠", value : 3,  color : "#00f"},
				{ label: "休校", value : 2,  color : "#0ff"}
			];
			var pieOptions = [
				{
					id: 'chart1',
					animation: true,
					animationSteps: 50,
					animationEasing: 'easeOutBounce',
					animateScale: false,
					onAnimationComplete: function(){this.showTooltip(this.segments, true);},
					tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>%",
				},{
					id: 'chart2',
					percentageInnerCutout: 50,
					animation: true,
					animationSteps: 50,
					scaleShowLabels: false,
					onAnimationComplete: function(){this.showTooltip(this.segments, true);},
					tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>%"
				}
			];
			for(var i = 0; i < pieOptions.length; i++) {
				new Chart($('#' + pieOptions[i].id).get(0).getContext('2d')).Pie(pieData, pieOptions[i]);
			}

			/********** Chart.js **********/
			var jq_data = [[['出席', 80], ['遅刻', 9],  ['欠席', 6], ['公欠', 3], ['休校', 2]]];
			var jq_colors = ['#0f0','#ff0', '#f00', '#00f', '#0ff'];
			var jq_options = [
				{
					id: 'jqplot1',
					seriesColors: jq_colors,
					seriesDefaults: {
						renderer: jQuery . jqplot . PieRenderer,
						rendererOptions: {
							startAngle: -90,
							showDataLabels: true,
							dataLabels: ['出席80%', '遅刻9%', '欠席6%', '公欠3%', '休校2%']
						}
					},
					legend: {
						show: true,
						location: 's',
						rendererOptions: {
							numberRows: 1
						}
					}
				},
				{
					id: 'jqplot2',
					seriesColors: jq_colors,
					seriesDefaults: {
						renderer: jQuery . jqplot . PieRenderer,
						rendererOptions: {
							startAngle: -90,
							fill: false,
							lineWidth: 2,
							showDataLabels: true,
							dataLabels: ['出席80%', '遅刻9%', '欠席6%', '公欠3%', '休校2%']
						}
					},
					legend: {
						show: true,
						location: 's',
						rendererOptions: {
							numberRows: 1
						}
					}
				},
				{
					id: 'jqplot3',
					seriesColors: jq_colors,
					seriesDefaults: {
						renderer: jQuery . jqplot . PieRenderer,
						rendererOptions: {
							startAngle: -90,
							fill: false,
							sliceMargin: 10,
							lineWidth: 1,
							showDataLabels: true,
							dataLabels: ['出席80%', '遅刻9%', '欠席6%', '公欠3%', '休校2%']
						}
					},
					legend: {
						show: true,
						location: 's',
						rendererOptions: {
							numberRows: 1
						}
					}
				},
				{
					id: 'jqplot4',
					seriesColors: jq_colors,
					seriesDefaults: {
						renderer: jQuery . jqplot . PieRenderer,
						rendererOptions: {
							startAngle: -90,
							dataLabels: ['出席80%', '遅刻9%', '欠席6%', '公欠3%', '休校2%'],
							showDataLabels: true
						}
					},
					legend: {
						show: true,
						location: 's',
						rendererOptions: {
							numberRows: 1
						}
					},
					grid: {
						borderWidth: 0,
						background: 'transparent',
						shadow: false
					}
				},
				{
					id: 'jqplot5',
					seriesColors: jq_colors,
					seriesDefaults: {
						renderer: jQuery . jqplot . PieRenderer,
						rendererOptions: {
							startAngle: -90,
							fill: false,
							sliceMargin: 10,
							lineWidth: 1,
							dataLabels: ['出席80%', '遅刻9%', '欠席6%', '公欠3%', '休校2%'],
							showDataLabels: true
						}
					},
					legend: {
						show: true,
						location: 's',
						rendererOptions: {
							numberRows: 1
						}
					},
					grid: {
						borderWidth: 0,
						background: 'transparent',
						shadow: false
					}
				},
				{
					id: 'jqplot6',
					seriesColors: jq_colors,
					seriesDefaults: {
						renderer: jQuery . jqplot . PieRenderer,
						rendererOptions: {
							startAngle: -90,
							sliceMargin: 10,
							lineWidth: 1,
							dataLabels: ['出席80%', '遅刻9%', '欠席6%', '公欠3%', '休校2%'],
							showDataLabels: true
						}
					},
					legend: {
						show: true,
						location: 's',
						rendererOptions: {
							numberRows: 1
						}
					},
					grid: {
						borderWidth: 0,
						background: 'transparent',
						shadow: false
					}
				}
			];

			var jqplots = [];
			for(var i = 0; i < jq_options.length; i++) {
				jqplots.push($.jqplot(jq_options[i].id, jq_data, jq_options[i]));
			}

			$(window).resize(function(event) {
				for(var i = 0; i < jqplots.length; i++) {
					jqplots[i].replot();
				}
			});

			/**********Highcharts.js**********/
			var highcharts_data = [
				{name: "出席", y: 80, sliced: true, selected: true},
				{name: "遅刻", y: 9},
				{name: "欠席", y: 6},
				{name: "公欠", y: 3},
				{name: "休校", y: 2}
			];
			$('#highcharts1').highcharts({
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
				series: [{
					type: 'pie',
					name: '',
					data: highcharts_data
				}],
				tooltip: {
					formatter: function() {
						return this.y +'%';},
					enabled:true
				},
				chart: {
					backgroundColor: 'transparent'
				}
			});
			$('#highcharts2').highcharts({
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
					data: highcharts_data
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
					backgroundColor: 'transparent'
				}
			});

			/**********EasyPieChart.js**********/
			$('#easypie1').easyPieChart({
				barColor: '#0f0',
				size: 300,
				lineWidth: 30,
				onStep: function(from, to, percent) {
					console.log('from: ' + from);
					console.log('to: ' + to);
					console.log('percent: ' + percent);
					$(this.el).find('.percent').text(Math.round(percent));
				}
			});
		});
	</script>
</section>