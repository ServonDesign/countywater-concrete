<?php
	defined('C5_EXECUTE') or die("Access Denied.");
?>



		<div class="portlet__content">
			<h4 class="portlet__title"><?php echo $text; ?>?<br><a href="<?php echo $link ?>" <?php if($externalLink):?>target="_blank"<?php endif;?> class="font-bold-underline"><?php echo $content; ?> </a><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg></h4>
		</div>
