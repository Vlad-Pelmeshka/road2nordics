<?php

$post_id 	= get_the_ID();
$title 		= get_the_title();
$link 		= get_permalink();
$image_id 	= get_post_thumbnail_id() ?: get_field('main_bg','options');
$excerpt 	= get_field('header_content') ?: get_the_excerpt();

$category_list = wp_get_post_categories($post_id);
if(!empty($category_list[0])){
    $cat_info = get_the_category_by_ID($category_list[0]);
}
?>
<a class="blog-item" href="<?php echo esc_url($link); ?>">
	<div class="blog-item__image">
		<?php echo wp_get_attachment_image( $image_id, 'full', false, [ 
			'alt'   => $title,
			'title' => $title
		] ) ?>
	</div>

	<div class="blog-item__info">

		<div class="blog-item__content">

			<?php /* if(!empty($cat_info)): ?>
				<div class="blog-item__category"><?php echo $cat_info; ?></div>
			<?php endif; */ ?>

			<div class="blog-item__title"><?php echo strip_tags($title); ?></div>
			<div class="blog-item__except"><?php echo strip_tags($excerpt); ?></div>

		</div>
		<div class="blog-item__bottom">
			<div class="blog-item__time">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.3147 11.018L11.0173 10.3155L8.49932 7.79735V4.66673H7.49935V8.20263L10.3147 11.018ZM8.00045 14.3334C7.12449 14.3334 6.30114 14.1672 5.53038 13.8347C4.75962 13.5023 4.08916 13.0511 3.51902 12.4812C2.94886 11.9113 2.49749 11.2412 2.1649 10.4707C1.83231 9.70032 1.66602 8.87714 1.66602 8.00118C1.66602 7.12523 1.83224 6.30187 2.16468 5.53111C2.49713 4.76035 2.94829 4.08989 3.51818 3.51975C4.08808 2.94959 4.75824 2.49822 5.52867 2.16563C6.29908 1.83304 7.12226 1.66675 7.99822 1.66675C8.87417 1.66675 9.69753 1.83297 10.4683 2.16542C11.239 2.49786 11.9095 2.94903 12.4796 3.51891C13.0498 4.08881 13.5012 4.75898 13.8338 5.5294C14.1664 6.29981 14.3327 7.12299 14.3327 7.99895C14.3327 8.8749 14.1664 9.69826 13.834 10.469C13.5015 11.2398 13.0504 11.9102 12.4805 12.4804C11.9106 13.0505 11.2404 13.5019 10.47 13.8345C9.69959 14.1671 8.8764 14.3334 8.00045 14.3334ZM7.99933 13.3334C9.47711 13.3334 10.7354 12.814 11.7743 11.7751C12.8132 10.7362 13.3327 9.47784 13.3327 8.00007C13.3327 6.52229 12.8132 5.26395 11.7743 4.22507C10.7354 3.18618 9.47711 2.66673 7.99933 2.66673C6.52155 2.66673 5.26322 3.18618 4.22433 4.22507C3.18544 5.26395 2.666 6.52229 2.666 8.00007C2.666 9.47784 3.18544 10.7362 4.22433 11.7751C5.26322 12.814 6.52155 13.3334 7.99933 13.3334Z" fill="#1F283C"/>
				</svg>
				<span><?php echo do_shortcode("[rt_reading_time post_id='$post_id' postfix='min read' postfix_singular='min read']"); ?></span>
			</div>

			<div class="blog-item__read">
				<span>Read More</span>
				<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_21198_1802)">
						<path d="M6 6.5L18 6.5V18.5" stroke="#1F283C" stroke-width="1.5" stroke-linejoin="round"/>
						<path d="M18 6.5L6 18.5" stroke="#1F283C" stroke-width="1.5" stroke-linejoin="round"/>
					</g>
					<defs>
						<clipPath id="clip0_21198_1802">
							<rect width="24" height="24" fill="white" transform="translate(0 0.5)"/>
						</clipPath>
					</defs>
				</svg>

			</div>
		</div>
</div>
</a>