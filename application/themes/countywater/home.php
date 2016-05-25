<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Title</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Useful Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<!-- ================================================== -->

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="<?= $this->getThemePath() ?>/resources/css/main.css" />
	<?= Loader::element("header_required"); ?>

</head>

<body>

<div class="<?=$c->getPageWrapperClass()?>">
	
	<!-- Flyout Nav -->
	<nav id="my-menu" class="js-primary-nav">
		<?php
			$a = new GlobalArea('Header Site Mobile Nav');
			$a->display();
		?>
	</nav>
	<!-- end of Flyout Nav -->

	<div id="my-wrapper" class="page-wrapper">
		
		<!-- Page SVG Sprite -->
		<div class="svg-sprite">
			<?php $this->inc('elements/svg.php'); ?>		
		</div>
		<!-- end of Page SVG Sprite -->

		<!-- Header -->
		<?php $this->inc('elements/page_header.php'); ?>
		<!-- end of Header -->

		<!-- Page Alert -->
		<?php $this->inc('elements/page_alert.php'); ?>
		<!-- End of Page Alert -->

		<!-- Page Hero -->
		<?php $this->inc('elements/page_hero.php'); ?>
		<!-- End of Page Hero -->

		<!-- Home Portlets -->
		<?php $this->inc('elements/home/home_page_portlets.php'); ?>
		<!-- End of Page Hero -->

	</div>

	<div class="bg-pattern"></div>

<!-- footer -->
<?php $this->inc('elements/page_footer.php'); ?>
<!-- end of footer -->
