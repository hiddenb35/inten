<div id="ON_CAMPUS_EDIT">
    <section class="content-header">
        <h1>
            学内説明会編集
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="/jobhunting/on_campus_confirm" method="post" class="form-horizontal" role="form" id="on_campus_edit_form">
                        <input type="hidden" name="" id="" value="">
                        <div class="info-box" id="on_campus_edit_box">
                            <div class="inside_box">
                                <div class="form-group">
                                    <label for="company_name" class="col-md-2 control-label">企業名</label>
                                    <div class="col-md-10">
                                        <input type="text" id="company_name" name="company_name" class="form-control" value="第一商事" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company_code" class="col-md-2 control-label">企業コード</label>
                                    <div class="col-md-10">
                                        <input type="text" id="company_code" name="company_code" class="form-control" value="29132468" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date_time" class="col-md-2 control-label">日時</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="date" name="date" id="date_time" class="form-control" value="2015-11-28">
                                            </div>
                                            <div class="col-md-3 col-xs-10">
                                                <input type="time" name="time" class="form-control" value="14:00">
                                            </div>
                                            <div class="col-md-1 col-xs-1">
                                                <span class="help-block"><b>～</b></span>
                                            </div>
                                            <div class="col-md-3 col-xs-11 col-xs-offset-1 col-sm-offset-0">
                                                <input type="time" name="time" class="form-control" value="14:00">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deadline" class="col-md-2 control-label">申込期限</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-5 col-xs-10">
                                                <input type="date" name="start_date" id="deadline" class="form-control" value="2015-11-28">
                                            </div>
                                            <div class="col-md-1 col-xs-1">
                                                <span class="help-block"><b>～</b></span>
                                            </div>
                                            <div class="col-md-5 col-xs-11 col-xs-offset-1">
                                                <input type="date" name="end_date" class="form-control" value="2015-11-28">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="place" class="col-md-2 control-label">場所</label>
                                    <div class="col-md-10">
                                        <input type="text" id="place" name="place" class="form-control" value="30715教室" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="briefing_session_content" class="col-md-2 control-label">内容</label>
                                    <div class="col-md-10">
                                        <textarea id="briefing_session_content" name="briefing_session_content" class="form-control" rows="3">会社説明会</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="explainer" class="col-md-2 control-label">説明者</label>
                                    <div class="col-md-10">
                                        <input type="text" id="explainer" name="explainer" class="form-control" value="鳴海">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company_url" class="col-md-2 control-label">URL</label>
                                    <div class="col-md-10">
                                        <input type="text" id="company_url" name="company_url" class="form-control" value="http://www.co.jp">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="on_campus_edit_form_button">
                            <button type="submit" class="btn btn-danger btn-lg">変更</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
