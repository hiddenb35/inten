<!-- Main content -->
<section id="PASS_UPDATE"class="content">
    <div class="container">
        <form class="form-horizontal" method="post">

            <div class="form-group form-group-lg">
                <label for="current_pass" class="control-label col-sm-2">現在のパスワード</label>
                <div class="col-sm-10">
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon">
                            <i class="ion-unlocked"></i>
                        </span>
                        <input type="password" class="form-control" id="current_pass" name="current_password">
                    </div>
                </div>
            </div>

            <div class="form-group form-group-lg">
                <label for="new_pass" class="control-label col-sm-2">新規パスワード</label>
                <div class="col-sm-10">
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon">
                            <i class="ion-locked"></i>
                        </span>
                        <input type="password" class="form-control" id="new_pass" name="new_password">
                    </div>
                </div>
            </div>

            <div class="form-group form-group-lg">
                <label for="check_pass" class="control-label col-sm-2">新規パスワード(確認)</label>
                <div class="col-sm-10">
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon">
                            <i class="ion-locked"></i>
                        </span>
                        <input type="password" class="form-control" id="check_pass" name="new_password_confirm">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">変更</button>
                            <button type="reset" class="btn btn-warning btn-lg">キャンセル</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>