<?php
/**
 * Banner: Hero
 * @var array $block
 */

if ( is_admin() ) : ?>
	<?php echo __( 'Banner: Hero' ); ?>
<?php endif; ?>

<?php
$title = get_field( 'title' );

$gallery = get_field( 'logos' );
;
?>
<section class="block-logo-sliders">
	<div class="block-logo-sliders__inner inner">
		<div class="block-logo-sliders__content">
			<?php if ( $title ) : ?>
				<h2 class="block-logo-sliders__title"><?php echo $title; ?></h2>
			<?php endif; ?>
		</div>
		<div class="block-logo-sliders__items" id="slider-logos">
			<div class="splide__track">
				<div class="splide__list">
					<?php while ( have_rows( 'logos' ) ) :
						the_row( 'logos' ); ?>

						<?php if ( $logo_link = get_sub_field( 'link' ) ) : ?>

							<a class="splide__slide" href="<?php echo $logo_link['url']; ?>"
								target="<?php echo $logo_link['target']; ?>">
								<?php if ( $logo = get_sub_field( 'logo' ) ) : ?>
									<?php echo wp_get_attachment_image( $logo, [ 0, 40 ], false, [

									] ) ?>
								<?php endif; ?>
							</a>
						<?php endif; ?>


					<?php endwhile; ?>
				</div>

			</div>
		</div>
	</div>
</section>
