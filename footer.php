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
                    <div class="footer-social-icons">
                      <?php cleanblog_social(); ?>
                    </div>
                    <?php
                      $txt = "CleanBlog Wordpress theme by <a href='//rayhan.info' target='_blank'>@KingRayhan</a>";
                      $copyright_txt = ( false == get_theme_mod('footer_copyright') ) ? $txt : get_theme_mod('footer_copyright');

                    if(count($copyright_txt)): ?>
                        <p class="copyright text-muted"><?php echo $copyright_txt; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>


<?php wp_footer(); ?>


</body>
</html>
