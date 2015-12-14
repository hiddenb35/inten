$(function(){

	//Javascript無効時の処理
	$("#ERR_NOSCRIPT").hide();

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
	});
	//変更を適応
	$("#set").click(function () {
		var setElement = $(".setElement");
		if($("select[name='subjectset'] option:selected").val() !== ""){
			setElement.children('.subject').text($("select[name='subjectset'] option:selected").text());
			setElement.data('lesson-id', $("select[name='subjectset'] option:selected").val());
			setElement.children('.teacher').text($("select[name='subjectset'] option:selected").data('teacher'));
		}else{
			//resetボタンの為の処理
			setElement.children('.subject').text("");
			console.log(setElement);
			setElement.data('lesson-id', '');
			setElement.children('.teacher').text("");
		}
		setElement.children('.classroom').text($("input[name='classroom']").val());
		setElement.children('.note').text($("textarea[name='textarea']").val());
		if($(".setElement .note").text() !== ""){
			$(".setElement span").show();
		}else{
			$(".setElement span").hide();
		}
		setElement.removeClass("setElement");
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
	var viewTh = $("#TIMETABLE_VIEW th");
	var viewTd = $("#TIMETABLE_VIEW td");
	//その日の時間割を表示
	$('td:not(.today), th:not(.today)','#TIMETABLE_VIEW').addClass('hidden-xs');
	$('#TIMETABLE_VIEW tbody th').removeClass('hidden-xs');
	$('#TIMETABLE_VIEW thead th:eq(0)').removeClass('hidden-xs');

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
	var noteView = $("#note_view");
	$("#TIMETABLE_VIEW td span").hover(
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

	//popup内のリセットボタン処理
	$("#reset").click(function(){
		$("select[name='subjectset']").val("");
		$("input[name='teachername']").val("");
		$("input[name='classroom']").val("");
		$("textarea[name='textarea']").val("");
	});

	//*********************出席管理画面*********************
	var setcolor = ["#3c8dbc","#f39c12","#dd4b39"];
	$("#TAKE_ATTENDANCE #attendance").click(function(event) {
		var i = 0;
		function setName(){
			if(i === $("#accordion").children().length){
				$(".close").click();
				$("#attendance").text("出席を取り直す").css("background-color","#555");
			}
			$(".modal-title").text($(".pc-size").children().eq(i).find('.box-header').children().eq(1).text());
			$(".modal-title").next().text($(".pc-size").children().eq(i).find('.box-header').children().eq(2).text());
			$(".modal-header h2").text($(".pc-size").children().eq(i).find('.box-content').children().text());
		}
		setName();

		$(".modal-body input").click(function(event) {
			event.preventDefault();
			var index = $('.modal-body input').index(this);
			if(index === 1)index = 2;
			$(".panel").eq(i).find('.create-circle').css('background-color', setcolor[index]);
			i++;
			setName();
		});

		$(".modal-footer button").click(function(event) {
			event.preventDefault();
			i--;
			setName();
		});
	});

	$("#TAKE_ATTENDANCE .panel button").click(function(event) {
		var index = $(this).closest('.panel').find('button').index(this);
		$(this).closest(".panel").find('.create-circle').css('background-color',setcolor[index]);
	});

	$("#TAKE_ATTENDANCE .box-footer button").click(function(event) {
		var index = $(this).closest('.box-footer').children('button').index(this);
		$(this).closest('.box').children('.box-header').css('border-bottom-color',setcolor[index]);
		$(this).closest('.box').find('.box-header button').click();
	});

	//*********************学内説明会登録画面*********************

	//募集職種周辺のjs
	$("#ON_CAMPUS_FORM #work_add").click(function(event) {
		$(this).closest('.form-group').children('div').append('<div class="col-md-10 col-md-offset-2 input-group append-box"><input type="text" name="recruitment[]" class="form-control"><span class="input-group-btn"><button type="button" class="btn"><i class="fa fa-lg fa-close"></i></button></span></div>');
	});
	$("#ON_CAMPUS_FORM #recruitment_area").on("click","span",function(event) {
		var index = $(this).closest('#recruitment_area').find('span').index(this);
		if(index === 0) $(this).closest('div').next().removeClass('append-box');
		$(this).closest('div').remove();
	});

	//添付ファイル周辺のjs
	$("#ON_CAMPUS_FORM #file_add").click(function(event) {
		$(this).closest('.form-group').children('div').last().children('input').last().click();
	});
	$("#ON_CAMPUS_FORM #file_fild").on("change","input",function(){
		$(this).closest('.form-group').find('.form-control').eq($(this).index()).val($(this).val());
		$(this).closest('.form-group').children('div').eq(0).children('.hidden').removeClass('hidden');
		$(this).closest('.form-group').children('div').eq(0).append('<div class="col-md-10 col-md-offset-2 hidden input-group append-box"><input type="text" class="form-control"><span class="input-group-btn"><button type="button" class="btn"><i class="fa fa-lg fa-close"></i></button></span></div>');
		$("#file_fild").append('<input type="file" name="file[]">');
	});
	$("#ON_CAMPUS_FORM #file_area").on("click","span",function(event) {
		var index = $(this).closest('#file_area').find('span').index(this);
		$("#file_fild").children('input').eq(index).remove();
		$(this).closest('div').remove();
	});
});