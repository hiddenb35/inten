/**
 * Created by IT College on 2015/09/26.
 */
$(function(){
	//in place editをインライン化
	$.fn.editable.defaults.mode = 'inline';

	//カレッジ一覧ページのin place edit
	$('.college-name').editable({
		type: 'text',
		url: '/admin/college/edit',
		//success: function(response, newValue){
        //
		//},
		//error: function(response, newValue){
        //
		//}
	}).on('hidden', function(e, reason){
		if(reason === 'save') {
			var sendCollegeEditData = {
				id: $(this).data('college-id'),
				name: $(this).context.textContent
			};
			$(this).editable('submit', {
				ajaxOptions: {
					dataType: 'json',
					data: sendCollegeEditData
				},
				success: function(response){
					if('error' in response) {
						var errorMessage = response['error']['message'];
						testFunction(errorMessage);
						return;
					}
					var text = "データベースに保存しました。"
					testFunction(text);
				},
				error: function(response){
					var errorText = "エラーが発生しました。";
					testFunction(errorText);
				}
			});
		}
	});

	//TODO @Author kasai リファクタリング
	var testFunction = function(text){
		$('#college_modal_content').append(text);
		//画面(ウィンドウ)の幅、高さを取得
		var w = $( window ).width();
		var h = 80;
		// コンテンツ(#modal-content)の幅、高さを取得
		var cw = $( "#college_modal_content" ).outerWidth();
		//センタリングを実行する
		$( "#college_modal_content" ).css( {"left": ((w - cw)/2) + "px","top": h + "px"} ) ;
		$( "#college_modal_content" ).fadeIn( "slow" );
		setTimeout(function(){
			$( "#college_modal_content" ).fadeOut("slow");
		},5000);
	};
	//TODO ここまで

	//学科一覧ページのin place edit
	$('.course-edit').editable({
		type: 'text',
		pk: 1,
		url: '#',
		title: 'Enter username'
	});
	$('.course-edit-college').editable({
		type: 'select',
		showbuttons: false,
		pk: 1,
		url: '#',
		source     : [ //TODO 動的に取得する。
			{value: '1', text: 'ITカレッジ'},
			{value: '2', text: 'クリエーターズカレッジ'},
			{value: '3', text: 'ミュージックカレッジ'},
			{value: '4' , text: 'ミュージックカレッジ'}
		]
	});

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

	var getCollegeId = function(){
		return $(this).data('college-id');
	};


	//ここからtimetable_add
	$('#title').click(function() {
		$('#title').css( 'display', 'none');
		$('#titleEdit').val( $( '#title').text()).css( 'display', '').focus();
	});
	$('#titleEdit').blur(function() {
		$('#titleEdit').css( 'display', 'none');
		$('#title').text($('#titleEdit').val()).css( 'display', '');
	});
	$('#titleEdit').keypress( function(e) {
		if ( e.which == 13) {
			$('#titleEdit').css( 'display', 'none');
			$('#title').text($('#titleEdit').val()).css( 'display', '');
			return false;
		}
	});
	var thisStorage ;
	$("#TIMETABLE_ADD table td").click(function() {
		if($(this).hasClass("active")){
			$(this).removeClass("active");
		}else{
			$(this).addClass("active");
		}
		if($(".active").length == 1){
			thisStorage = $(this);
		}
	});
	$("#TIMETABLE_ADD #subject").change(function(){
		$("#teacher").val($('#subject option:selected').data('teacher'));
	});
	$("#TIMETABLE_ADD #selection").click(function() {
		if($('#TIMETABLE_ADD td').hasClass('active') == false){
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

		$("#set").click(function(){
			$(".setElement").data('lesson-id',$('#subject option:selected').val());
			$(".setElement").children('.subject').text($('#subject option:selected').text());
			$(".setElement").children('.teacher').text($('#subject option:selected').data('teacher'));
			$(".setElement").children('.classroom').text($('#classroom').val());
			$(".setElement").children('.note').text($('#note').val());
			$(".setElement").removeClass("setElement");
		});
	});
	var data = {"name":$('#title').text(),"json":[]};
	var tr = $("table tr");
	$("#TIMETABLE_ADD #transmission").click(function(){
		for (var i = 1; i < 9; i++) {
			var cells = tr.eq(i).children();
			data.json[i-1] = [];
			for (var j = 1; j < 6; j++) {
				data.json[i-1][j-1] = {"lesson_id":cells.eq(j).data('lesson-id'),"room_number":cells.eq(j).children('.classroom').text(),"notes":cells.eq(j).children('.note').text()};
			}
		}
		data = JSON.stringify(data);
		console.log(data);
	});
});