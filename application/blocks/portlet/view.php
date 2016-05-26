<?php
	defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php
switch ($radio)
{
		case "#D3256F":
				$radio = 'pink';
				break;
		case "#95B402":
				$radio = 'green';
				break;
		case "#00A6CF":
				$radio = 'blue';
				break;
		case "#00609C":
				$radio = 'blue-dark';
				break;
		case "#FFA200":
				$radio = 'orange';
				break;
}
?>

<div class="portlet portlet-home portlet-<?php echo $portlettype; ?> portlet-<?php echo $radio ?>">
	<?php if($link): ?>
		<a href="<?php echo $link; ?>"></a>
	<?php endif; ?>
	<div class="portlet__container">
		<div class="portlet__content">
			<h3 class="portlet__title"><?php echo $text; ?></h3>
			<div class="portlet__description">
				<?php echo $content; ?>

				<?php if($content): ?>
				<svg>
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use>
				</svg>
				<?php endif; ?>
			</div>

		</div>
		<div class="portlet__icon">
			<svg>
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php echo $portleticon; ?>"></use>
			</svg>
		</div>
	</div>
</div>
