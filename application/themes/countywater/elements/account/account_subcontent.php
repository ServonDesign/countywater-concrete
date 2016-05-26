<div class="portlet portlet-blue-green">
	<div class="portlet__container">
		<div class="portlet__content">
			<?php
				$a = new Area('Account Manage Portlet');  $a->display($c);
			?>
		</div>
	</div>
</div>

<div class="portlet portlet-blue">
	<div class="portlet__container">
		<div class="portlet__content">
			<?php
				$a = new Area('Account Paying Bill Portlet');  $a->display($c);
			?>
		</div>
		<div class="portlet__icon">
			<svg>
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shopping-credit-card"></use>
			</svg>
		</div>
	</div>
</div>

		<div class="portlet portlet-account portlet-green">
			<div class="portlet__container">
				<div class="portlet__content">
					<h3 class="portlet__title"><a href="">Register for an online account <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg></a></h3>
				</div>
				<div class="portlet__icon">
					<svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#add"></use>
					</svg>
				</div>
			</div>
			<hr />
			<div class="portlet__container">
				<div class="portlet__content">
					<h4 class="portlet__title">Already signed up?<br /><a href="" class="font-bold-underline">Log in here </a><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg></h4>
				</div>
				<div class="portlet__icon">
					<svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#users-circle"></use>
					</svg>
				</div>
			</div>
		</div>
