$(function(){
	//ここからtimetable_add
	//読み込み時に備考ラベルを隠す処理
	var tdlg = $("#TIMETABLE_VIEW table td,#TIMETABLE_ADD table td,#TIMETABLE_EDIT table td").length;
	for(i = 0; i < tdlg; i++){
		if($("#TIMETABLE_VIEW table td,#TIMETABLE_ADD table td, #TIMETABLE_EDIT table td").eq(i).children('.note').text() !== ""){
			$("#TIMETABLE_VIEW table td,#TIMETABLE_ADD table td, #TIMETABLE_EDIT table td").eq(i).children('span').show();
		}
	}
	//タイトル編集
	$('#title').click(function() {
		$('#title').hide();
		$('#titleEdit').val($('#title').text()).show().focus().select();
	});
	$('#titleEdit').blur(function () {
		$('#titleEdit').hide();
		if ($('#titleEdit').val() !== "")
			$('#title').text($('#titleEdit').val());
		$('#title').show();
	});
	$('#titleEdit').keypress(function (e) {
		if (e.which == 13) {
			$('#titleEdit').hide();
			if ($('#titleEdit').val() !== "")
				$('#title').text($('#titleEdit').val());
			$('#title').show();
			return false;
		}
	});
	//項目を押したときの処理（ｔｄ）
	var thisStorage ;
	$("#TIMETABLE_ADD table td, #TIMETABLE_EDIT table td").click(function() {
		$(this).toggleClass("active");
		if($(".active").length == 1){
			thisStorage = $(this);
		}
		if($("#TIMETABLE_ADD table td, #TIMETABLE_EDIT table td").hasClass("active") === false){
			$("#selection").addClass('inactive');
		}else{
			$("#selection").removeClass('inactive');
		}
	});
	$("#TIMETABLE_ADD #subject, #TIMETABLE_EDIT #subject").change(function () {
		$("#teacher").val($('#subject option:selected').data('teacher'));
	});
	//編集処理
	$("#TIMETABLE_ADD #selection,#TIMETABLE_EDIT #selection").click(function() {
		if($('#TIMETABLE_ADD td, #TIMETABLE_EDIT td').hasClass('active') === false){
			alert("項目が選択されていません");
			return false;
		}
		$("#selection").addClass('inactive');

		$(".setElement").removeClass('setElement');
		$(".active").addClass("setElement");
		$(".active").removeClass("active");

		$("#TIMETABLE_ADD #timeadd, #TIMETABLE_EDIT #timeadd").click();
		$('#subject').val($(thisStorage).data('lesson-id'));
		$("#teacher").val($('#subject option:selected').data('teacher'));
		$('#classroom').val($(thisStorage).children('.classroom').text());
		$("#note").val($(thisStorage).children('.note').text());

		$("#set").click(function () {
			$(".setElement").data('lesson-id', $('#subject option:selected').val());
			$(".setElement").children('.subject').text($('#subject option:selected').text());
			$(".setElement").children('.teacher').text($('#subject option:selected').data('teacher'));
			$(".setElement").children('.classroom').text($('#classroom').val());
			$(".setElement").children('.note').text($('#note').val());
			if($(".setElement .note").text() !== ""){
				$(".setElement span").show();
			}else{
				$(".setElement span").hide();
			}
			$(".setElement").removeClass("setElement");
		});
	});
	//送るデータ
	var data = [];
	var tr = $("table tr");
	$("#TIMETABLE_ADD #transmission, #TIMETABLE_EDIT #transmission").click(function () {
		for (var i = 1; i < 9; i++) {
			var cells = tr.eq(i).children();
			data[i - 1] = [];
			for (var j = 1; j < 6; j++) {
				if (cells.eq(j).data('lesson-id') == 0) {
					data[i - 1][j - 1] = {};
				} else {
					data[i - 1][j - 1] = {
						"lesson_id": cells.eq(j).data('lesson-id'),
						"room_number": cells.eq(j).children('.classroom').text(),
						"notes": cells.eq(j).children('.note').text()
					};
				}
			}
		}
		data = JSON.stringify(data);

		$("#finalname").val($("#title").text());
		$("#finaljson").val(data);
		$("#finalid").val($('input[name="class_id"]').val());

		// ここに送るデータの処理

		// $.ajax({
		// 	url: '/timetable/add',
		// 	type: 'POST',
		// 	dataType: 'json',
		// 	data: {name: $('#title').text(), json: data, class_id: $('input[name="class_id"]').val()}
		// }).done(function () {
		// 	console.log("success");
		// })
		// .fail(function () {
		// 	console.log("error");
		// });
	});
	//ここから時間割表示画面のレスポンシブ処理
	var todayWeek = new Date().getDay();
	$("#TIMETABLE_VIEW table tr td,#TIMETABLE_VIEW table tr th").addClass('hidden-xs');
	if(todayWeek===0||todayWeek===6){todayWeek=1;}
	for(i=0; i<$("#TIMETABLE_VIEW table tr th").length; i++){
		if(i===0||i===todayWeek||i>=6){
			$("#TIMETABLE_VIEW table tr th").eq(i).removeClass('hidden-xs');
		}
	}
	for(i=todayWeek; i <= $("#TIMETABLE_VIEW table tr td").length; i+=5){
		$("#TIMETABLE_VIEW table tr td").eq(i-1).removeClass('hidden-xs');
	}

	$("#week-select button").click(function(event) {
		var weekSelect = $("#week-select button").index(this);
		$("#TIMETABLE_VIEW table tr td,#TIMETABLE_VIEW table tr th").addClass('hidden-xs');
		for(i=0; i<$("#TIMETABLE_VIEW table tr th").length; i++){
			if(i===0||i===weekSelect+1||i>=6){
				$("#TIMETABLE_VIEW table tr th").eq(i).removeClass('hidden-xs');
			}
		}
		for(i=weekSelect+1; i <= $("#TIMETABLE_VIEW table tr td").length; i+=5){
			$("#TIMETABLE_VIEW table tr td").eq(i-1).removeClass('hidden-xs');
		}
	});

	//備考ラベルhover時の処理
	$("#TIMETABLE_VIEW table td span").hover(
		function (e) {
			$("#noteView").text($(this).siblings('.note').text());

			//マウスの位置版
			// $("#noteView").css("left", e.pageX + 15);
			// $("#noteView").css("top", e.pageY + 15);
			//要素からの位置版
			$("#noteView").css("left", $(this).offset().left + 10);
			$("#noteView").css("top", $(this).offset().top + 30);

			$("#noteView").show();
		},
		function () {
			$("#noteView").hide();
		}
	);
});