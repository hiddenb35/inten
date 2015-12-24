<section class="content">
	<ul class="list-group">
		<?php foreach($samples as $title => $uri): ?>
			<li class="list-group-item"><a href="<?php echo Uri::create('sample/' . $uri); ?>"><?php echo $title; ?></a></li>
		<?php endforeach; ?>
	</ul>
</section>