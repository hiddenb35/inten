/**
 * Created by IT College on 2015/09/26.
 */
$(function () {
	//in place editをインライン化
	$.fn.editable.defaults.mode = 'inline';

	//プルダウンメニューの動的取得
	var getPullDownMenuContent = function(pullDownMenuElements){
		var selectOptionObject = [];
		$.each(pullDownMenuElements, function (key, selectOption) {
			var selectOptionArray = {value: selectOption.value, text: selectOption.text};
			selectOptionObject.push(selectOptionArray);
		});
		return selectOptionObject;
	};

	//カレッジ一覧ページのin place edit
	$('.college-name').editable({
		pk: 1,
		type: 'text',
		url: '/admin/college/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		params: function (params) {
			params.id = $(this).data('college-id');
			params.name = params.value;
			return params;
		},
		success: function (response) {
			createAjaxResponseMessage(response);
		},
		error: function (response) {
			var ajaxErrorMessage = "エラーが発生しました。";
			testFunction(ajaxErrorMessage);
		}
	});

	//学科一覧ページのin place edit
	$('.text-course-code').editable({
		type: 'text',
		pk: 1,
		url: '/admin/course/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		params: function (params) {
			params.id = $(this).data('course-id');
			params.code = params.value;
			params.name = $(this).siblings('.text-course-name').text();
			params.year_system = $(this).siblings('.text-course-year-system').text();
			//params.college_id = $(this).siblings('.pull-down-college-name').text();
			params.college_id = $(this).siblings('.pull-down-college-name').data('college-id');
			return params;
		},
		success: function (response) {
			createAjaxResponseMessage(response);
		},
		error: function (response) {
			var ajaxErrorMessage = "エラーが発生しました。";
			testFunction(ajaxErrorMessage);
		}
	});
	$('.text-course-name').editable({
		type: 'text',
		pk: 2,
		url: '/admin/course/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		params: function (params) {
			params.id = $(this).siblings('.text-course-code').data('course-id');
			params.code = $(this).siblings('.text-course-code').text();
			params.name = params.value;
			params.year_system = $(this).siblings('.text-course-year-system').text();
			params.college_id = $(this).siblings('.pull-down-college-name').data('college-id');
			return params;
		},
		success: function (response) {
			createAjaxResponseMessage(response);
		},
		error: function (response) {
			var ajaxErrorMessage = "エラーが発生しました。";
			testFunction(ajaxErrorMessage);
		}
	});
	$('.text-course-year-system').editable({
		type: 'text',
		pk: 3,
		url: '/admin/course/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		params: function (params) {
			params.id = $(this).siblings('.text-course-code').data('course-id');
			params.code = $(this).siblings('.text-course-code').text();
			params.name = $(this).siblings('.text-course-name').text();
			params.year_system = params.value;
			params.college_id = $(this).siblings('.pull-down-college-name').data('college-id');
			return params;
		},
		success: function (response) {
			createAjaxResponseMessage(response);
		},
		error: function (response) {
			var ajaxErrorMessage = "エラーが発生しました。";
			testFunction(ajaxErrorMessage);
		}
	});
	$('.pull-down-college-name').editable({
		type: 'select',
		showbuttons: false,
		pk: 4,
		source: getPullDownMenuContent($('#college_id').children()),
		url: '/admin/course/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		params: function (params) {
			params.id = $(this).siblings('.text-course-code').data('course-id');
			params.code = $(this).siblings('.text-course-code').text();
			params.name = $(this).siblings('.text-course-name').text();
			params.year_system = $(this).siblings('.text-course-year-system').text();
			params.college_id= params.value;
			return params;
		},
		success: function (response) {
			createAjaxResponseMessage(response);
		},
		error: function (response) {
			var ajaxErrorMessage = "エラーが発生しました。";
			testFunction(ajaxErrorMessage);
		}
	});

	//クラス一覧ページのin place edit
	$('.text-class-name').editable({
		type: 'text',
		pk: 1,
		url: '/admin/class/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		params: function (params) {
			params.id = $(this).data('class-id');
			params.name = params.value;
			params.teacher_id = $(this).siblings('.pull-down-teacher-name').data('teacher-id');
			params.course_id = $(this).siblings('.pull-down-course-name').data('course-id');
			return params;
		},
		success: function (response) {
			createAjaxResponseMessage(response);
		},
		error: function (response) {
			var ajaxErrorMessage = "エラーが発生しました。";
			testFunction(ajaxErrorMessage);
		}
	});
	$('.pull-down-teacher-name').editable({
		type: 'select',
		showbuttons: false,
		pk: 2,
		source: getPullDownMenuContent($('#teacher_id').children()),
		url: '/admin/class/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		params: function (params){
			params.id = $(this).siblings('.text-class-name').data('class-id');
			params.name = $(this).siblings('.text-class-name').text();
			params.teacher_id = params.value;
			params.course_id = $(this).siblings('.pull-down-course-name').data('course-id');
			return params;
		},
		success: function (response) {
			createAjaxResponseMessage(response);
		},
		error: function (response) {
			var ajaxErrorMessage = "エラーが発生しました。";
			testFunction(ajaxErrorMessage);
		}
	});

	//専攻一覧ページのin place edit
	$('.text-major-name').editable({
		type: 'text',
		pk: 1,
		url: '/admin/major/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		params: function (params){
			params.id = $(this).data('major-id');
			params.name = params.value;
			params.course_id = $(this).siblings('.pull-down-course-name').data('course-id');
			return params;
		},
		success: function (response) {
			createAjaxResponseMessage(response);
		},
		error: function (response) {
			var ajaxErrorMessage = "エラーが発生しました。";
			testFunction(ajaxErrorMessage);
		}
	});
	$('.pull-down-course-name').editable({
		type: 'select',
		showbuttons: false,
		pk: 2,
		source: getPullDownMenuContent($('#course_id').children()),
		url: '/admin/major/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		params: function (params){
			params.id = $(this).siblings('.text-major-name').data('major-id');
			params.name = $(this).siblings('.text-major-name').text();
			params.course_id = params.value;
			return params;
		},
		success: function (response) {
			createAjaxResponseMessage(response);
		},
		error: function (response) {
			var ajaxErrorMessage = "エラーが発生しました。";
			testFunction(ajaxErrorMessage);
		}
	});

	//ajax通信成功時に画面に出すメッセージの生成
	//TODO 今後、成功した時のほうが処理が長くなる場合、if文の条件式を逆転させます。
	var createAjaxResponseMessage = function (response) {
		var responseMessage = '';
		if (!('errors' in response)) {
			responseMessage = "データベースに保存しました。";
			testFunction(responseMessage);
			return;
		}
		//ここからエラーのメッセージ作成
		var errors = response['errors'];
		$.each(errors, function (key, errorMessage) {
			responseMessage += "<p>" + errorMessage + "</p>"
		});
		testFunction(responseMessage);
	};
	//TODO @Author kasai リファクタリング
	var testFunction = function (text) {
		$('#edit_modal_content').append(text);
		//画面(ウィンドウ)の幅、高さを取得
		var w = $(window).width();
		var h = 80;
		// コンテンツ(#modal-content)の幅、高さを取得
		var cw = $("#edit_modal_content").outerWidth();
		//センタリングを実行する
		$("#edit_modal_content").css({"left": ((w - cw) / 2) + "px", "top": h + "px"});
		$("#edit_modal_content").fadeIn("slow");
		setTimeout(function () {
			$("#edit_modal_content").fadeOut("slow");
			$('#edit_modal_content').empty();
		}, 5000);
	};
	//TODO ここまで

	var getCollegeId = function () {
		return $(this).data('college-id');
	};


	//ここからtimetable_add
	var tdlg = $("#TIMETABLE_ADD table td").length;
	for(i = 0; i < tdlg; i++){
		if($("#TIMETABLE_ADD table td").eq(i).children('.note').text() !== ""){
			$("#TIMETABLE_ADD table td").eq(i).children('span').show();
		}
	}
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
	var thisStorage ;
	$("#TIMETABLE_ADD table td").click(function() {
		$(this).toggleClass("active");
		if($(".active").length == 1){
			thisStorage = $(this);
		}
		if($("#TIMETABLE_ADD table td").hasClass("active") === false){
			$("#selection").addClass('inactive');
		}else{
			$("#selection").removeClass('inactive');
		}
	});
	$("#TIMETABLE_ADD #subject").change(function () {
		$("#teacher").val($('#subject option:selected').data('teacher'));
	});
	$("#TIMETABLE_ADD #selection").click(function() {
		if($('#TIMETABLE_ADD td').hasClass('active') === false){
			alert("項目が選択されていません");
			return false;
		}
		$(".setElement").removeClass('setElement');
		$(".active").addClass("setElement");
		$(".active").removeClass("active");

		$("#TIMETABLE_ADD #timeadd").click();
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
	var data = [];
	var tr = $("table tr");
	$("#TIMETABLE_ADD #transmission").click(function () {
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

		$.ajax({
			url: '/timetable/add',
			type: 'POST',
			dataType: 'json',
			data: {name: $('#title').text(), json: data, class_id: $('input[name="class_id"]').val()}
		})
			.done(function () {
				console.log("success");
			})
			.fail(function () {
				console.log("error");
			});
	});
});