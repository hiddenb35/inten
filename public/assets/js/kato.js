$(function(){

	//*********************時間割画面*********************

	//読み込み時に備考ラベルを隠す処理
	var allTd = $("#TIMETABLE_VIEW td, #TIMETABLE_ADD td, #TIMETABLE_EDIT td");
	for(i = 0; i < allTd.length; i++){
		if(allTd.eq(i).children('.note').text() !== "")
			allTd.eq(i).children('span').show();
	}

	//タイトル編集
	var title = $("#TIMETABLE_ADD h3[class='box-title'], #TIMETABLE_EDIT h3[class='box-title']");
	var titleEdit = $("#TIMETABLE_ADD input[name='titleedit'], #TIMETABLE_EDIT input[name='titleedit']");
	title.click(function() {
		title.hide();
		titleEdit.val(title.text()).show().focus().select();
	});
	titleEdit.blur(function (){
		titleEdit.hide();
		title.show();
		if (titleEdit.val() !== "")
			title.text(titleEdit.val());
	});
	titleEdit.keypress(function (e){
		if (e.which === 13) {
			titleEdit.hide();
			title.show();
			if (titleEdit.val() !== "")
				title.text(titleEdit.val());
			return false;
		}
	});

	//項目を押したときの処理（ｔｄ）
	var thisStorage ;
	$("#TIMETABLE_ADD td, #TIMETABLE_EDIT td").click(function() {
		$(this).toggleClass("active");
		if($(".active").length == 1){
			thisStorage = $(this);
		}
		if($("td").hasClass("active") === false){
			$("#selection").addClass('inactive');
		}else{
			$("#selection").removeClass('inactive');
		}
	});

	//教員自動表示
	$("#TIMETABLE_ADD select[name='subjectset'], #TIMETABLE_EDIT select[name='subjectset']").change(function () {
		$("input[name='teachername']").val($("select[name='subjectset'] option:selected").data('teacher'));
	});

	//項目編集処理
	$("#TIMETABLE_ADD #selection,#TIMETABLE_EDIT #selection").click(function() {
		if($('td').hasClass('active') === false){
			alert("項目が選択されていません");
			return false;
		}

		$("#selection").addClass('inactive');
		$(".setElement").removeClass('setElement');
		$(".active").addClass("setElement");
		$(".active").removeClass("active");

		$("#timeadd").click();
		$("select[name='subjectset']").val($(thisStorage).data('lesson-id'));
		$("input[name='teachername']").val($("select[name='subjectset'] option:selected").data('teacher'));
		$("input[name='classroom']").val($(thisStorage).children('.classroom').text());
		$("textarea[name='textarea']").val($(thisStorage).children('.note').text());

		//変更を適応
		$("#set").click(function () {
			var setElement = $(".setElement");
			if($("select[name='subjectset'] option:selected").val() !== "")
				setElement.children('.subject').text($("select[name='subjectset'] option:selected").text());
			setElement.data('lesson-id', $("select[name='subjectset'] option:selected").val());
			setElement.children('.teacher').text($("select[name='subjectset'] option:selected").data('teacher'));
			setElement.children('.classroom').text($("input[name='classroom']").val());
			setElement.children('.note').text($("textarea[name='textarea']").val());
			if($(".setElement .note").text() !== ""){
				$(".setElement span").show();
			}else{
				$(".setElement span").hide();
			}
			setElement.removeClass("setElement");
		});
	});

	//送信データ加工処理
	var data = [];
	var tr = $("table tr");
	$("#TIMETABLE_ADD #transmission, #TIMETABLE_EDIT #transmission").click(function () {
		for (var i = 1; i < 9; i++) {
			var cells = tr.eq(i).children();
			data[i - 1] = [];
			for (var j = 1; j < 6; j++) {
				if (cells.eq(j).data('lesson-id') === "") {
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
		//送るデータを格納
		$("input[name='name']").val($("h3[class='box-title']").text());
		$("input[name='json']").val(data);
		$("form input[name='class_id']").val($('input[name="class_id"]').eq(0).val());
	});

	//ここから時間割表示画面のレスポンシブ処理
	var todayWeek = new Date().getDay();
	var viewTh = $("#TIMETABLE_VIEW th");
	var viewTd = $("#TIMETABLE_VIEW td");
	//その日の時間割を表示
	$("#TIMETABLE_VIEW td,#TIMETABLE_VIEW th").addClass('hidden-xs');
	if(todayWeek===0||todayWeek===6){todayWeek=1;}
	for(i=0; i<viewTh.length; i++){
		if(i===0||i===todayWeek||i>=6)
			viewTh.eq(i).removeClass('hidden-xs');
	}
	for(i=todayWeek; i <= viewTd.length; i+=5){
		viewTd.eq(i-1).removeClass('hidden-xs');
	}
	//押した曜日の時間割を表示
	$("#week-select button").click(function(event) {
		var weekSelect = $("#week-select button").index(this);
		$("#TIMETABLE_VIEW td,#TIMETABLE_VIEW th").addClass('hidden-xs');
		for(i=0; i<viewTh.length; i++){
			if(i===0||i===weekSelect+1||i>=6)
				viewTh.eq(i).removeClass('hidden-xs');
		}
		for(i=weekSelect+1; i <= viewTd.length; i+=5){
			viewTd.eq(i-1).removeClass('hidden-xs');
		}
	});

	//備考ラベルhover時の処理
	var noteView = $("#noteView");
	$("#TIMETABLE_VIEW span").hover(
		function (e){
			noteView.text($(this).siblings('.note').text());
			noteView.css("left", $(this).offset().left + 10);
			noteView.css("top", $(this).offset().top + 30);
			noteView.show();
		},
		function (){
			noteView.hide();
		}
	);

	//*********************出席管理画面*********************
});