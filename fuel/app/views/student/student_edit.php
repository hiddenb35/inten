<!-- Main content -->
<section id="STUDENT_EDIT" class="content">
    <div class="container">
        <form class="form-horizontal" method="post">
            <div class="form-group form-group-lg">
                <label for="username" class="control-label col-sm-2">学籍番号</label>
                <div class="col-sm-10">
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="k012c1234">
                    </div>
                </div>
            </div>

            <div class="form-group form-group-lg">
                <label for="password" class="control-label col-sm-2">パスワード</label>
                <div class="col-sm-10">
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
            </div>


            <div class="form-group form-group-lg">
                <label for="password_confirm" class="control-label col-sm-2">パスワード(確認)</label>
                <div class="col-sm-10">
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                    </div>
                </div>
            </div>


            <div class="form-group form-group-lg">
                <label class="control-label col-sm-2">名前</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><b>姓　</b></span>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="蒲田">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><b>名　</b></span>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="太郎">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-lg">
                <label class="control-label col-sm-2">名前(フリガナ)</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><b>セイ</b></span>
                                <input type="text" class="form-control" id="last_name_kana" name="last_name_kana" placeholder="カマタ">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><b>メイ</b></span>
                                <input type="text" class="form-control" id="first_name_kana" name="first_name_kana" placeholder="タロウ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-lg">
                <label class="control-label col-sm-2">生年月日</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-2">
                            <select name="birth_year" class="form-control" id="birth_year">
                                <option value="1994">1994年</option>
                                <option value="1995">1995年</option>
                                <option value="1996">1996年</option>
                                <option value="1997">1997年</option>
                                <option value="1998">1998年</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="birth_month" class="form-control" id="birth_month">
                                <option value="1">1月</option>
                                <option value="2">2月</option>
                                <option value="3">3月</option>
                                <option value="4">4月</option>
                                <option value="5">5月</option>
                                <option value="6">6月</option>
                                <option value="7">7月</option>
                                <option value="8">8月</option>
                                <option value="9">9月</option>
                                <option value="10">10月</option>
                                <option value="11">11月</option>
                                <option value="12">12月</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="birth_day" class="form-control" id="birth_day">
                                <option value="1">1日</option>
                                <option value="2">2日</option>
                                <option value="3">3日</option>
                                <option value="4">4日</option>
                                <option value="5">5日</option>
                                <option value="6">6日</option>
                                <option value="7">7日</option>
                                <option value="8">8日</option>
                                <option value="9">9日</option>
                                <option value="10">10日</option>
                                <option value="11">11日</option>
                                <option value="12">12日</option>
                                <option value="13">13日</option>
                                <option value="14">14日</option>
                                <option value="15">15日</option>
                                <option value="16">16日</option>
                                <option value="17">17日</option>
                                <option value="18">18日</option>
                                <option value="19">19日</option>
                                <option value="20">20日</option>
                                <option value="21">21日</option>
                                <option value="22">22日</option>
                                <option value="23">23日</option>
                                <option value="24">24日</option>
                                <option value="25">25日</option>
                                <option value="26">26日</option>
                                <option value="27">27日</option>
                                <option value="28">28日</option>
                                <option value="29">29日</option>
                                <option value="30">30日</option>
                                <option value="31">31日</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-lg">
                <label for="email" class="control-label col-sm-2">メールアドレス</label>
                <div class="col-sm-10">
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" id="email" name="email" placeholder="student@kamata.neec.jp">
                    </div>
                </div>
            </div>

            <div class="form-group form-group-lg">
                <label for="email_confirm" class="control-label col-sm-2">メールアドレス(確認)</label>
                <div class="col-sm-10">
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" id="email_confirm" name="email_confirm" placeholder="student@kamata.neec.jp">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">性別</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-12">
                            <div data-toggle="buttons">
                                <label class="btn btn-default"><input type="radio" name="gender" value="1">男性</label>
                                <label class="btn btn-default"><input type="radio" name="gender" value="2">女性</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-lg">
                <label class="control-label col-sm-2">クラス</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-2">
                            <select name="class_id" class="form-control" id="class_id">
                                <option value="1">IS07-1</option>
                                <option value="1">IS07-1</option>
                                <option value="2">IS07-2</option>
                                <option value="2">IS07-2</option>
                                <option value="2">IS07-2</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">登録</button>
                            <button type="reset" class="btn btn-warning btn-lg">キャンセル</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>