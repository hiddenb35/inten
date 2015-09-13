<div id="login">
	<h1>ログイン</h1>
	<hr>
	<div>
		<table>
			<form action="/auth/slogin" method="post" value="">
				<tr>
					<th>
						ユーザーID
					</th>
					<td>
						<input type="text" name="username" value="">
					</td>
				</tr>
				<tr>
					<th>
						パスワード
					</th>
					<td>
						<input type="password" name="password" value="">
					</td>
				</tr>
			</form>
		</table>
		<button type="submit">ログイン</button>
	</div>
</div>