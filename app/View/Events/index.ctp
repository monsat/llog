<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
	<h1>Follow up &quot;Benkyokai&quot; !</h1>
	<p>Contents will be embedded automatically.</p>

	<form class="form-post-event">
		<button type="submit" class="btn btn-default pull-right" style="width: 28%;">Create a new follow up</button>
		<input type="text" placeholder="http://phpmatsuri-2013.peatix.com/" style="width: 70%;">
	</form>
	<p>
		You can post urls of event websites.
	</p>
	<p>
		e.g. <a href="http://www.doorkeeper.jp/">Doorkeeper</a>, <a href="http://atnd.org/">atnd</a>, <a href="http://atnd.org/beta">atndβ</a>, <a href="http://www.zusaar.com/">zussar</a>, <a href="http://connpass.com/">connpass</a>, <a href="http://peatix.com/">peatix</a>, <a href="http://kokucheese.com/">こくちーず</a> and <a href="http://partake.in/">paratake</a>
	</p>
</div>
<div class="events index">
<?php foreach ($events as $event): ?>
	<div>
		<p>
<?php
	$title = empty($event['Event']['title']) ? $event['Event']['url'] : $event['Event']['title'];
	echo $this->Html->link($title, array('action' => 'view', $event['Event']['id']));
?>
		</p>
	</div>
<?php endforeach; ?>
</div>

