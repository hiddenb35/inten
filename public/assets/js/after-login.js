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
		pk: 1,
		url: '#',
		source     : [ //TODO 動的に取得する。
			{value: '1', text: 'ITカレッジ'},
			{value: '2', text: 'クリエーターズカレッジ'},
			{value: '3', text: 'ミュージックカレッジ'},
			{value: '4' , text: 'ミュージックカレッジ'}
		]
	});

	//専攻一覧ページのinplace edit
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

	//クラス一覧ページのinplace edit
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
});