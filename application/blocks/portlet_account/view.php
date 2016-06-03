<?php
	defined('C5_EXECUTE') or die("Access Denied.");
?>


<div class="portlet__content">
	<h3 class="portlet__title"><?php echo $text; ?></h3>
	<div class="portlet__description">
		<?php echo $content; ?>

		<?php
			if($linkname == '') : ?>
			
				<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg>
			
		<?php endif; ?>

	</div>
	<?php if($linkname != ''): ?>
		<a href="<?php echo $linkto; ?>"><span><?php echo $linkname; ?></span><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg></a>
	<?php endif; ?>
</div>