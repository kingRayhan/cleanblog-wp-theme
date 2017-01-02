<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CleanBlog
 */

get_header(); ?>


    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		<?php
		if ( have_posts() ) :


			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
			?>
                <div class="post-preview">
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="post-title">
                            <?php the_title(); ?>
                        </h2>
                    </a>
                    <p class="post-meta"><?php cleanblog_posted_on(); ?></p>
                    <p><?php the_excerpt(); ?></p>
                </div>
                <hr>
			<?php

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

            </div>
        </div>
    </div>

    <hr>

<?php get_footer(); ?>