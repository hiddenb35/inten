<!-- Main content -->
<section id="ASSIGN_LIST" class="content">
	<div class="container-fluid">
		<div class="row">
			<?php foreach($lesson_lists as $lesson): ?>
				<div class="col-sm-6 col-md-3">
					<div class="box box-info text-center">
						<a href="<?php echo $lesson['link_url']; ?>">
							<div class="box-body">
								<div class="h4"><b><?php echo $lesson['name']; ?></b></div>
								<div class="h4"><?php echo $lesson['class_name']; ?></div>
								<div class="h6"><?php echo $lesson['course_name']; ?> <?php echo $lesson['student_sum']; ?>名</div>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
