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
		<?php $this->inc('elements/header.php'); ?>
		<!-- end of Header -->

		<!-- Page Alert -->
		<section id="page-alert" class="alert">
			<div class="alert--container">
				<div class="alert__announcement">
					<?php
						$a = new GlobalArea('Page Alert');
						$a->display();
					?>
				</div>
			</div>
		</section>
		<!-- End of Page Alert -->

		<section id="page-hero" class="hero">
			<div class="hero--container">
				<div class="hero__content">
					<div class="hero__image">
					  <?php 
						$hero_image = new Area('Hero Image');
						$hero_image->display();
					  ?>
					</div>
					<div class="hero__slider__container">
						<div class="hero-slider">
							<div class="hero__slider__item">
								<?php
									$slider_item1 = new Area('Home Slider Item1');
									$slider_item1->display();
								?>
							</div>
							<div class="hero__slider__item">
								<?php
									$slider_item2 = new Area('Home Slider Item2');
									$slider_item2->display();
								?>
							</div>
							<div class="hero__slider__item">
								<?php
									$slider_item3 = new Area('Home Slider Item3');
									$slider_item3->display();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="page-portlets" class="portlets">
			<div class="portlets--container">
				<div class="portlet-group">

					<?php
						$a = new Area('Home Column 1 Portlet Top');
						$a->display();
					?>

					<?php
						$a = new Area('Home Column 1 Portlet Bottom');
						$a->display();
					?>

				</div>
				<div class="portlet-group">

					<?php
						$a = new Area('Home Column 2 Portlet Top');
						$a->display();
					?>

					<?php
						$a = new Area('Home Column 2 Portlet Bottom');
						$a->display();
					?>
					
				</div>
				<div class="portlet-group">

					<?php
						$a = new Area('Home Column 3 Portlet Top');
						$a->display();
					?>

					<?php
						$a = new Area('Home Column 3 Portlet Bottom');
						$a->display();
					?>

				</div>
			</div>
		</section>

	</div>

	<div class="bg-pattern"></div>

<!-- footer -->
<?php $this->inc('elements/footer.php'); ?>
<!-- end of footer -->
