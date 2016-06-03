<?php
	defined('C5_EXECUTE') or die("Access Denied.");
?>


<div class="portlet portlet-account portlet-green">
	<div class="portlet__container">
		<div class="portlet__content">
			<h3 class="portlet__title"><a href="<?php echo $registerlink ?>"><?php echo $text; ?> <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg></a></h3>
		</div>
		<div class="portlet__icon">
			<svg>
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#add"></use>
			</svg>
		</div>
	</div>
	<hr>
	<div class="portlet__container">
		<div class="portlet__content">
			<h4 class="portlet__title"><?php echo $content; ?><br><a href="<?php echo $linkto; ?>" class="font-bold-underline"><?php echo $linkname; ?> </a><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg></h4>
		</div>
		<div class="portlet__icon">
			<svg>
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#users-circle"></use>
			</svg>
		</div>
	</div>
</div>

