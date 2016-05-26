<?php 
	defined('C5_EXECUTE') or die("Access Denied.");
?>

<h3>text</h3>
<p><?php echo $text; ?></p>

<h3>content</h3>
<?php echo $content; ?>

<h3>Radio</h3>
<p><?php echo $radio; ?></p>

<h3>Checkbox</h3>
<p><?php echo $checkbox; ?></p>

<h3>Select</h3>
<p><?php echo $selectinput; ?></p>

<h3>Boolean</h3>
<p><?php echo 'boolean is - ', $boolean ? 'true' : 'false'; ?></p>

<h3>File</h3>
<p><?php echo 'url: ', $file->path, '<br>', 'title: ', $file->title; ?></p>

<h3>Image</h3>
<?php echo '<img src="', $image->path, '" alt="', $file->title, '" title="', $file->title, '" >'; ?>

<h3>Link</h3>
<p><a href="<?php echo $link; ?>"<?php if($externalLink) echo 'target="_blank"'; ?>>Link</a></p>

<pre>
	<?php print_r($repeatingData); ?>
</pre>