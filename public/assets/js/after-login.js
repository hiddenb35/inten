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
			params.college_id = $(this).data('college-id');
			return params;
		},
		success: function (response) {
			console.log(response['errors']);
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
		pk: 2,
		url: '#',
		source: getPullDownMenuContent($('#college_id').children())
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
		$('#college_modal_content').append(text);
		//画面(ウィンドウ)の幅、高さを取得
		var w = $(window).width();
		var h = 80;
		// コンテンツ(#modal-content)の幅、高さを取得
		var cw = $("#college_modal_content").outerWidth();
		//センタリングを実行する
		$("#college_modal_content").css({"left": ((w - cw) / 2) + "px", "top": h + "px"});
		$("#college_modal_content").fadeIn("slow");
		setTimeout(function () {
			$("#college_modal_content").fadeOut("slow");
			$('#college_modal_content').empty();
		}, 5000);
	};
	//TODO ここまで

	//専攻一覧ページのin place edit
	$('.major-edit').editable({
		type: 'text',
		pk: 1,
		url: '#',
		title: 'Enter username'
	});
	$('.major-edit-course').editable({
		type: 'select',
		showbuttons: false,
		pk: 1,
		url: '#',
		source: [ //TODO 動的に取得する。
			{value: '1', text: 'ITスペシャリスト科'},
			{value: '2', text: 'ゲームクリエイター科'},
			{value: '3', text: 'コンサートイベント科'}
		]
	});
	$('.major-edit-college').editable({
		type: 'select',
		showbuttons: false,
		pk: 1,
		url: '#',
		source: [ //TODO 動的に取得する。
			{value: '1', text: 'ITカレッジ'},
			{value: '2', text: 'クリエイターズカレッジ'},
			{value: '3', text: 'ミュージックカレッジ'}
		]
	});

	//クラス一覧ページのin place edit
	$('.class-edit-name').editable({
		type: 'text',
		pk: 1,
		url: '#',
	});
	$('.class-edit-college').editable({
		type: 'select',
		showbuttons: false,
		pk: 1,
		url: '#',
		source: [ //TODO 動的に取得する。
			{value: '1', text: 'ITスペシャリスト科'},
			{value: '2', text: 'ゲームクリエイター科'},
			{value: '3', text: 'コンサートイベント科'}
		]
	});

	var getCollegeId = function () {
		return $(this).data('college-id');
	};


	//ここからtimetable_add
	$('#title').click(function () {
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
	var thisStorage;
	$("#TIMETABLE_ADD table td").click(function () {
		if ($(this).hasClass("active")) {
			$(this).removeClass("active");
		} else {
			$(this).addClass("active");
		}
		if ($(".active").length == 1) {
			thisStorage = $(this);
		}
	});
	$("#TIMETABLE_ADD #subject").change(function () {
		$("#teacher").val($('#subject option:selected').data('teacher'));
	});
	$("#TIMETABLE_ADD #selection").click(function () {
		if ($('#TIMETABLE_ADD td').hasClass('active') == false) {
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