<?php
/**
 * Block: Reviews
 * @var array $block
 */

if (is_admin()){
	echo __( 'Block: Reviews' );
} 

$image_url = get_template_directory_uri() . '/assets/images/home/Stars.png'; 

?>

<section class="block-reviews grid-animate">
	<div class="block-reviews__inner inner grid-animate-inner">
		<?php if ( $title = get_field( 'title' ) ) : ?>
			<h2 class="block-reviews__title  grid-animate-title"><?php echo $title; ?></h2>
		<?php endif; ?>
		<?php if ( get_field( 'items' ) ) : ?>
			<div class="block-reviews__items grid-animate-items">
				<?php while ( have_rows( 'items' ) ) :
					the_row( 'items' ); ?>
					<div class="block-reviews__item grid-animate-item">
						<div class="block-reviews__item-container grid-animate-container">

							<?php if ( $icon = get_sub_field( 'photo' ) ) : ?>
								<?php echo wp_get_attachment_image( $icon, [ 150, 0 ], false, [ 
									'class' => 'block-reviews__item-icon grid-animate-icon',
									'alt'   => "Review Icon $icon",
								] ) ?>
							<?php endif; ?>
							<div class="block-reviews__item-stars">
								<img class="" src="<?php echo $image_url; ?>" alt="stars" width="175" height="25">
								
							</div>

							<?php if ( $text = get_sub_field( 'text' ) ) : ?>
								<div class="block-reviews__item-text text grid-animate-text"><?php echo $text; ?></div>
							<?php endif; ?>
							<?php if ( $name = get_sub_field( 'name' ) ) : ?>
								<div class="block-reviews__item-text name"><?php echo $name; ?></div>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
