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
<div id="LESSON_ADD">
    <form class="form-horizontal">
        <div class="form-group">
            <label class="control-label" for="column">授業名</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="name" name="name">
            </div>
        </div>

        <label class="radio-inline">
            <input type="radio" id="semester1" name="term">前期
        </label>
        <label class="radio-inline">
            <input type="radio" id="semester2" name="term">後期
        </label>

        <div class="form-group">
            <label class="control-label" for="sum_credit">総単位数</label>
            <div class="controls">
                <input type="text" class="input-mini" id="sum_credit" name="sum_credit">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="class_id">クラスID</label>
            <div class="controls">
                <div>
                    <select name="class_id" size="1">
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                        <option value="サンプル1">サンプル1</option><!-- 芦沢ゾーン -->
                    </select>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary">登録</button>
        <button type="reset" class="btn btn-warning">キャンセル</button>

    </form>
</div>
</section>
