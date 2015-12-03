<div id="NEW_RESPONSIBLE_LIST">
	<section class="content-header">
		<h1>
			担当するクラスの授業一覧
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
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
</div>