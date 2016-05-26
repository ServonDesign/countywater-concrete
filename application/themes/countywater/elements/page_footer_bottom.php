<!-- scripts
================================================== -->
<?php if (!$c->isEditMode()){ ?>
<script src="<?= $this->getThemePath() ?>/resources/js/dist/main.min.js"></script>
<?php } ?>

<?= Loader::element("footer_required"); ?>

</body>
</html>
