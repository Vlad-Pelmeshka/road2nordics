<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$post_ID    = get_the_ID();
$image_id 	= get_post_thumbnail_id() ?: get_field('main_bg','options');
$title 		= get_the_title();

$tags = wp_get_post_tags($post_ID);

$header_description = get_field('header_content');
$show_h2_list       = get_field('show_h2_list');
$contact_block      = get_field('contact_block');
$contact_block_show = $contact_block['is_show'] ?: false;

$single_info    = get_field('single_info', 'options');
$title_nav      = $single_info['title_nav'];
$bottom_block   = ($contact_block['content_type'] == 'prepared') ? $single_info['bottom_block'] : $contact_block;
$copy_link_text = $single_info['copy_link_text'] ?: 'Copy link';
$share_text     = $single_info['share_text'] ?: 'Share this article';
$read_next_text = $single_info['read_next_text'] ?: 'Read next';

$three_posts = get_three_random_posts($post_ID);

// $cta  = get_field('cta', 'options');
// $bottom_block   = $blog_info['bottom_block'];

$header_content_info = [
    'date' => '<span>' . get_the_date( 'j M Y') . '</span>',
    'read' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M10.3147 11.018L11.0173 10.3155L8.49932 7.79735V4.66673H7.49935V8.20263L10.3147 11.018ZM8.00045 14.3334C7.12449 14.3334 6.30114 14.1672 5.53038 13.8347C4.75962 13.5023 4.08916 13.0511 3.51902 12.4812C2.94886 11.9113 2.49749 11.2412 2.1649 10.4707C1.83231 9.70032 1.66602 8.87714 1.66602 8.00118C1.66602 7.12523 1.83224 6.30187 2.16468 5.53111C2.49713 4.76035 2.94829 4.08989 3.51818 3.51975C4.08808 2.94959 4.75824 2.49822 5.52867 2.16563C6.29908 1.83304 7.12226 1.66675 7.99822 1.66675C8.87417 1.66675 9.69753 1.83297 10.4683 2.16542C11.239 2.49786 11.9095 2.94903 12.4796 3.51891C13.0498 4.08881 13.5012 4.75898 13.8338 5.5294C14.1664 6.29981 14.3327 7.12299 14.3327 7.99895C14.3327 8.8749 14.1664 9.69826 13.834 10.469C13.5015 11.2398 13.0504 11.9102 12.4805 12.4804C11.9106 13.0505 11.2404 13.5019 10.47 13.8345C9.69959 14.1671 8.8764 14.3334 8.00045 14.3334ZM7.99933 13.3334C9.47711 13.3334 10.7354 12.814 11.7743 11.7751C12.8132 10.7362 13.3327 9.47784 13.3327 8.00007C13.3327 6.52229 12.8132 5.26395 11.7743 4.22507C10.7354 3.18618 9.47711 2.66673 7.99933 2.66673C6.52155 2.66673 5.26322 3.18618 4.22433 4.22507C3.18544 5.26395 2.666 6.52229 2.666 8.00007C2.666 9.47784 3.18544 10.7362 4.22433 11.7751C5.26322 12.814 6.52155 13.3334 7.99933 13.3334Z" fill="#1F283C"/>
    </svg><span>' . do_shortcode("[rt_reading_time post_id='$post_ID' postfix='min read' postfix_singular='min read']") . '</span>',
];

global $nav_content_headings;

?>

<section class="post">
    <div class="post-header">
        <div class="post-header-content">

            <div class="post-header-content-block">

                <div class="post-header-content-line">
                    <div class="post-header-content-info">
                        <?php foreach ( $header_content_info as $info ) : ?>
                                <div class="post-header-content-info-item"> 
                                    <?php echo $info; ?>
                                </div>
                        <?php endforeach; ?>
                    </div>

                    
                </div>
                <h1><?php echo $title; ?></h1>
            </div>
        </div>

        <div class="post-header-image">
            <?php echo wp_get_attachment_image( $image_id, 'full', false, [ 
                'alt'   => $title,
                'title' => $title
            ] ) ?>
        </div>

        <?php if(!empty($header_description = get_field('header_content'))): ?>
            <div class="post-header-description">
                <?php echo $header_description; ?>
            </div>
        <?php endif; ?>

        <?php if($show_h2_list): ?>
            <div class="post-nav">
                <div class="post-nav-container">
                    <div class="post-nav-title" for="post-nav-list"><?php echo esc_html( $title_nav ); ?></div>

                    <ul class="post-nav-list wp-block-list">
                        <?php foreach ( $nav_content_headings as $heading ) : ?>
                            <li class="post-nav-item">
                                <a class="post-nav-link" href="#<?php echo esc_attr( $heading['id'] ); ?>">
                                    <?php echo esc_html( $heading['text'] ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="post-content">
        <div class="post-article">
            <?php the_content(); ?>

            <?php if($contact_block_show): ?>
                <div class="post-contact">
                    <div class="post-contact-title"><?php echo $bottom_block['title']; ?></div>
                    <div class="post-contact-description"><?php echo $bottom_block['description']; ?></div>
                    
                    <?php if(!empty($bottom_block['button'])): ?>
                        <a class="post-contact-btn btn-primary" href="<?php echo $bottom_block['button']['url']; ?>" target="<?php echo $bottom_block['button']['target']; ?>">
                            <span><?php echo $bottom_block['button']['title']; ?> </span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4L20.4853 12.4853L12 20.9706" stroke="white" stroke-width="1.5" stroke-linejoin="round"/>
                            <path d="M20.4853 12.4853H3.51472" stroke="white" stroke-width="1.5" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if(!empty($tags)): ?>
                <div class="post-tags">
                    <?php foreach($tags as $tag): ?>
                        <a class="post-tags-item" href="/blog/?tag=<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="post-share">
                <div class="post-share-text"><?php echo $share_text; ?></div>
                <div class="post-share-buttons">
                    <a href="#" class="share-list-item facebook-link">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M33.3346 20.0001C33.3346 12.6401 27.3613 6.66675 20.0013 6.66675C12.6413 6.66675 6.66797 12.6401 6.66797 20.0001C6.66797 26.4534 11.2546 31.8267 17.3346 33.0667V24.0001H14.668V20.0001H17.3346V16.6667C17.3346 14.0934 19.428 12.0001 22.0013 12.0001H25.3346V16.0001H22.668C21.9346 16.0001 21.3346 16.6001 21.3346 17.3334V20.0001H25.3346V24.0001H21.3346V33.2667C28.068 32.6001 33.3346 26.9201 33.3346 20.0001Z" fill="#1F283C"/>
                        </svg>
                    </a>
                    <a href="#" class="share-list-item linkedin-link">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.3333 8C30.0406 8 30.7189 8.28095 31.219 8.78105C31.719 9.28115 32 9.95942 32 10.6667V29.3333C32 30.0406 31.719 30.7189 31.219 31.219C30.7189 31.719 30.0406 32 29.3333 32H10.6667C9.95942 32 9.28115 31.719 8.78105 31.219C8.28095 30.7189 8 30.0406 8 29.3333V10.6667C8 9.95942 8.28095 9.28115 8.78105 8.78105C9.28115 8.28095 9.95942 8 10.6667 8H29.3333ZM28.6667 28.6667V21.6C28.6667 20.4472 28.2087 19.3416 27.3936 18.5264C26.5784 17.7113 25.4728 17.2533 24.32 17.2533C23.1867 17.2533 21.8667 17.9467 21.2267 18.9867V17.5067H17.5067V28.6667H21.2267V22.0933C21.2267 21.0667 22.0533 20.2267 23.08 20.2267C23.5751 20.2267 24.0499 20.4233 24.3999 20.7734C24.75 21.1235 24.9467 21.5983 24.9467 22.0933V28.6667H28.6667ZM13.1733 15.4133C13.7674 15.4133 14.3372 15.1773 14.7573 14.7573C15.1773 14.3372 15.4133 13.7674 15.4133 13.1733C15.4133 11.9333 14.4133 10.92 13.1733 10.92C12.5757 10.92 12.0026 11.1574 11.58 11.58C11.1574 12.0026 10.92 12.5757 10.92 13.1733C10.92 14.4133 11.9333 15.4133 13.1733 15.4133ZM15.0267 28.6667V17.5067H11.3333V28.6667H15.0267Z" fill="#1F283C"/>
                        </svg>
                    </a>
                    <a href="#" class="share-list-item x-link">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_21230_131" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="8" y="8" width="24" height="24">
                            <path d="M8 8H32V32H8V8Z" fill="white"/>
                            </mask>
                            <g mask="url(#mask0_21230_131)">
                            <path d="M26.9 9.12451H30.5806L22.5406 18.3371L32 30.8754H24.5943L18.7897 23.2725L12.1554 30.8754H8.47143L17.0703 21.0182L8 9.12623H15.5943L20.8331 16.0742L26.9 9.12451ZM25.6057 28.6674H27.6457L14.48 11.2177H12.2926L25.6057 28.6674Z" fill="#1F283C"/>
                            </g>
                        </svg>

                    </a>

                    <a href="#" class="share-list-item copy-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.05775 17.5C8.55258 17.5 8.125 17.325 7.775 16.975C7.425 16.625 7.25 16.1974 7.25 15.6923V4.30775C7.25 3.80258 7.425 3.375 7.775 3.025C8.125 2.675 8.55258 2.5 9.05775 2.5H17.4423C17.9474 2.5 18.375 2.675 18.725 3.025C19.075 3.375 19.25 3.80258 19.25 4.30775V15.6923C19.25 16.1974 19.075 16.625 18.725 16.975C18.375 17.325 17.9474 17.5 17.4423 17.5H9.05775ZM9.05775 16H17.4423C17.5192 16 17.5898 15.9679 17.6538 15.9038C17.7179 15.8398 17.75 15.7692 17.75 15.6923V4.30775C17.75 4.23075 17.7179 4.16025 17.6538 4.09625C17.5898 4.03208 17.5192 4 17.4423 4H9.05775C8.98075 4 8.91025 4.03208 8.84625 4.09625C8.78208 4.16025 8.75 4.23075 8.75 4.30775V15.6923C8.75 15.7692 8.78208 15.8398 8.84625 15.9038C8.91025 15.9679 8.98075 16 9.05775 16ZM5.55775 21C5.05258 21 4.625 20.825 4.275 20.475C3.925 20.125 3.75 19.6974 3.75 19.1923V6.30775H5.25V19.1923C5.25 19.2693 5.28208 19.3398 5.34625 19.4038C5.41025 19.4679 5.48075 19.5 5.55775 19.5H15.4423V21H5.55775Z" fill="#1F283C"/>
                        </svg>
                        <span><?php echo $copy_link_text; ?></span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php if(!empty($three_posts) && is_array($three_posts)): ?>
    <section class="post-read_next">
        <div class="post-read_next-title"><?php echo $read_next_text; ?></div>
        <div class="post-read_next-list">
            <?php
                foreach($three_posts as $read_post_id):
                    $post = get_post($read_post_id);
                    get_template_part( 'template-parts/post' );
                endforeach;

                wp_reset_postdata();
            ?>
        </div>
    </section>
<?php endif; ?>

<?php

get_footer();