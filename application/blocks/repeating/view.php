<?php
	defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if(count($repeatingData) > 0): ?>
	<?php foreach ($repeatingData as $dt): ?>

		<div class="portlet portlet-faq portlet-main-content">
			<div class="portlet__container">
				<div class="portlet__content">
					<h3 class="portlet__title"><?php echo $dt["text"]; ?></h3>
					<div class="portlet__answer">
						<?php echo $dt["content"]; ?>
					</div>
				</div>
				<div class="portlet__icon">
					<svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use>
					</svg>
				</div>
			</div>
		</div>

	<?php endforeach; ?>
<?php endif; ?>
