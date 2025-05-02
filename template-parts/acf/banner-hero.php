<?php
/**
 * Banner: Hero
 * @var array $block
 */

if ( is_admin() ) : ?>
	<?php echo __( 'Banner: Hero' ); ?>
<?php endif; ?>

<?php
$title       = get_field( 'title' );
$text        = get_field( 'text' );
$cta         = get_field( 'button' );
$video_url   = get_field( 'video' );
$img_url     = get_field( 'image_main' );
$black_fonts = get_field( 'black_fonts' ); // Get the black_fonts field
?>
<section class="banner-hero <?php echo ( $black_fonts ) ? 'banner-hero--black-fonts' : ''; ?>">
	<?php if ( $video_url || $img_url ) : ?>
		<div class="banner-hero__pse">
			<?php if ( $video_url ) : ?>
				<video autoplay loop muted playsinline preload="metadata" src="<?php echo $video_url['url']; ?>"></video>
			<?php elseif ( $img_url ) : ?>
				<?php echo wp_get_attachment_image( $img_url, 'full', false, [ 
					'class' => 'img-cover'
				] ) ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="banner-hero__inner inner">
		<div class="banner-hero__content">
			<?php if ( $title ) : ?>
				<h1 class="banner-hero__title page-title"><?php echo $title; ?></h1>
			<?php endif; ?>
			<?php if ( $image = get_field( 'image' ) ) : ?>
				<div class="banner-hero__image">
					<?php echo wp_get_attachment_image( $image, [ 24, 0 ], false, [

					] ) ?>
				</div>
			<?php endif; ?>
			<?php if ( $text ) : ?>
				<p class="banner-hero__text"><?php echo $text; ?></p>
			<?php endif; ?>

			<div class="banner-hero__btn animate-btn">
				<?php if ( $cta ) : ?>
					<a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>"
						class="banner-hero__cta btn-primary">
						<?php echo $cta['title']; ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
