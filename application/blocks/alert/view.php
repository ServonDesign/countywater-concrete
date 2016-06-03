<?php
	defined('C5_EXECUTE') or die("Access Denied.");
?>


<?php if($radio == 'on'): ?>
<section id="page-alert" class="alert">
	<div class="alert--container">
		<div class="alert__announcement">
			<h4 class="alert__announcement--message"><?php echo $text; ?>: <span><?php echo $alertcontent; ?></span>
		</div>
	</div>
</section>
<?php endif; ?>
