<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CleanBlog
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
