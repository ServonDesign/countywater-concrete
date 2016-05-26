<?php $this->inc('elements/faq/faq_portlet_head.php'); ?>
<?php $this->inc('elements/faq/faq_qa_item.php'); ?>


<div class="portlet portlet-faq portlet-main-content">
	<div class="portlet__container">
		<div class="portlet__content">
			<!-- FAQ Question -->
			<?php
				$a = new Area('FAQ Item Question Test');
				$a->display();
			?>
			<!-- FAQ Answer -->
			<div class="portlet__answer">
				<?php
					$a = new Area('FAQ Item Answer Test');
					$a->display();
				?>
			</div>
		</div>
		<div class="portlet__icon">
			<svg>
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrows-bold-right"></use>
			</svg>
		</div>
	</div>
</div>
