<!-- Main content -->
<section id="NEW_RESPONSIBLE_LIST" class="content">
	<div class="container-fluid">
		<div class="row">
			<?php foreach($class_lists as $class_list): ?>
				<div class="col-sm-6 col-md-4">
					<a href="<?php echo $class_list['link_url']; ?>">
						<div class="class-box clearfix relative">
							<div class="pull-left absolute">
								<div class="class_name h3"><?php echo $class_list['name']; ?></div>
								<div class="college_name"><?php echo $class_list['college_name']; ?></div>
								<div class="department_name"><?php echo $class_list['course_name']; ?>(<?php echo $class_list['student_sum']; ?>名)</div>
							</div>
							<img src="/assets/img/box.png" alt="" class="pull-right">
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>