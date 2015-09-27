/**
 * Created by IT College on 2015/09/26.
 */
$(function(){
	//inplace editをインライン化
	$.fn.editable.defaults.mode = 'inline';

	//カレッジ一覧ページのinplace edit
	$('.college-name').editable({
		type: 'text',
		pk: 1,
		url: '#',
		title: 'Enter username'
	});

	//学科一覧ページのinplace edit
	$('.course-edit').editable({
		type: 'text',
		pk: 1,
		url: '#',
		title: 'Enter username'
	});
});