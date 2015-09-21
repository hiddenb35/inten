<section class="content-header">
    <h1>
        学科登録
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
<div id="COURSE_ADD">
    <form class="form-horizontal" method="post">

        <div class="form-group">
            <label for="name" class="control-label">学科名</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="name" name="name">
            </div>
        </div>

        <div class="form-group">
            <label for="college_id">カレッジ</label>
            <!-- .selectpickerを適用するにはファイルをダウンロードしてくる必要あり -->
            <select class="selectpicker" data-style="btn-primary" name="college_id" id="college_id">
                <option>1</option>
                <option>1</option>
                <option>1</option>
                <option>1</option>
                <option>1</option>
                <option>1</option>
                <option>1</option>
                <option>1</option>
            </select>
        </div>

    <button type="submit" class="btn btn-primary">登録</button>
    <button type="reset" class="btn btn-warning">キャンセル</button>
    </form>
</div>
</section>