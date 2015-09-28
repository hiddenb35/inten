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

	//専攻一覧
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
		source: [
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
		source: [
			{value: '1', text: 'ITカレッジ'},
			{value: '2', text: 'クリエイターズカレッジ'},
			{value: '3', text: 'ミュージックカレッジ'}
		]
	});
});