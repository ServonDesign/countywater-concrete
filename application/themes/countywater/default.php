<!-- page head -->
<?php
	$this->inc('elements/page_head.php');
	$th = Loader::helper('text');
	$class = $th->sanitizeFileSystem($c->getCollectionName(), $leaveSlashes=false);
?>
<!-- end of page head -->


<body class="<?= $class; ?>">

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
		<?php $this->inc('elements/page_header.php'); ?>
		<!-- end of Header -->

		<!-- Page Alert -->
		<?php $this->inc('elements/page_alert.php'); ?>
		<!-- End of Page Alert -->

		<section id="main-content" class="main-section">
				<div class="main--container">

					<!-- Page Sidebar -->
					<div class="page-sidebar">
						<?php if ($class != 'business'): ?>
						<div class="portlet portlet-account portlet-main portlet-blue-green">
							<div class="portlet__container">
								<div class="portlet__content">
									<h3 class="portlet__title">
										<?php $a = new GlobalArea('Sidebar Title');  $a->display($c); ?>
									</h3>

									<?php
										if ($class == 'faq')
										{
											$a = new GlobalArea('Sidebar FAQ Nav');  $a->display($c);
										}
										else
										{
											$a = new GlobalArea('Sidebar Nav');  $a->display($c);
										}
									?>
								</div>
							</div>
						</div>
						<?php else: ?>
						<div class="portlet portlet-account portlet-main portlet-blue-dark">
							<div class="portlet__container">

								<div class="portlet__content">
									<h3 class="portlet__title">
										<?php $a = new GlobalArea('Sidebar Business Title');  $a->display($c); ?>
									</h3>

									<?php $a = new GlobalArea('Sidebar Business Nav');  $a->display($c); ?>
								</div>

							</div>
						</div>
						<?php endif; ?>

						<!-- Report Link -->
						<?php $a = new GlobalArea('Sidebar Report');  $a->display($c); ?>

						<!-- Ask Link -->
						<?php $a = new GlobalArea('Sidebar Ask');  $a->display($c); ?>

						<!-- Moving Link -->
						<?php
							if ($class != 'business')
							{
								$a = new GlobalArea('Sidebar Moving');  $a->display($c);
							}
						?>

					</div>
					<!-- End of Page SideBar -->

					<div class="page-content">
						<div class="content__image">
							<div class="ratio--16-9">
								<?php $a = new GlobalArea('Content Hero');  $a->display($c); ?>
							</div>
						</div>
						<div class="content__body">
							<div class="main__content">
								<?php
								if ($class == 'bill') { $this->inc('elements/bill/bill_page_portlets.php'); }
								?>

								<!-- main content -->
								<?php
									switch ($class)
									{
									    case "about-us":
									        $this->inc('elements/about/about_maincontent.php');
									        break;
									    case "account":
									        $this->inc('elements/account/account_maincontent.php');
									        break;
									    case "bill":
									        $this->inc('elements/bill/bill_maincontent.php');
									        break;
									    case "business":
									        $this->inc('elements/business/business_maincontent.php');
									        break;
									    case "faq":
									        $this->inc('elements/faq/faq_maincontent.php');
									        break;
									}
								?>
								<!-- end main content -->
							</div>
							<div class="main__subcontent">
								<?php
									switch ($class)
									{
									    case "about-us":
									        $this->inc('elements/about/about_subcontent.php');
									        break;
									    case "account":
									        $this->inc('elements/account/account_subcontent.php');
									        break;
									}
								?>
							</div>
						</div>
					</div>
				</div>
		</section>



		<div class="bg-pattern"></div>

<!-- page footer -->
<?php $this->inc('elements/page_footer.php'); ?>
<!-- end of page footer -->
