$(function(){
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
	$('.college-text-college-name').editable({
		pk: 1,
		type: 'text',
		url: '/admin/college/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		display: function (value, response) {
			if (!response) {
				return;
			}
			if (!('errors' in response)) {
				$(this).text(value);
			}
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
	$('.course-text-course-code').editable({
		type: 'text',
		pk: 1,
		url: '/admin/course/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		display: function (value, response) {
			if (!response) {
				return;
			}
			if (!('errors' in response)) {
				$(this).text(value);
			}
		},
		params: function (params) {
			params.id = $(this).data('course-id');
			params.code = params.value;
			params.name = $(this).siblings('.course-text-course-name').text();
			params.year_system = $(this).siblings('.course-text-course-year-system').text();
			//params.college_id = $(this).siblings('.course-pull-down-college-name').text();
			params.college_id = $(this).siblings('.course-pull-down-college-name').data('college-id');
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
	$('.course-text-course-name').editable({
		type: 'text',
		pk: 2,
		url: '/admin/course/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		display: function (value, response) {
			if (!response) {
				return;
			}
			if (!('errors' in response)) {
				$(this).text(value);
			}
		},
		params: function (params) {
			params.id = $(this).siblings('.course-text-course-code').data('course-id');
			params.code = $(this).siblings('.course-text-course-code').text();
			params.name = params.value;
			params.year_system = $(this).siblings('.course-text-course-year-system').text();
			params.college_id = $(this).siblings('.course-pull-down-college-name').data('college-id');
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
	$('.course-text-course-year-system').editable({
		type: 'text',
		pk: 3,
		url: '/admin/course/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		display: function (value, response) {
			if (!response) {
				return;
			}
			if (!('errors' in response)) {
				$(this).text(value);
			}
		},
		params: function (params) {
			params.id = $(this).siblings('.course-text-course-code').data('course-id');
			params.code = $(this).siblings('.course-text-course-code').text();
			params.name = $(this).siblings('.course-text-course-name').text();
			params.year_system = params.value;
			params.college_id = $(this).siblings('.course-pull-down-college-name').data('college-id');
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
	$('.course-pull-down-college-name').editable({
		type: 'select',
		showbuttons: false,
		pk: 4,
		source: getPullDownMenuContent($('#college_id').children()),
		url: '/admin/course/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		display: function (value, sources, response) {
			if (!response) {
				return;
			}
			if (!('errors' in response)) {
				var selector = "#college_id option[value=" + value + "]";
				$(this).text($(selector).text());
			}
		},
		params: function (params) {
			params.id = $(this).siblings('.course-text-course-code').data('course-id');
			params.code = $(this).siblings('.course-text-course-code').text();
			params.name = $(this).siblings('.course-text-course-name').text();
			params.year_system = $(this).siblings('.course-text-course-year-system').text();
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
	$('.class-text-class-name').editable({
		type: 'text',
		pk: 1,
		url: '/admin/class/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		display: function (value, response) {
			if (!response) {
				return;
			}
			if (!('errors' in response)) {
				$(this).text(value);
			}
		},
		params: function (params) {
			params.id = $(this).data('class-id');
			params.name = params.value;
			params.teacher_id = $(this).siblings('.class-pull-down-teacher-name').data('teacher-id');
			params.course_id = $(this).siblings('.class-pull-down-course-name').data('course-id');
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
	$('.class-pull-down-teacher-name').editable({
		type: 'select',
		showbuttons: false,
		pk: 2,
		source: getPullDownMenuContent($('#teacher_id').children()),
		url: '/admin/class/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		display: function (value, sources, response) {
			if (!response) {
				return;
			}
			if (!('errors' in response)) {
				var selector = "#teacher_id option[value=" + value + "]";
				$(this).text($(selector).text());
			}
		},
		params: function (params){
			params.id = $(this).siblings('.class-text-class-name').data('class-id');
			params.name = $(this).siblings('.class-text-class-name').text();
			params.teacher_id = params.value;
			params.course_id = $(this).siblings('.class-pull-down-course-name').data('course-id');
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
	$('.class-pull-down-course-name').editable({
		type: 'select',
		showbuttons: false,
		pk: 3,
		source: getPullDownMenuContent($('#course_id').children()),
		url: '/admin/major/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		display: function (value, sources, response) {
			if (!response) {
				return;
			}
			if (!('errors' in response)) {
				var selector = "#course_id option[value=" + value + "]";
				$(this).text($(selector).text());
			}
		},
		params: function (params){
			params.id = $(this).siblings('.class-text-class-name').data('class-id');
			params.name = $(this).siblings('.class-text-class-name').text();
			params.teacher_id = $(this).siblings('.class-pull-down-teacher-name').data('teacher-id');
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

	//専攻一覧ページのin place edit
	$('.major-text-major-name').editable({
		type: 'text',
		pk: 1,
		url: '/admin/major/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		display: function (value, response) {
			if (!response) {
				return;
			}
			if (!('errors' in response)) {
				$(this).text(value);
			}
		},
		params: function (params){
			params.id = $(this).data('major-id');
			params.name = params.value;
			params.course_id = $(this).siblings('.major-pull-down-course-name').data('course-id');
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
	$('.major-pull-down-course-name').editable({
		type: 'select',
		showbuttons: false,
		pk: 2,
		source: getPullDownMenuContent($('#course_id').children()),
		url: '/admin/major/edit',
		ajaxOptions: {
			dataType: 'json'
		},
		display: function (value, sources, response) {
			if (!response) {
				return;
			}
			if (!('errors' in response)) {
				var selector = "#course_id option[value=" + value + "]";
				$(this).text($(selector).text());
			}
		},
		params: function (params){
			params.id = $(this).siblings('.major-text-major-name').data('major-id');
			params.name = $(this).siblings('.major-text-major-name').text();
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
		var addClassName = "";
		if (!('errors' in response)) {
			responseMessage = "データベースに保存しました。";
			addClassName = "custom-alert-success";
			testFunction(responseMessage, addClassName);
			return;
		}
		//ここからエラーのメッセージ作成
		var errors = response['errors'];
		$.each(errors, function (key, errorMessage) {
			responseMessage += "<p>" + errorMessage + "</p>"
		});
		addClassName = "custom-alert-danger";
		testFunction(responseMessage, addClassName);
	};
	//TODO @Author kasai リファクタリング
	var testFunction = function (text, addClass) {
		$('#edit_modal_content').empty();
		$('#edit_modal_content').removeClass('alert-success');
		$('#edit_modal_content').removeClass('alert-danger');
		$('#edit_modal_content').addClass(addClass);
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
			//$('#edit_modal_content').empty();
		}, 5000);
	};
	//TODO ここまで

	// 説明会登録画面のdate range picker
	// format指定
	var dateFormat = "YYYY-MM-DD hh:mm";
	var timeFormat = "hh:mm";

	// 申込期限の項目
	$("#deadline").daterangepicker({
		timePicker: true,
		timePicker24Hour: true,
		locale: {
			format: dateFormat
		}
	}, function(start, end, label){
		var startDate = start.format(dateFormat);
		var endDate = end.format(dateFormat);

		$('#entry_start').attr('value', startDate);
		$('#entry_end').attr('value', endDate);
	});
});