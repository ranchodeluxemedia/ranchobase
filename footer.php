			<footer class="footer" role="contentinfo">

			<div id="inner-footer" class="wrap clearfix">

			<div class="row clearfix">
				<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>

						<?php dynamic_sidebar( 'footer-widgets' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'rdmbasetheme' );  ?></p>
						</div>

					<?php endif; ?>
			</div>

					<div class="row">
						<div class="grid-3 clearfix">
							<?php rdmbase_footer_links(); ?>
						</div>
						<div class="grid-2 clearfix"></div>
						<div class="grid-1 clearfix">
							<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
						</div>
					</div>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in assets/rdmbase.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
