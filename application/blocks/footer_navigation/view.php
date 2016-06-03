<?php
	defined('C5_EXECUTE') or die("Access Denied.");
?>
<ul>
<?php if(count($repeatingData) > 0): ?>
	<?php foreach ($repeatingData as $dt): ?>

		<?php

			$page = Page::getByID($dt['internalPageID']);

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

		<li>

			<?php if($linktype == 0): ?>
				<a href="<?php echo URL::to($page); ?>">
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

		</li>



	<?php endforeach; ?>
<?php endif; ?>
</ul>

<pre>
	<?php //print_r($repeatingData); ?>
</pre>
