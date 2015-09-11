$(function(){
	// 時間割をJSONで受け取って表示-------------------
    $.ajax({
        url: '/api/timetable',
        type: 'POST',
        dataType: 'json',
     }).done(function(data){
     	//console.log(data);
        $(".content").append(data.body[0].html);
    //-------------------------------------------

    // 時間割にクラスをつけてレスポンシブ-------------------
        var now = new Date();
        var todayDay = now.getDay() + 1;
        var currentHour = now.getHours() - 7;
        console.log(todayDay);

        //現在の時間と曜日にクラスをつける。
        //その曜日の番目のth,tdにクラスをつける
        //その時間のtrにクラスをつける。
        if(todayDay !== 6 || todayDay !== 7){
        	alert("aaaa");
	        $('#edit-table th:nth-child(' + todayDay + ')').addClass("active-column");
	        $('#edit-table td:nth-child(' + todayDay + ')').addClass("active-td");
	        $('#edit-table tr:nth-child(' + currentHour + ')').addClass("active-row");
	        $('#edit-table tr:nth-child(' + currentHour + ') td:nth-child(' + todayDay + ')').addClass("now");
		}else{
			$('#edit-table th:nth-child(2)').addClass("active-column");
		}
        //bootstrapのためのclass操作
        label: for(i = 2; i <= 6; i++){
            if(i == todayDay){
                continue label;
            }
            $('#edit-table th:nth-child(' + i + ')').addClass("hidden-xs");
            $('#edit-table td:nth-child(' + i + ')').addClass("hidden-xs");
        }
    });
    //-------------------------------------------

    // tdがクリックされたらtoggleが展開------------------
    $('#edit-table').on('click', 'td', function(){
        $(this).children('p').eq(3).slideToggle();
    });
    //-------------------------------------------

    //曜日のボタンがクリックされたらその曜日だけ表示-----------
    $('#week-select').on('click', 'button', function(){
        var index = $('button').index(this);
        index += 2;
        label: for(i = 2; i <= 6; i++){
            if(i == index){
                //remove
                $('#edit-table th:nth-child(' + i + ')').removeClass("hidden-xs");
                $('#edit-table td:nth-child(' + i + ')').removeClass("hidden-xs");
                continue label;
            }
            //add
            $('#edit-table th:nth-child(' + i + ')').addClass("hidden-xs");
            $('#edit-table td:nth-child(' + i + ')').addClass("hidden-xs");
        }
    });
    //-------------------------------------------
});
