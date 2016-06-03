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

<!-- Authentication Portlet -->
<div class="portlet portlet-account portlet-green">
	<div class="portlet__container">

			<?php
				$a = new Area('Account Register');  $a->display($c);
			?>

		<div class="portlet__icon">
			<svg>
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#add"></use>
			</svg>
		</div>
	</div>
	<hr>
	<div class="portlet__container">

			<?php
				$a = new Area('Account Login');  $a->display($c);
			?>

		<div class="portlet__icon">
			<svg>
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#users-circle"></use>
			</svg>
		</div>
	</div>
</div>
