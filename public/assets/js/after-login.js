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
});