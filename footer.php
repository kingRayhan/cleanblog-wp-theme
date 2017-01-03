<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CleanBlog
 */

?>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php
                        if(get_theme_mod('show_footer_social_icon')) {
                            cleanblog_social();
                        } 
                    ?>

                    <?php if(get_theme_mod('show_copyright_text')): ?>
                        <p class="copyright text-muted"><?php echo get_theme_mod('footer_copyright'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>


<?php wp_footer(); ?>


</body>
</html>
