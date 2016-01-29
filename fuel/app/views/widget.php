<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.min.css" />
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
<script>
	$(function(){
		//todo mouseイベントを用途別に変える




		// １lineの大きさ
		var lineWidth = Math.floor($("#area").width() / 2);
		var lineHeight = Math.floor($("#area").height() / 2);

		var thising;

		//var thisStorage;

		// mousedown時、動かしている要素の元の座標
		var oldPositionX;
		var oldPositionY;

		//要素が何列目、何行目、及び何行使っているか？
		var widgetObj = [
			{
				"xLine":0,
				"yLine":0,
				"lineNum":1
			},
			{
				"xLine":1,
				"yLine":0,
				"lineNum":1
			}
		];
		for(var i = 0; i < widgetObj.length; i++){
			$(".box").eq(i).css("left", $("#area").offset().left +(lineWidth * widgetObj[i].xLine) + "px");
			$(".box").eq(i).css("top", $("#area").offset().top + (lineHeight * widgetObj[i].yLine) + "px");
		}
		//boxの横幅指定
		$(".box").css("width", lineWidth - 30 + "px");

		//ドラッグできるように
		$(".box").draggable({
			//マスづつ移動
			grid: [lineWidth, lineHeight],
			containment: '#area'
		});
		//ドラッグ開始時に前に持ってくる
		$("#area").on('mousedown', '.box', function(event) {
			$(this).css("z-index","1100");
			var oldX = $(this).offset().left - $("#area").offset().left;
			var oldY = $(this).offset().top - $("#area").offset().top;
			oldPositionX = lineWidth * Math.floor(oldX / lineWidth);
			oldPositionY = lineHeight * Math.floor(oldY / lineHeight);
			thising = $(this);
			$(document).mousemove(function(event) {
				console.log(event.pageX + ":" + event.pageY);
				if($("#area").offset().left + 30 > event.pageX || $("#area").offset().top + 30 > event.pageY || $("#area").offset().left + Math.floor($("#area").width()) - 30 < event.pageX || $("#area").offset().top + Math.floor($("#area").height()) - 30 < event.pageY){
					setPosition(thising);
				}
			});
		});

		$("#area").on('mouseup', '.box', function(event) {
			setPosition($(this));
		});

		// $("html").mousemove(function(event) {
		// 	console.log(event.pageX + ":" + event.pageY);
		// 	if($("#area").offset().left + 30 > event.pageX || $("#area").offset().top + 30 > event.pageY){
		// 		setPosition($(this));
		// 	}
		// });

		function setPosition(thisStorage){
			thisStorage.css("z-index","1050");
			//areaからのｐｘ数
			var x = thisStorage.offset().left - $("#area").offset().left;
			var y = thisStorage.offset().top - $("#area").offset().top;
			//何列・行目にドラッグしたか
			var xline = Math.floor(x / lineWidth);
			var yline = Math.floor(y / lineHeight);

			//セットするareaからのｐｘ数
			var setX = lineWidth * xline;
			var setY = lineHeight * yline;

			var type = parseInt(thisStorage.data('type'));

			var frg = 0;
			for(var i = 0; i < widgetObj.length; i++){
				if(i !== type && widgetObj[i].xLine === xline && widgetObj[i].yLine === yline){
					thisStorage.css("left",oldPositionX + $("#area").offset().left + "px");
					thisStorage.css("top", oldPositionY + $("#area").offset().top + "px");
					frg = 1;
				}
			}
			if(frg === 0){
				thisStorage.css("left", setX + $("#area").offset().left + "px");
				thisStorage.css("top", setY + $("#area").offset().top + "px");
				widgetObj[type].xLine = xline;
				widgetObj[type].yLine = yline;
			}

			// if(x >= 0){
			// 	$(this).css("left", setX + $("#area").position().left + "px");
			// }else{
			// 	$(this).css("left", $("#area").position().left + "px");
			// }

			// if(y >= 0){
			// 	$(this).css("top", setY + $("#area").position().top + "px");
			// }else{
			// 	$(this).css("top", $("#area").position().top + "px");
			// }

			// var setedX = Math.floor(x / lineWidth);
			// var setedY = Math.floor(y / lineHeight);
			// var type = $(this).data('type');
			// console.log(setedX + ":" + setedY + ":" + type);
			// reSetPosition(setedX,setedY, type);
		}

		// function reSetPosition(setedX, setedY, type){
		// 	for(var i = 0; i < widgetObj.length; i++){
		// 		if(i !== type && widgetObj[i].xLine === setedX && widgetObj[i].yLine === setedY){
		// 			thisStorage.css("left",oldPositionX + "px");

		// 		}
		// 	}
		// }

		$(".close").click(function(){
			$(this).closest('.box').remove();
		});

		var widgetHtml = {
			html:[
				'<div class="box"><div class="box-header with-border"><h3 class="box-title">aaa</h3><button type="button" class="close"><strong>×</strong></button></div><div class="box-body"><div>s;ruhbgoia;rw</div></div></div>','aaaa'
			]
		};

		$("#editWidget").click(function(event) {
			var widgetNum = parseInt($("select[name='widget'] option:selected").val(),10);

			$("#area").append(widgetHtml.html[widgetNum]);
			$(".box").draggable({
				grid: [lineWidth, lineHeight],
				containment: '#area'
			});
			$("#area").on('mousedown', '.box', function(event) {
				$(this).css("z-index","1100");
			});
			$("#area").on('mouseup', '.box', function(event) {
				setPosition();
			});
		});
	});
</script>
<style>
	.box{
		height: 440px;
		z-index: 1050;
		position: absolute;
		margin: 10px;
	}
	#area{
		/*border: solid #999;*/
		height: 900px;
	}
	.cloce{
	}
</style>
<section id="TEST" class="content">

	<select name="widget">
		<option value="0">出席率</option>
		<option value="1">時間割</option>
		<option value="2">就活情報</option>
	</select>
	<button type="button" class="btn" id="editWidget">追加</button>

	<div calss="container" id="area">

		<div class="box" data-type="0">
			<div class="box-header with-border">
				<h3 class="box-title">出席率</h3>
				<button type="button" class="close"><strong>×</strong></button>
			</div>
			<div class="box-body">
				<div id="morris1"></div>
			</div>
		</div>

		<div class="box" data-type="1">
			<div class="box-header with-border">
				<h3 class="box-title">出席率</h3>
				<button type="button" class="close"><strong>×</strong></button>
			</div>
			<div class="box-body">
				<div>s;ruhbgoia;rw</div>
			</div>
		</div>

	</div>
</section>
