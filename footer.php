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
                    <?php if(get_theme_mod('show_footer_social_icon')) : ?>
                    <ul class="list-inline text-center">
                        <?php if(strlen(get_theme_mod('social_icon_Facebook'))): ?>
                        <li>
                            <a href="<?php echo get_theme_mod('social_icon_Facebook'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(strlen(get_theme_mod('social_icon_Twitter'))): ?>
                        <li>
                            <a href="<?php echo get_theme_mod('social_icon_Twitter'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(strlen(get_theme_mod('social_icon_GooglePlus'))): ?>
                        <li>
                            <a href="<?php echo get_theme_mod('social_icon_GooglePlus'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(strlen(get_theme_mod('social_icon_YouTube'))): ?>
                        <li>
                            <a href="<?php echo get_theme_mod('social_icon_YouTube'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if(strlen(get_theme_mod('social_icon_Github'))): ?>
                        <li>
                            <a href="<?php echo get_theme_mod('social_icon_Github'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>


                    </ul>
                    <?php endif; // if(get_theme_mod('show_footer_social_icon')) ?>
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
