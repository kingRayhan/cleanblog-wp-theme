<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package CleanBlog
 */

if ( ! function_exists( 'cleanblog_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function cleanblog_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'cleanblog' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'cleanblog' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'cleanblog_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function cleanblog_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'cleanblog' ) );
		if ( $categories_list && cleanblog_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'cleanblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'cleanblog' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'cleanblog' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'cleanblog' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'cleanblog' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function cleanblog_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'cleanblog_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'cleanblog_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so cleanblog_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so cleanblog_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in cleanblog_categorized_blog.
 */
function cleanblog_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'cleanblog_categories' );
}
add_action( 'edit_category', 'cleanblog_category_transient_flusher' );
add_action( 'save_post',     'cleanblog_category_transient_flusher' );




if ( ! function_exists( 'cleanblog_social' ) ) :
/**
 * Adds the social profile links into the theme's footer.php file
 */
function cleanblog_social() { ?>

	<ul class="list-inline text-center">
		<?php if ( get_theme_mod( 'cleanblog_social_twitter' ) !='' ) { ?>
		<li id="social-twitter">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_twitter' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
		<?php if ( get_theme_mod( 'cleanblog_social_facebook' ) !='' ) { ?>
		<li id="social-facebook">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_facebook' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
		<?php if ( get_theme_mod( 'cleanblog_social_google' ) !='' ) { ?>
		<li id="social-google">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_google' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-google fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
		<?php if ( get_theme_mod( 'cleanblog_social_pinterest' ) !='' ) { ?>
		<li id="social-pinterest">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_pinterest' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
		<?php if ( get_theme_mod( 'cleanblog_social_linkedin' ) !='' ) { ?>
		<li id="social-linkedin">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_linkedin' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
		<?php if ( get_theme_mod( 'cleanblog_social_github' ) !='' ) { ?>
		<li id="social-github">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_github' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-github fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
		<?php if ( get_theme_mod( 'cleanblog_social_instagram' ) !='' ) { ?>
		<li id="social-instagram">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_instagram' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
		<?php if ( get_theme_mod( 'cleanblog_social_medium' ) !='' ) { ?>
		<li id="social-medium">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_medium' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-medium fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
		<?php if ( get_theme_mod( 'cleanblog_social_vine' ) !='' ) { ?>
		<li id="social-vine">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_vine' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-vine fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
		<?php if ( get_theme_mod( 'cleanblog_social_tumblr' ) !='' ) { ?>
		<li id="social-tumblr">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_tumblr' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-tumblr fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
		<?php if ( get_theme_mod( 'cleanblog_social_youtube' ) !='' ) { ?>
		<li id="social-youtube">
			<a href="<?php echo get_theme_mod( 'cleanblog_social_youtube' ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</li>
		<?php } ?>
	</ul>
<?php }
endif;
