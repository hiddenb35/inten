<div id="RESPONSIBLE_LIST">
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
				<?php foreach($lesson_lists as $lesson): ?>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="box text-center">
							<a href=<?php echo $lesson['link_url']; ?>>
								<div class="box-body">
									<div class="lesson_name"><?php echo $lesson['name']; ?></div>
									<div class="class_name h2"><?php echo $lesson['class_name']; ?></div>
								</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
