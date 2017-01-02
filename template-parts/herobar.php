    <header class="intro-header" 
        <?php if(is_home()): ?>
            style="background-image: url('<?php echo get_custom_header()->url ?>');"
        <?php elseif(is_single() || is_page()): ?>
            <?php if(has_post_thumbnail()): ?>
            style="background-image: url('<?php the_post_thumbnail_url('header_banner'); ?>');"
            <?php else: ?>
            style="background-image: url('<?php echo get_custom_header()->url ?>');"
            <?php endif; ?>

        <?php else: ?>
            style="background-image: url('<?php echo get_custom_header()->url ?>');"
        <?php endif; ?>
    >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <?php if(is_home()){
                            echo "<h1>".get_bloginfo('name')."</h1>";
                            echo "<hr class='small'>";
                            echo "<span class='subheading'>".get_bloginfo('description')."</span>";
                        }else if(is_single()){
                            echo "<h1>".get_the_title()."</h1>";
                            echo "<hr class='small'>";
                            cleanblog_posted_on();
                        }else if(is_page()){
                            echo "<h1>".get_the_title()."</h1>";
                            echo "<hr class='small'>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>