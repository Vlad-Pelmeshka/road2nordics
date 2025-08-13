<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

get_header();

$search = (!empty($_GET['s'])) ? $_GET['s'] : '';
$cat_s  = (!empty($_GET['cat'])) ? $_GET['cat'] : '';

$cta  = get_field('cta', 'options');
$blog_info    = get_field('blog_info', 'options');
// $bottom_block = $blog_info['bottom_block'];
$not_find     = $blog_info['not_find'];

$text_all_tags =  $blog_info['text_all_text'] ?: 'All';

$cat_info = '';
if(!empty($cat_s)){
    $cat_info = get_the_category_by_ID($cat_s);
}

$block_title =  $blog_info['text_list'] ?: "Resources";

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

if(is_paged()){
    $block_title .= " #$paged";
}

global $wp_query;
$total_pages = $wp_query->max_num_pages;
$all_tags = get_all_tags_list();
$first_post_id = get_first_blog_item();

$total_posts = wp_count_posts()->publish;

?>
<section class="blog">
    <div class="container">

        <!-- List -->
        <div class="blog-block">


            <?php if(empty($_GET['tag']) && $first_post_id): ?>
                <div class="blog-first-block">
                    <?php
                        $post = get_post($first_post_id);
                        get_template_part( 'template-parts/post' );
                        wp_reset_postdata();
                    ?>
                </div>
            <?php endif; ?>

            <div class="blog-h1">
                <h1><?php echo $block_title; ?></h1>
            </div>

            <!-- Filter -->

            <?php /*
            <div class="blog-filter">
                <div class="blog-filter-categories">
                    <div class="blog-filter-categories-list">
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"
                            class="blog-filter-categories-link<?php echo (empty($_GET['tag'])) ? ' active' : ''; ?>">

                            <?php echo $text_all_tags . " ($total_posts)"; ?>
                        </a>
                        <?php foreach ($all_tags as $tag):
                            $query_args = ['tag' => $tag['slug']];

                            $tag_url = add_query_arg($query_args, get_permalink(get_option('page_for_posts')));
                            $is_active = (isset($_GET['tag']) && $_GET['tag'] == $tag['slug']);?>
                            <a href="<?php echo esc_url($tag_url); ?>"
                            class="blog-filter-categories-link<?php echo $is_active ? ' active' : ''; ?>">

                                <?php echo $tag['name'] . " (" . $tag['count'] . ")"; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div> 
            </div>

            */ ?>

            <?php if( have_posts() ): ?>

                <div class="blog-list">
                    <?php while ( have_posts() ) :

                        the_post();
                        get_template_part( 'template-parts/post' );

                    endwhile; ?>
                </div>

            <?php else: ?>
                <div class="blog-list-empty">
                    <div class="blog-list-empty-container">
                        <div class="blog-list-empty-title"><?php echo $not_find['title']; ?></div>
                        <div class="blog-list-empty-description"><?php echo $not_find['description']; ?></div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($total_pages > 1): ?>
                <div class="custom-pagination">
                    <a class="prev <?php echo $paged == 1 ? 'disabled' : '" href="/blog/page/' . ($paged - 1); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 20.9706L3.51472 12.4853L12 3.99999" stroke="#1F283C" stroke-width="1.5" stroke-linejoin="round"/>
                            <path d="M3.51472 12.4853L20.4853 12.4853" stroke="#1F283C" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>
                    </a>

                    <div class="custom-pagination-desktop">

                        <?php echo paginate_links([
                            'mid_size'  => 2,
                            'prev_next' => false,
                            'type'      => 'list',
                        ]); ?>
                    </div>

                    <div class="custom-pagination-mobile">

                        <?php echo paginate_links([
                            'mid_size'  => 1,
                            'prev_next' => false,
                            'type'      => 'list',
                        ]); ?>
                    </div>

                    <a class="next <?php echo $paged == $total_pages ? 'disabled' : '" href="/blog/page/' . ($paged + 1); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4L20.4853 12.4853L12 20.9706" stroke="#1F283C" stroke-width="1.5" stroke-linejoin="round"/>
                            <path d="M20.4853 12.4853H3.51472" stroke="#1F283C" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>


                    </a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php /* if(!empty($cta) && is_array($cta)) {
	get_template_part( 'inc/blocks/parts/cta', null, $cta );
}
*/
get_footer();