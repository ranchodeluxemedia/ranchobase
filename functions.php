<?php
/*
Author: Chris Canterbury
URL: htp://themble.com/rdmbase/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. assets/rdmbase.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'assets/init.php' ); // if you remove this, rdmbase will break
/*
2. assets/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
//require_once( 'assets/custom-post-type.php' ); // you can disable this if you like
/*
3. assets/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
/****************** ACF OPTIONS *******************/
function my_acf_options_page_settings( $settings )
{
	$settings['title'] = 'Site Settings';
	$settings['pages'] = array('Company Info', 'Policies', 'Social Links');

	return $settings;
}

add_filter('acf/options_page/settings', 'my_acf_options_page_settings');


require_once( 'assets/admin.php' ); // this comes turned off by default
/*
4. assets/translation/translation.php
	- adding support for other languages
*/
// require_once( 'assets/translation/translation.php' ); // this comes turned off by default

include_once('includes/CPT.php');

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'rdmbase-thumb-600', 600, 150, true );
add_image_size( 'rdmbase-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'rdmbase-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'rdmbase-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'rdmbase_custom_image_sizes' );

function rdmbase_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'rdmbase-thumb-600' => __('600px by 150px'),
        'rdmbase-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function rdmbase_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'rdmbasetheme' ),
		'description' => __( 'The first (primary) sidebar.', 'rdmbasetheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'rdmbasetheme' ),
		'description' => __( 'The second sidebar.', 'rdmbasetheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'id' => 'sidebar3',
		'name' => __( 'Sidebar 3', 'rdmbasetheme' ),
		'description' => __( 'The third sidebar.', 'rdmbasetheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'id' => 'footer-widgets',
		'name' => __( 'Footer Widgets', 'rdmbasetheme' ),
		'description' => __( 'The third sidebar.', 'rdmbasetheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s grid-2">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'rdmbasetheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'rdmbasetheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function rdmbase_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/assets/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'rdmbasetheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'rdmbasetheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'rdmbasetheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'rdmbasetheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function rdmbase_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'rdmbasetheme' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'rdmbasetheme' ) . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
} // don't remove this bracket!


// Enqueue Typekit
function theme_typekit() {
	    wp_enqueue_script( 'theme_typekit', '//use.typekit.net/urj0rle.js');
	    }
	    add_action( 'wp_enqueue_scripts', 'theme_typekit' );
function theme_typekit_inline() {
	  if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
	    	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	    	<?php }
	    	}
	    	add_action( 'wp_head', 'theme_typekit_inline' );


// Hide admin bar from frontend
add_filter('show_admin_bar', '__return_false');


//////////////////////// CUSTOM POST TYPES ///////////////////////////////

$races = new CPT('race', array(
	'supports' => array('title', 'thumbnail')
));
$races->menu_icon("dashicons-location-alt");


?>