<header id="header" class="header" style="margin-top: 30px;">
			<div class="header--container">

				<div class="header__btn--call">
					<a href="#">
						<svg>
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#phone-call"></use>
						</svg>
					</a>
				</div>

				<div class="header__brand">
					<?php
	                	$a = new GlobalArea('Header Site Logo');
	                	$a->display();
	                ?>
				</div>

				<div class="header__nav">

					<div class="header__nav--top">
						<?php
			                $a = new GlobalArea('Header Contact Number');
			                $a->display();
			            ?>
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