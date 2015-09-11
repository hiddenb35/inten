$(function(){
    $.ajax({
        url: '/api/timetable',
        type: 'POST',
        dataType: 'json',
    }).done(function(json){

    }).fail(function(){

    });
});