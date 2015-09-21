<section class="content-header">
    <h1>
        生徒情報編集
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
<div id="STUDENT_EDIT">
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label class="control-label" for="username">学籍番号</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="username" name="username">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="password">パスワード</label>
            <div class="controls">
                <input type="password" class="input-xlarge" id="password" name="password">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="password_confirm">パスワード(確認)</label>
            <div class="controls">
                <input type="password" class="input-xlarge" id="password" name="password_confirm">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="last_name">姓</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="last_name" name="last_name">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="first_name">名</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="first_name" name="first_name">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="last_name_kana">セイ</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="last_name_kana" name="last_name_kana">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="first_name_kana">メイ</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="first_name_kana" name="first_name_kana">
                </div>
        </div>


        <div class="form-group">
            <label class="control-label" for="birth_year">生年月日(西暦)</label>
            <div class="controls">
                <div>
                    <select name="birth_year">
                        <option value="0">1994</option><!-- 芦沢ゾーン -->
                        <option value="0">1994</option><!-- 芦沢ゾーン -->
                        <option value="0">1994</option><!-- 芦沢ゾーン -->
                        <option value="0">1994</option><!-- 芦沢ゾーン -->
                        <option value="0">1994</option><!-- 芦沢ゾーン -->
                   </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="birth_month">生年月日(月)</label>
            <div class="controls">
                <div>
                    <select name="birth_month">
                        <option value="0">1</option>
                        <option value="0">2</option>
                        <option value="0">3</option>
                        <option value="0">4</option>
                        <option value="0">5</option>
                        <option value="0">6</option>
                        <option value="0">7</option>
                        <option value="0">8</option>
                        <option value="0">9</option>
                        <option value="0">10</option>
                        <option value="0">11</option>
                        <option value="0">12</option>
                   </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="birth_day">生年月日(日)</label>
            <div class="controls">
                <div>
                    <select name="birth_day">
                        <option value="0">1</option>
                        <option value="0">2</option>
                        <option value="0">3</option>
                        <option value="0">4</option>
                        <option value="0">5</option>
                        <option value="0">6</option>
                        <option value="0">7</option>
                        <option value="0">8</option>
                        <option value="0">9</option>
                        <option value="0">10</option>
                        <option value="0">11</option>
                        <option value="0">12</option>
                        <option value="0">13</option>
                        <option value="0">14</option>
                        <option value="0">15</option>
                        <option value="0">16</option>
                        <option value="0">17</option>
                        <option value="0">18</option>
                        <option value="0">19</option>
                        <option value="0">20</option>
                        <option value="0">21</option>
                        <option value="0">22</option>
                        <option value="0">23</option>
                        <option value="0">24</option>
                        <option value="0">25</option>
                        <option value="0">26</option>
                        <option value="0">27</option>
                        <option value="0">28</option>
                        <option value="0">29</option>
                        <option value="0">30</option>
                        <option value="0">31</option>
                   </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="email" name="email">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="email_confirm">E-mail(確認)</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="email_confirm" name="email_confirm">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label" for="gender">性別</label>
            <label class="radio-inline">
                <input type="radio" id="gender" name="gender">男
            </label>
            <label class="radio-inline">
                <input type="radio" id="gender" name="gender">女
            </label>
        </div>

        <div class="form-group">
            <label class="control-label" for="class_id">クラス</label>
            <div class="controls">
                <div>
                    <select name="class_id">
                        <option value="0">1</option><!-- 芦沢ゾーン -->
                        <option value="0">1</option><!-- 芦沢ゾーン -->
                        <option value="0">1</option><!-- 芦沢ゾーン -->
                        <option value="0">2</option><!-- 芦沢ゾーン -->
                        <option value="0">2</option><!-- 芦沢ゾーン -->
                   </select>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">登録</button>
        <button type="reset" class="btn btn-warning">キャンセル</button>

    </form>
</div>
</section>