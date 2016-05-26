<?php
	defined('C5_EXECUTE') or die("Access Denied.");
?>

<!-- <h3>text</h3> -->
<?php echo $text; ?>

<?php echo $content; ?>


<?php //echo $radio; ?>


<?php //echo $checkbox; ?>


<?php //echo $selectinput; ?>


<?php //echo 'boolean is - ', $boolean ? 'true' : 'false'; ?>


<?php //echo 'url: ', $file->path, '<br>', 'title: ', $file->title; ?>


<?php //echo '<img src="', $image->path, '" alt="', $file->title, '" title="', $file->title, '" >'; ?>

<?php if ($link): ?>
	<?php echo $link; ?>
<a href="<?php echo $link; ?>"<?php if($externalLink) echo 'target="_blank"'; ?>>Link</a>
<?php endif; ?>
