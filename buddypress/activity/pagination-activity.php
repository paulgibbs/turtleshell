<?php /* Show pagination if JS is not enabled, since the "Load More" link will do nothing */ ?>
	<noscript>
		<div class="bp-pagination">
			<div class="bp-pagination-count"><?php bp_activity_pagination_count(); ?></div>
			<div class="bp-pagination-links"><?php bp_activity_pagination_links(); ?></div>
		</div>
	</noscript>
