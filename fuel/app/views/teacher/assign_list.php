<div id="ASSIGN_LIST">
	<section class="content-header">
		<h1>
			クラス一覧
		</h1>
		<ol class="breadcrumb">
			<li><a href="#">Home > クラス一覧</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<?php foreach($class_lists as $class_list): ?>
				<div class="col-sm-6 col-md-3">
					<div class="box box-info text-center">
						<a href="<?php echo $class_list['link_url']; ?>">
							<div class="box-body">
								<div class="class_name h1"><?php echo $class_list['name']; ?></div>
								<div class="college_name"><?php echo $class_list['college_name']; ?></div>
								<div class="course_name"><?php echo $class_list['course_name']; ?></div>
								<div class="class_people">人数：<?php echo $class_list['student_sum']; ?>名</div>
							</div>
						</a>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>