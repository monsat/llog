<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Follow Up Benkyokai</title>

	<!-- Bootstrap core CSS -->
	<link href="/assets/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/css/docs.css" rel="stylesheet">
	<link href="/assets/css/pygments-manni.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="/assets/js/html5shiv.js"></script>
	<script src="/assets/js/respond/respond.min.js"></script>
	<![endif]-->

	<!-- Favicons -->
	<!--
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="/assets/ico/favicon.png">
	-->
	<style>

		body {
			padding: 90px;
		}

		.navbar {
			margin-bottom: 30px;
		}
		.log-child div.embed {
			text-align: center;
		}

	</style>

	<!-- Place anything custom after this. -->
<?php
	//echo $this->Html->meta('icon');

	//echo $this->Html->css('cake.generic');

	//echo $this->fetch('meta');
	//echo $this->fetch('css');
	echo $this->fetch('script');
?>
</head>
<body data-spy="scroll" data-target=".bs-sidebar">

<!-- Docs master nav -->
<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav">
	<div class="container">
		<a href="/" class="navbar-brand">Lightning Logger</a>
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div class="nav-collapse collapse bs-navbar-collapse">
			<ul class="nav navbar-nav pull-right">
				<li><a href="/">Create an event page</a> </li>
			</ul>
			<ul class="nav navbar-nav">
				<li><?php echo $this->fetch('event-title'); ?></li>
			</ul>
		</div>
	</div>
</div>

<div class="container bs-docs-container">
	<div class="row">
		<div class="col-lg-9">

			<div class="container">

				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>

			</div><!-- /container -->
		</div>
		<div class="col-lg-3">
			<div class="bs-sidebar">
				<ul class="nav bs-sidenav">
				</ul>
			</div>
		</div>
	</div>

	<!-- Quick back to top -->
	<a href="#" class="bs-top">
		Back to top
	</a>

</div>

<!-- Main docs footer (social buttons, copyright, etc). -->
<!-- Footer
================================================== -->
<footer class="bs-footer">
	<p>Designed and built with all the love in the world by <a href="http://twitter.com/mdo" target="_blank">@mdo</a> and <a href="http://twitter.com/fat" target="_blank">@fat</a>.</p>
	<p>Code licensed under <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
	<ul class="footer-links">
		<li><a href="http://blog.getbootstrap.com">Blog</a></li>
		<li class="muted">&middot;</li>
		<li><a href="https://github.com/twitter/bootstrap/issues?state=open">Issues</a></li>
		<li class="muted">&middot;</li>
		<li><a href="https://github.com/twitter/bootstrap/blob/master/CHANGELOG.md">Changelog</a></li>
	</ul>
</footer>

<!-- JS and analytics only. -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.js"></script>

<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="/assets/js/holder/holder.js"></script>

<script src="/assets/js/application.js"></script>

<script src="/embedly-jquery/jquery.embedly.min.js"></script>
<style>
	.log-post {
		margin-bottom: 30px;
	}
	.log-child {
		background-color: #dbbda1;
		border: 1px solid rgba(0,0,0,0.1);
		border-radius: 4px;
		color: #34495e;
		margin-bottom: 30px;
		padding: 15px;
	}
</style>
<script>
	$(function(){
		var target = 'a.embed';
		var $target = $(target);
		var $children = $('.log-child');
		var $lastChild = $('.log-child:last');
		// tab
		$('a', '#log-tab-options').click(function (e) {
			e.preventDefault();
			var href = $(this).attr('href').substr(1);
			changeTab(href);
		});
		var changeTab = function(target) {
			if (target != 'favorites' && hash != 'archives') {
				return false;
			}
			$children.each(function(){
				var $this = $(this);
				if (!$this.hasClass('template')) {
					toggleTab(target, $this);
				}
			});
		}
		var toggleTab = function(target, $element) {
			$element.hasClass('log-' + target) ? $element.show() : $element.hide();
		}
		var hash = location.hash.substr(1);
		changeTab(hash);
		// embed
		$.embedly.defaults.method = 'after';
		$.embedly.defaults.query = {
			maxheight: 400,
			maxwidth: $children.width()
		};
		$.embedly.defaults.key = 'b79e59d8a5a248b2893eedc64d2c5a03';
		// embed onLoad
		$target.embedly().bind('displayed', function(e, data){
			var content = '<p>' + data.title + '</p>' + '<p>' + data.description + '</p>'
			$(this).after(content).removeClass('embed').addClass('embeded');
		});
<?php if (!empty($event['Event']['id'])): ?>
		// embed after posting
		$('#form-log-post').submit(function(){
			var $input = $('input[type=text]', this);
			var url = $input.val();
			var $child = $lastChild.clone().removeClass('template').removeClass('hidden').prependTo('div.log-box');
			$('a.embed', $child).text(url).attr('href', url).embedly();
			$input.val('');
			// post
			$.post(
				'/c/add/<?php echo $event['Event']['id']; ?>.json',
				{url: url},
				function (data, dataType) {
					console.log(data);
				}
			);
			return false;
		});
<?php endif; ?>
		// close log-child
		$children.alert().bind('close.bs.alert', function (e) {
			var _data = $(this).find(target).data('embedly');
			console.log(_data);
			return false;
		});
	});
</script>
</body>
</html>
