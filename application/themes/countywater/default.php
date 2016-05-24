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

	<nav id="my-menu" class="js-primary-nav">
		<?php
        	$a = new GlobalArea('Header Site Mobile Nav');
        	$a->display();
        ?>
	</nav>

	<div id="my-wrapper" class="page-wrapper">

		<div class="svg-sprite">
			<?php $this->inc('elements/svg.php'); ?>		
		</div>

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

		<section id="main-content" class="main-section">
				<div class="main--container">

					<div class="page-sidebar">
						<?php $a = new Area('Sidebar');  //$a->display($c); ?>

						<div class="portlet portlet-account portlet-main portlet-blue-green">
							<div class="portlet__container">
								<div class="portlet__content">
									<h3 class="portlet__title">
										<?php $a = new Area('Sidebar Title');  $a->display($c); ?>
									</h3>

									<?php $a = new Area('Sidebar Nav');  $a->display($c); ?>
									
								</div>
							</div>
						</div>
						
						<!-- Report Link -->
						<?php $a = new Area('Sidebar Report');  $a->display($c); ?>

						<!-- Ask Link -->
						<?php $a = new Area('Sidebar Ask');  $a->display($c); ?>

						<!-- Moving Link -->
						<?php $a = new Area('Sidebar Moving');  $a->display($c); ?>


					</div>
					
					<div class="page-content">

						<div class="content__image">
							<div class="ratio--16-9">
								<?php $a = new GlobalArea('Content Hero');  $a->display($c); ?>
							</div>
						</div>

						<div class="content__body">
							<div class="main__content">
								<div class="portlet portlet-main-content">
									<div class="portlet__container">
										<div class="portlet__content">

											<?php $a = new Area('Content Proper');  $a->display($c); ?>

										</div>
									</div>
								</div>
							</div>
							<div class="main__subcontent">
								<div class="portlet portlet-blue-green">
									<div class="portlet__container">
										<div class="portlet__content">

											<?php $a = new Area('Sub Content Column 1');  $a->display($c); ?>

										</div>
										<div class="portlet__icon">
											<svg>
												<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#drop"></use>
											</svg>
										</div>
									</div>
								</div>
								<div class="portlet portlet-blue">
									<div class="portlet__container">
										<div class="portlet__content">

											<?php $a = new Area('Sub Content Column 2');  $a->display($c); ?>

										</div>
										<div class="portlet__icon">
											<svg>
												<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#drop"></use>
											</svg>
										</div>
									</div>
								</div>
								<div class="portlet portlet-blue-dim">
									<div class="portlet__container">
										<div class="portlet__content">

											<?php $a = new Area('Sub Content Column 3');  $a->display($c); ?>

										</div>
										<div class="portlet__icon">
											<svg>
												<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#drop"></use>
											</svg>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>

	 	

		<div class="bg-pattern"></div>

<!-- footer -->
<?php $this->inc('elements/footer.php'); ?>
<!-- end of footer -->


