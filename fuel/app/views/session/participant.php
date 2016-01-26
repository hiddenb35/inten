<!-- Main content -->
<section id="PARTICIPANT" class="content">
	<div class="box box-main">
		<div class="box-body">
			<div>
				<span class="h4 pull-left"><?php echo $session['company_name']; ?></span>
				<span class="h4 pull-right">期限: <?php echo date('Y/m/d H:i', $session['entry_end']); ?></span>
			</div>
			<table class="table table-base" id="college_list_table">
				<thead>
				<tr>
					<th>学籍番号</th>
					<th>名前</th>
					<th class="hidden-xs">フリガナ</th>
					<th>申込日</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach($participant_lists as $participant): ?>
					<tr>
						<td><?php echo $participant['number']; ?></td>
						<td><?php echo $participant['full_name']; ?></td>
						<td class="hidden-xs"><?php echo $participant['full_name_kana']; ?></td>
						<td class="text-center">
							<?php echo date('Y/m/d', $participant['entry_at']); ?>
							<span class="visible-xs-block visible-sm-inline visible-md-inline visible-lg-inline"><?php echo date('H:i',
									$participant['entry_at']); ?></span>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.box-body -->
	</div>
</section>