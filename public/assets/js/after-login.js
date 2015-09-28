/**
 * Created by IT College on 2015/09/26.
 */
$(function(){
	$.fn.editable.defaults.mode = 'inline';
	$('.college-name').editable({
		type: 'text',
		pk: 1,
		url: '#',
		title: 'Enter username'
	});

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
	$("#TIMETABLE_ADD #subject").change(function(){
		$("#teacher").val($('#subject option:selected').data('teacher'));
	});
	$("#TIMETABLE_ADD table td").click(function() {
		thisStorage = ($(this));
		$("#TIMETABLE_ADD #timeadd").click();
		$('#subject').val($(this).data('lesson-id'));
		$("#teacher").val($('#subject option:selected').data('teacher'));
		$('#classroom').val($(this).children('.classroom').text());
		$("#note").val($(this).children('.note').text());

		$("#set").click(function(){
			$(thisStorage).data('lesson-id',$('#subject option:selected').val());
			$(thisStorage).children('.subject').text($('#subject option:selected').text());
			$(thisStorage).children('.teacher').text($('#subject option:selected').data('teacher'));
			$(thisStorage).children('.classroom').text($('#classroom').val());
			$(thisStorage).children('.note').text($('#note').val());
		});
	});
	var data = {"title":$('#title').text(),"params":[]};
	var tr = $("table tr");
	$("#TIMETABLE_ADD #transmission").click(function(){
		for (var i = 1; i < 9; i++) {
			var cells = tr.eq(i).children();
			data.params[i-1] = [];
			for (var j = 1; j < 6; j++) {
				data.params[i-1][j-1] = {"id":cells.eq(j).data('lesson-id'),"classroom":cells.eq(j).children('.classroom').text(),"note":cells.eq(j).children('.note').text()};
			}
		}
		data = JSON.stringify(data);
		console.log(data);
	});
});