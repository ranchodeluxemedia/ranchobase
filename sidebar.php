				<div id="sidebar1" class="sidebar grid-2 clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'rdmbasetheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>
