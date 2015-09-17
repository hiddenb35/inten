<section class="content-header">
    <h1>
        パスワード変更
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
<div id="pass_update">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="current_pass" class="control-label">現在のパスワード</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="current_pass" name="current_password">
            </div>
        </div>

        <div class="form-group">
            <label for="new_pass" class="control-label">新規パスワード</label>
            <div class="controls">
                <input type="password" class="input-xlarge" id="new_pass" name="new_password">
            </div>
        </div>

        <div class="form-group">
            <label for="check_pass" class="control-label">新規パスワード(確認)</label>
            <div class="controls">
                <input type="password" class="input-xlarge" id="check_pass" name="new_password_confirm">
            </div>
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-primary">変更</button>
            <button type="reset" class="btn btn-warning">キャンセル</button>
        </div>
    </form>
</div>
</section>