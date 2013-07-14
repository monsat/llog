<?php
	$this->assign('event-title', $this->Html->link($event['Event']['title'], array($event['Event']['id'])));
?>

<!-- Static navbar -->
<div class="navbar">
	<div class="container">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Logs</a>
		<div class="nav-collapse collapse" id="log-tab-wrapper">
			<ul class="nav navbar-nav" id="log-tab-options">
				<li class="active"><a href="#all">All</a></li>
				<li><a href="#favorites">Favorites</a></li>
				<li><a href="#archives">Archives</a></li>
			</ul>
			<ul class="nav navbar-nav pull-right" id="log-tab-sortby">
				<li><a href="javascript:void(0)">Sort by</a></li>
				<li class="active"><a href="#">Default</a></li>
				<li><a href="#">Score</a></li>
				<li><a href="#">Posted time</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>
<div class="log-post">
	<form id="form-log-post">
		<button type="submit" class="btn btn-default pull-right" style="width: 18%;">Add Content Url</button>
		<input type="text" placeholder="Enter a content url" style="width: 80%;">
	</form>
</div>
<div class="log-box">
	<div class="log-child">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<a href="http://www.youtube.com/embed/aKGf31dAd0s" class="embed">http://www.youtube.com/embed/aKGf31dAd0s</a>
	</div>
	<div class="log-child log-archives">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<a href="http://blog.coworking.tokyo.jp/" class="embed">http://blog.coworking.tokyo.jp/</a>
	</div>
	<div class="log-child hidden template">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<a href="#" class="embed">.</a>
	</div>
</div>
