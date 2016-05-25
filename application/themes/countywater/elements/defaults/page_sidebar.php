<div class="page-sidebar">
						
	<?php if ($class != 'business'): ?>
	<div class="portlet portlet-account portlet-main portlet-blue-green">
		<div class="portlet__container">
			<div class="portlet__content">
				<h3 class="portlet__title">
					<?php $a = new GlobalArea('Sidebar Title');  $a->display($c); ?>
				</h3>
					
				<?php 
					if ($class == 'faq')
					{
						$a = new GlobalArea('Sidebar FAQ Nav');  $a->display($c);
					}
					else
					{
						$a = new GlobalArea('Sidebar Nav');  $a->display($c);
					}
				?>	
			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="portlet portlet-account portlet-main portlet-blue-dark">
		<div class="portlet__container">

			<div class="portlet__content">
				<h3 class="portlet__title">
					<?php $a = new GlobalArea('Sidebar Business Title');  $a->display($c); ?>
				</h3>

				<?php $a = new GlobalArea('Sidebar Business Nav');  $a->display($c); ?>	
			</div>

		</div>
	</div>
	<?php endif; ?>
	
	<!-- Report Link -->
	<?php $a = new GlobalArea('Sidebar Report');  $a->display($c); ?>

	<!-- Ask Link -->
	<?php $a = new GlobalArea('Sidebar Ask');  $a->display($c); ?>

	<!-- Moving Link -->
	<?php
		if ($class != 'business')
		{ 
			$a = new GlobalArea('Sidebar Moving');  $a->display($c); 
		}
	?>

</div>