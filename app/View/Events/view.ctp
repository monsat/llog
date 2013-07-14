<?php
	$title = empty($event['Event']['title']) ? $event['Event']['url'] : $event['Event']['title'];
	$this->assign('event-title', $this->Html->link($title, array($event['Event']['id'])));
?>

<?php echo $this->element('tabbar'); ?>
<div class="log-post">
	<form id="form-log-post">
		<button type="submit" class="btn btn-default pull-right" style="width: 18%;">Add Content Url</button>
		<input type="text" placeholder="Enter a content url" style="width: 80%;">
	</form>
</div>
<div class="log-box">
<?php
if (empty($event['Content'])) {
	echo '<p>' . 'ブログ記事・スライド・YouTube/Ustream等のURLを入力してください' . '</p>';
}
?>
<?php foreach ($event['Content'] as $content) : ?>
	<div class="log-child">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<?php echo $this->Html->link($content['url'], $content['url'], array('class' => 'embed')); ?>
	</div>
<?php endforeach; ?>
	<div class="log-child template">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<?php echo $this->Html->link($event['Event']['url'], $event['Event']['url'], array('class' => 'embed')); ?>
	</div>
	<div class="log-child hidden template">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<a href="#" class="embed">.</a>
	</div>
</div>
