<!-- Main content -->
<section id="RESPONSIBLE_LIST" class="content">
	<div class="container-fluid">
		<div class="row">
			<?php foreach($lesson_lists as $lesson): ?>
				<div class="col-sm-6 col-md-4">
					<div class="box">
						<a href=<?php echo $lesson['link_url']; ?>>
							<div class="box-body clearfix relative">
								<div class="pull-left absolute">
									<div class="lesson_name h3"><?php echo $lesson['name']; ?></div>
									<div class="class_name h4"><?php echo $lesson['class_name']; ?></div>
								</div>
								<img src="/assets/img/box.png" alt="" class="pull-right">
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>