<?php
	defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if(count($repeatingData) > 0): ?>
	<?php foreach ($repeatingData as $dt): ?>

			<?php
				switch($dt["linkType"]) {
					case 0:
						$linktype = 0;
						break;
					case 1:
						$linktype = 1;
						break;
					case 2:
						$linktype = 2;
						break;
				}
			?>

			<?php if($linktype == 0): ?>
				<a href="<?php echo $link.$dt['internalPageID']; ?>">
						<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg>
						<?php echo $dt["text"]; ?>
				</a>
			<?php elseif($linktype == 1): ?>
				<a href="<?php echo $dt['internalPageUrl']; ?>" class="internal">
						<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg>
						<?php echo $dt["text"]; ?>
				</a>
			<?php else: ?>
				<a href="<?php echo $dt['externalPageUrl']; ?>" target="_blank" class="external">
						<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use></svg>
						<?php echo $dt["text"]; ?>
				</a>
			<?php endif; ?>

	<?php endforeach; ?>
<?php endif; ?>
