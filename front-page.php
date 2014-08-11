<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class=" main-section clearfix">
					<div class="call-to-action cf">
						<div class="container">
							<div class="row">
							<div class="hero-unit grid-6 cf">
								<div class="grid-3 clearfix">
								<img src="http://placehold.it/900x450" alt="">
								</div>
								<div class="grid-3 clearfix">
									<h2>This is a callout</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt optio quasi aperiam vitae suscipit atque provident delectus voluptatum itaque nemo sequi quas reiciendis eveniet quisquam recusandae totam, placeat pariatur exercitationem quis eum quos mollitia blanditiis laboriosam voluptas. Facilis numquam eaque, placeat natus modi ab cupiditate!</p>
									<a href="#" class="right button">Call to Action</a>
								</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="subcontent-box grid-2 clearfix">
							<img src="http://placehold.it/400" class="thumbnail-round" alt="">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto natus, doloremque facere harum qui optio voluptates eaque dolorem nesciunt nisi in maiores, consectetur repudiandae pariatur.</p>
						</div>
						<div class="subcontent-box grid-2 clearfix">
							<img src="http://placehold.it/400" class="thumbnail-round" alt="">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto natus, doloremque facere harum qui optio voluptates eaque dolorem nesciunt nisi in maiores, consectetur repudiandae pariatur.</p>
						</div>
						<div class="subcontent-box grid-2 clearfix">
							<img src="http://placehold.it/400" class="thumbnail-round" alt="">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto natus, doloremque facere harum qui optio voluptates eaque dolorem nesciunt nisi in maiores, consectetur repudiandae pariatur.</p>
						</div>
					</div> -->

						<div id="main" class="grid-4 clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<header class="article-header">

									<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'rdmbasetheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), rdmbase_get_the_author_posts_link(), get_the_category_list(', '));
									?></p>

								</header>

								<section class="entry-content clearfix">
									<?php the_excerpt(); ?>
								</section>

								<footer class="article-footer">
									<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'rdmbasetheme' ) . '</span> ', ', ', '' ); ?></p>

								</footer>

								<?php // comments_template(); // uncomment if you want to use them ?>

							</article>

							<?php endwhile; ?>

									<?php if ( function_exists( 'rdmbase_page_navi' ) ) { ?>
											<?php rdmbase_page_navi(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'rdmbasetheme' )) ?></li>
														<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'rdmbasetheme' )) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'rdmbasetheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'rdmbasetheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'rdmbasetheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

						<?php get_sidebar(); ?>

				</div>
			</div>

<?php get_footer(); ?>
