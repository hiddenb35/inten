<!-- Main content -->
<section id="ATTACHMENT_LESSON" class="content">
	<div class="box box-warning">
		<div class="box-body">
			<form action="/teacher/attachment_lesson" method="post" role="form">
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="teacher_id">教員</label>
						<select id="teacher_id" name="teacher_id" class="form-control">
							<option value="1">教員太郎</option><!-- 芦沢ゾーン -->
							<option value="2">担任太郎</option><!-- 芦沢ゾーン -->
							<option value="3">AdminAdmin</option><!-- 芦沢ゾーン -->
						</select>
					</div>

					<div class="form-group col-sm-4">
						<label for="lesson_id">授業</label>
						<select id="lesson_id" name="lesson_id" class="form-control">
							<option value="1">資格対策講座</option><!-- 芦沢ゾーン -->
							<option value="2">C言語プログラミング</option><!-- 芦沢ゾーン -->
							<option value="3">経営科学</option><!-- 芦沢ゾーン -->
							<option value="4">Javaプログラミング</option><!-- 芦沢ゾーン -->
							<option value="5">Linux実習</option><!-- 芦沢ゾーン -->
						</select>
					</div>

					<div class="col-sm-4 form-button">
						<button type="submit" class="btn btn-primary">登録</button>
						<button type="reset" class="btn btn-warning">キャンセル</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</section>