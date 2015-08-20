<!-- Content Row -->
<div class="row">
	<?php
		foreach($view['news'] as $news){
			echo '	
				<div class="col-md-4">
					<h2>' . $news['heading'] . '</h2>
					<p>' . substr($news['description'], 0, 100) . '....</p>
					<a class="btn btn-default" href="/news/moreinfo/' . $news['id'] . '">More Info</a>
				</div><!-- /.col-md-4 -->';
		}

	?>
</div><br /><br />
<div class="row">
	<div class="col-md-1">
		<a class="btn btn-primary btn-lg" href="/news/">Page 1</a>
	</div>
	<div class="col-md-1">
		<a class="btn btn-primary btn-lg" href="/news/index/1">Page 2</a>
	</div>
	<div class="col-md-10"></div></div>
</div>
<!-- /.row -->