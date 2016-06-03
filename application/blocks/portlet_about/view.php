<?php
	defined('C5_EXECUTE') or die("Access Denied.");
?>


<div class="portlet__content">
	<h3 class="portlet__title"><?php echo $text; ?></h3>
	<div class="portlet__description">
		<?php echo $content; ?>
	</div>
	<a href="<?php echo $link; ?>"><span><?php echo $linkname; ?></span><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg></a>
</div>
