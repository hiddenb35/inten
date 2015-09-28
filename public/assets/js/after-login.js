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
	$('.course-edit-college').editable({
	   type: 'select',
		showbuttons: false,
		source     : [ //TODO 動的に取得する。
			{value: '1', text: 'ITカレッジ'},
            {value: '2', text: 'クリエーターズカレッジ'},
            {value: '3', text: 'ミュージックカレッジ'},
			{value: '4' , text: 'ミュージックカレッジ'}
		],
		pk: 1,
		url: '#'
	});
});