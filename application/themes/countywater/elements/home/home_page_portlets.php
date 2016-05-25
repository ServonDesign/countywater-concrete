<section id="page-portlets" class="portlets">
			<div class="portlets--container">
				<div class="portlet-group">

					<?php
						$a = new Area('Home Column 1 Portlet Top');
						$a->display();
					?>

					<?php
						$a = new Area('Home Column 1 Portlet Bottom');
						$a->display();
					?>

				</div>
				<div class="portlet-group">

					<?php
						$a = new Area('Home Column 2 Portlet Top');
						$a->display();
					?>

					<?php
						$a = new Area('Home Column 2 Portlet Bottom');
						$a->display();
					?>
					
				</div>
				<div class="portlet-group">

					<?php
						$a = new Area('Home Column 3 Portlet Top');
						$a->display();
					?>

					<?php
						$a = new Area('Home Column 3 Portlet Bottom');
						$a->display();
					?>

				</div>
			</div>
		</section>