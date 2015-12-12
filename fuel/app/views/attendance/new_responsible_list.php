<!-- Main content -->
<section id="NEW_RESPONSIBLE_LIST" class="content">
	<div class="container-fluid">
		<div class="row">
			<?php foreach($class_lists as $class_list): ?>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="box text-center">
						<a href="<?php echo $class_list['link_url']; ?>">
						<div class="box-body">
							<div class="class_name h2"><?php echo $class_list['name']; ?></div>
							<div class="college_name"><?php echo $class_list['college_name']; ?></div>
							<div class="department_name"><?php echo $class_list['course_name']; ?></div>
							<div class="class_member">人数：<?php echo $class_list['student_sum']; ?>名</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>