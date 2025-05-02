<?php
/**
 * Template Name: Legal
 *
 */
get_header(''); ?>

<?php

?>
    <div class="legal">
        <div class="legal__inner">
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>


    </div>

<?php


get_footer();