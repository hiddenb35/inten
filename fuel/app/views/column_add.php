<section class="content-header">
    <h1>
        授業追加
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
<div id="column_add">
    <form class="form-horizontal">
        <div class="form-group">
            <label class="control-label" for="column">授業名</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="column">
            </div>
        </div>

        <label class="radio-inline">
            <input type="radio" name="optionsRadios" id="semester1" value="">前期
        </label>
        <label class="radio-inline">
            <input type="radio" name="optionsRadios" id="semester2" value="">後期
        </label>

        <div class="form-group">
            <label class="control-label" for="unit">総単位数</label>
            <div class="controls">
                <input type="text" class="input-mini" id="unit">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="date">作成日時</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="date">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label" for="update">更新日時</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="update">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label" for="classid">クラスID</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="class_id">
            </div>
        </div>
        
        <button type="button" class="btn btn-primary">登録</button>
        <button type="reset" class="btn btn-warning">キャンセル</button>

    </form>
</div>
</section>