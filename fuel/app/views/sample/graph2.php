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
	.title-span {
		display: inline-block;
		font-size: 3em;
		color: #f00;
	}
	#jqplot2 .jqplot-data-label {
		color: #000;
		font-size: 130%;
		font-weight: bold;
	}
	#jqplot3 .jqplot-data-label {
		font-size: 120%;
	}
</style>
<section class="content">
	<div class="row">
		<div class="col-md-4"><span class="title-span">1-1</span><div id="morris1" style="width: 100%; height: 100%"></div></div>
		<div class="col-md-4"><span class="title-span">1-2</span><div id="morris2" style="width: 100%; height: 100%"></div></div>
		<div class="col-md-4"><span class="title-span">1-3</span><div id="morris3" style="width: 100%; height: 100%"></div></div>
	</div>
	<div class="row">
		<div class="col-md-4"><span class="title-span">10-1</span><div id="jqplot1" style="height: 400px; width: 100%;"></div></div>
		<div class="col-md-4"><span class="title-span">10-2</span><div id="jqplot2" style="height: 400px; width: 100%;"></div></div>
		<div class="col-md-4"><span class="title-span">10-3</span><div id="jqplot3" style="height: 400px; width: 100%;"></div></div>
	</div>
	<div class="row">
		<div class="col-md-4"><span class="title-span">11-1</span><div id="highcharts1"></div></div>
		<div class="col-md-4"><span class="title-span">11-2</span><div id="highcharts2"></div></div>
		<div class="col-md-4"><span class="title-span">11-3</span><div id="highcharts3"></div></div>
	</div>
	<div class="row">
		<div class="col-md-4"><span class="title-span">12-1</span><div id="highcharts4"></div></div>
		<div class="col-md-4"><span class="title-span">12-2</span><div id="highcharts5"></div></div>
		<div class="col-md-4"><span class="title-span">12-3</span><div id="highcharts6"></div></div>
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
			new Morris.Donut({
				element: 'morris2',

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
					/*** 以下自前実装(ドキュメントにはない) ***/
					for(var i = 0; i < this.data.length; i++) {
						if(this.data[i] === index) {
							$('#' + this.element).find('text').attr('fill', this.colors[i]);
						}
					}
					/****************** **********************/

					return y + '%';
				},
				resize: true,
				labelColor: '#0f0'
			});
			new Morris.Donut({
				element: 'morris3',

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
					/*** 以下自前実装(ドキュメントにはない) ***/
					for(var i = 0; i < this.data.length; i++) {
						if(this.data[i] === index) {
							$('#' + this.element).find('text').attr('fill', this.colors[i]);
							$('#' + this.element).find('path').attr('stroke', this.colors[i]);
						}
					}
					/****************** **********************/

					return y + '%';
				},
				resize: true,
				labelColor: '#0f0'
			});

			/********** jqplot.js **********/
			$.jqplot('jqplot1', [[['出席', 80], ['遅刻', 9],  ['欠席', 6], ['公欠', 3], ['休校', 2]]], {
					seriesColors: ['#0f0','#ff0', '#f00', '#00f', '#0ff'],
					seriesDefaults: {
						renderer: jQuery . jqplot . PieRenderer,
						rendererOptions: {
							startAngle: -90,
							sliceMargin: 10,
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
				});
			$.jqplot('jqplot2', [[['出席', 80], ['遅刻', 9],  ['欠席', 6], ['公欠', 3], ['休校', 2]]], {
					seriesColors: ['#0f0','#ff0', '#f00', '#00f', '#0ff'],
					seriesDefaults: {
						renderer: jQuery . jqplot . PieRenderer,
						rendererOptions: {
							startAngle: -90,
							sliceMargin: 10,
							dataLabels: ['80%', '9%', '6%', '3%', '2%'],
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
				});
			$.jqplot('jqplot3', [[['出席', 80], ['遅刻', 9],  ['欠席', 6], ['公欠', 3], ['休校', 2]]], {
					seriesColors: ['#0f0','#ff0', '#f00', '#00f', '#0ff'],
					seriesDefaults: {
						renderer: jQuery . jqplot . PieRenderer,
						rendererOptions: {
							startAngle: -90,
							sliceMargin: 10,
							dataLabels: ['出席: 80', '遅刻: 9', '欠席: 6', '公欠: 3', '休校: 2'],
							showDataLabels: true
						}
					},
					legend: {
						show: true,
						location: 'n',
						rendererOptions: {
							numberRows: 1
						}
					},
					grid: {
						borderWidth: 0
					}
				});


			$(window).resize(function(event) {
//				for(var i = 0; i < jqplots.length; i++) {
//					jqplots[i].replot();
//				}
			});

			/**********Highcharts.js**********/
			var h_data = [
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
				series: [{ type: 'pie', name: '', data: h_data}],
				tooltip: {
					formatter: function() { return this.y +'%';},
					enabled:true
				},
				chart: { backgroundColor: 'transparent'},
				credits: {enabled: false}
			});

			$('#highcharts2').highcharts({
				title: {text: ''},
				colors: ['#0f0','#ff0', '#f00', '#00f', '#0ff'],
				plotOptions: {
				pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						showInLegend: true,
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
				chart: { backgroundColor: 'transparent'},
				credits: {enabled: false}
			});
			Highcharts.getOptions().colors = ['#00ff00','#ffff00', '#ff0000', '#0000ff', '#00ffff'];
			Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
				return {
					radialGradient: {
						cx: 0.5,
						cy: 0.3,
						r: 0.7,
						g: 0.7,
						b: 0.7
					},
					stops: [
						[0, color],
						[1, Highcharts.Color(color).brighten(-0.4).get('rgb')] // darken
					]
				};
			});
			$('#highcharts3').highcharts({
				title: {text: ''},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						showInLegend: true,
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
				chart: { backgroundColor: 'transparent'},
				credits: {enabled: false}
			});



			$('#highcharts4').highcharts({
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
					backgroundColor: 'transparent'
				},
				credits: {enabled: false}
			});
			$('#highcharts5').highcharts({
				title: {text: ''},
				colors: ['#0f0','#ff0', '#f00', '#00f', '#0ff'],
				plotOptions: {
					pie: {
						innerSize: 200,
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 45,
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
					backgroundColor: 'transparent'
				},
				credits: {enabled: false}
			});
			$('#highcharts6').highcharts({
				title: {text: ''},
//				colors: ['#0f0','#ff0', '#f00', '#00f', '#0ff'],
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
					backgroundColor: 'transparent'
				},
				credits: {enabled: false}

			});
		});
	</script>
</section>