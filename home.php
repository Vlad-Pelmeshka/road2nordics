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

$block_title =  $blog_info['resources'] ?: "Resources";

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

if(is_paged()){
    $block_title .= " #$paged";
}


global $wp_query;
$total_pages = $wp_query->max_num_pages;
$all_tags = get_all_tags_list();


?>
<div class="blog-top">
    <div class="blog-top-header">
        <h1><?php echo $block_title; ?></h1>
    </div>
</div>

<section class="blog">
    <div class="container">

        <!-- List -->
        <div class="blog-block">

            <!-- Filter -->
            <div class="blog-filter">
                <div class="blog-filter-categories">
                    <div class="blog-filter-categories-list">
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"
                            class="blog-filter-categories-link<?php echo (empty($_GET['tag'])) ? ' active' : ''; ?>">

                            <?php echo $text_all_tags; ?>
                        </a>
                        <?php foreach ($all_tags as $tag):
                            $query_args = ['tag' => $tag['slug']];

                            $tag_url = add_query_arg($query_args, get_permalink(get_option('page_for_posts')));
                            $is_active = (isset($_GET['tag']) && $_GET['tag'] == $tag['slug']);?>
                            <a href="<?php echo esc_url($tag_url); ?>"
                            class="blog-filter-categories-link<?php echo $is_active ? ' active' : ''; ?>">

                                <?php echo esc_html($tag['name']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div> 
            </div>

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
                    <a class="prev <?php echo $paged == 1 ? 'disabled' : '" href="/case-studies/page/' . ($paged - 1); ?>">
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.67513 6.8851L15.5871 6.8851C15.9063 6.8851 16.1757 6.99489 16.3953 7.21445C16.6148 7.43402 16.7246 7.7034 16.7246 8.0226C16.7246 8.3418 16.6148 8.61119 16.3953 8.83075C16.1757 9.05032 15.9063 9.1601 15.5871 9.1601L4.67513 9.1601L9.34198 13.827C9.56988 14.0549 9.68067 14.3221 9.67433 14.6286C9.66798 14.9351 9.55086 15.2023 9.32296 15.4302C9.09506 15.6414 8.82785 15.7502 8.52133 15.7566C8.21482 15.7629 7.94761 15.6521 7.71971 15.4242L1.11971 8.82423C1.00774 8.71228 0.925944 8.588 0.874311 8.4514C0.822694 8.31482 0.796884 8.17189 0.796884 8.0226C0.796884 7.87332 0.822695 7.73039 0.874311 7.5938C0.925944 7.4572 1.00774 7.33293 1.11971 7.22098L7.72569 0.615003C7.9409 0.39977 8.20394 0.292153 8.51481 0.292153C8.82568 0.292153 9.09506 0.39977 9.32296 0.615003C9.55086 0.842903 9.66481 1.11328 9.66481 1.42613C9.66481 1.73899 9.55086 2.00938 9.32296 2.23728L4.67513 6.8851Z" fill="#17181A"/>
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

                    <a class="next <?php echo $paged == $total_pages ? 'disabled' : '" href="/case-studies/page/' . ($paged + 1); ?>">
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.8464 9.16372L1.9344 9.16372C1.61518 9.16372 1.34579 9.05394 1.12622 8.83437C0.906658 8.61481 0.796875 8.34542 0.796875 8.02622C0.796875 7.70702 0.906658 7.43764 1.12622 7.21807C1.34579 6.99851 1.61518 6.88872 1.9344 6.88872L12.8464 6.88872L8.1795 2.22187C7.9516 1.99397 7.84082 1.72677 7.84715 1.42025C7.8535 1.11373 7.97062 0.846524 8.19852 0.618624C8.42642 0.407391 8.69363 0.298599 9.00015 0.292249C9.30667 0.285916 9.57387 0.396699 9.80177 0.624599L16.4018 7.2246C16.5137 7.33655 16.5955 7.46082 16.6472 7.59742C16.6988 7.73401 16.7246 7.87694 16.7246 8.02622C16.7246 8.17551 16.6988 8.31844 16.6472 8.45502C16.5955 8.59163 16.5137 8.7159 16.4018 8.82785L9.7958 15.4338C9.58058 15.6491 9.31754 15.7567 9.00667 15.7567C8.69581 15.7567 8.42642 15.6491 8.19852 15.4338C7.97062 15.2059 7.85667 14.9355 7.85667 14.6227C7.85667 14.3098 7.97062 14.0394 8.19852 13.8115L12.8464 9.16372Z" fill="#17181A"/>
                        </svg>

                    </a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php if(!empty($cta) && is_array($cta)) {
	get_template_part( 'inc/blocks/parts/cta', null, $cta );
}

get_footer();