<header id="header" class="header">
			<div class="header--container">

				<div class="header__btn--call">
					<?php
	                	$a = new GlobalArea('Header Site Call Button');
	                	$a->display();
	                ?>
				</div>

				<div class="header__brand">
					<?php
	                	$a = new GlobalArea('Header Site Logo');
	                	$a->display();
	                ?>
				</div>

				<div class="header__nav">

					<div class="header__nav--top">
						<h3 class="contact--nav">
							<?php
						      	$a = new GlobalArea('Header Contact Number');
						      	$a->display();
						    ?>
					    </h3>
					</div>

					<div class="header__nav--main">

						<?php
		                $a = new GlobalArea('Header Site Nav');
		                $a->display();
		                ?>

						<div class="header__nav--menu">
							<a href="#">
								<svg>
									<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-bold"></use>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</header>
