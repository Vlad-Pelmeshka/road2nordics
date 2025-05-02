<?php
/**
 * Template Name: Ebook
 *
 */
get_header('ebook'); ?>

<?php

?>

<?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; ?>
<?php


get_footer();
