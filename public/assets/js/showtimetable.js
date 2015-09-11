$(function(){
	$.ajax({
		data:"GET",
		url:"api.php",
		dataType:"json",
		success: function(data){
			$("#edit-jikanwari").append(data.body);
		}
	});
	//曜日の取得
    var now = new Date();
    var NowDay = now.getDay();
    console.log(NowDay);
    // //時間の取得
    var NowHours = now.getHours();

	//曜日にactive-columnをつける
	$("body > div > div > table > thead > tr > th").eq(NowDay).addClass("active-column");
	// //時間にactive-rowをつける
	$("tr").eq(NowHours-8).addClass('active-row');
	// //今日の授業にactive-tdをつける
	$("tr td:nth-child("+(NowDay+1)+")").addClass('active-td');
});
