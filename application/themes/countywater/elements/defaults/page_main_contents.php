<h1><?php echo $class; ?></h1>

<?php if ($class == 'about-us'): ?>
									<div class="portlet portlet-main-content">
										<div class="portlet__container">
											<div class="portlet__content">
												<?php $a = new Area('About Us Content Proper');  $a->display($c); ?>
											</div>
										</div>
									</div>
								<?php elseif ($class == 'account'): ?>
									<div class="portlet portlet-main-content">
										<div class="portlet__container">
											<div class="portlet__content">
												<?php $a = new Area('Account Content Proper');  $a->display($c); ?>
											</div>
										</div>
									</div>
								<?php elseif ($class == 'bill'): ?>
									<div class="portlet portlet-main-content">
										<div class="portlet__container">
											<div class="portlet__content">
												<?php $a = new Area('Bill Content Proper First');  $a->display($c); ?>
											</div>
										</div>
									</div>
									<div class="portlet portlet-main-content">
										<div class="portlet__container">
											<div class="portlet__content">
												<?php $a = new Area('Bill Content Proper Second');  $a->display($c); ?>
											</div>
										</div>
									</div>
									<div class="portlet portlet-main-content">
										<div class="portlet__container">
											<div class="portlet__content">
												<?php $a = new Area('Bill Content Proper Third');  $a->display($c); ?>
											</div>
										</div>
									</div>
								<?php elseif ($class == 'business'): ?>
									<div class="portlet portlet-main-content">
										<div class="portlet__container">
											<div class="portlet__content">
												<?php $a = new Area('Business Content Proper');  $a->display($c); ?>
											</div>
										</div>
									</div>
								<?php elseif ($class == 'faq'): ?>
									<?php $this->inc('elements/faq/faq_portlet_head.php'); ?>
									<?php $this->inc('elements/faq/faq_qa_item.php'); ?>
								<?php endif; ?>		