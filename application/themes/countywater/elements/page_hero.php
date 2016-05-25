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