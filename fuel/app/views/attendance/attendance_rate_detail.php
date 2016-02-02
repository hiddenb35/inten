<!-- Main content -->
<section id="ATTENDANCE_RATE_DETAIL" class="content">
    <div class="">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="center-block student-table">
                    <div class="student-table-row">
                        <div class="student-table-cell"><h3>学籍番号</h3></div>
                        <div class="student-table-cell"><h3>:K013C1296</h3></div>
                    </div>
                    <div class="student-table-row">
                        <div class="student-table-cell"><h3>名前</h3></div>
                        <div class="student-table-cell"><h3>:佐々木aaaaa</h3></div>
                    </div>
                </div>

                <div class="text-center">
                    <h3 class=""><span class="glyphicon glyphicon-star" aria-hidden="true">ビジネスマナー</span></h3>
                </div>
                <div class="col-sm-6 hidden-xs" id="highcharts3d"></div>
                <div class="col-sm-6">
                    <table class="table table-base" style="margin-top: 10%;">
                        <tr class="bg-primary"><th>授業数</th><th>不足</th><th>出席率</th></tr>
                        <tr><td>15</td><td>0</td><td>80.0％</td></tr>
                        <tr class="bg-primary"><th>出席</th><th>欠席</th><th>遅刻</th></tr>
                        <tr><td>12</td><td>3</td><td>0</td></tr>
                    </table>
                </div>

                <div class="attendance-log">
                    <div class="">
                        <table class="table table-base">
                            <tr class="bg-primary"><th></th><th>1時限</th><th>2時限</th><th>3時限</th><th>4時限</th><th>5時限</th><th>6時限</th></tr>
                            <tr><th>4/1</th><td>出席</td><td>出席</td><td>出席</td><td>出席</td><td>出席</td><td>欠席</td></tr>
                            <tr><th>4/1</th><td>出席</td><td>出席</td><td>出席</td><td>出席</td><td>出席</td><td>欠席</td></tr>
                            <tr><th>4/1</th><td>出席</td><td>出席</td><td>出席</td><td>出席</td><td>出席</td><td>欠席</td></tr>
                            <tr><th>4/1</th><td>出席</td><td>出席</td><td>出席</td><td>出席</td><td>出席</td><td>欠席</td></tr>
                        </table>
                    </div>
                </div>

                <button type="button" class="btn btn-primary pull-right">戻る</button>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.0/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.0/highcharts-3d.js"></script>
<script>
    /************ Hifhcharts-3d.js ***********/
    var h_data = [
        {name: "出席", y: 80, sliced: true, selected: true},
        {name: "遅刻", y: 9},
        {name: "欠席", y: 6},
        {name: "公欠", y: 3},
        {name: "休校", y: 2}
    ];
    $('#highcharts3d').highcharts({
        title: {text: ''},
        colors: ['#0f0','#ff0', '#f00', '#00f', '#0ff'],
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>:'+ this.percentage + '%';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '',
            data: h_data
        }],
        tooltip: {
            formatter: function() {
                return this.y +'%';},
            enabled:true
        },
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            },
            backgroundColor: 'transparent',
            height: 300
        },
        credits: {enabled: false}
    });
</script>
