			<footer id="footer" class="footer">
				<div class="footer--container">
					<div class="footer__content">
							<div class="links-toggle">
								<span>Links</span>
								<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-down"></use></svg>
							</div>

							<div class="footer__links">
								<div>
									<?php
					                	$a = new GlobalArea('Footer Links First');
					                	$a->display();
					                ?>
				                </div>
								<div>
									<?php
					                	$a = new GlobalArea('Footer Links Second');
					                	$a->display();
					                ?>
				                </div>
				                <div>
									<?php
					                	$a = new GlobalArea('Footer Links Third');
					                	$a->display();
					                ?>
				                </div>
				                <div>
									<?php
					                	$a = new GlobalArea('Footer Links Fourth');
					                	$a->display();
					                ?>
				                </div>
				                <div>
									<?php
					                	$a = new GlobalArea('Footer Links Fifth');
					                	$a->display();
					                ?>
				                </div>
							</div>

							<div class="footer__copyright">
								<?php
				                	$a = new GlobalArea('Footer Copyright');
				                	$a->display();
				                ?>
				                <a href="#">Website Design &amp; Build by Servon Design</a>
							</div>
					</div>
				</div>
			</footer>


		</div>

	</div>

	<!-- scripts
	================================================== -->
	<?php if (!$c->isEditMode()){ ?>
	<script src="<?= $this->getThemePath() ?>/resources/js/dist/main.min.js"></script>
	<?php } ?>

	<?= Loader::element("footer_required"); ?>

	</body>
	</html>
