<?php
/**
 * Block: Image Text Left Right
 * @var array $block
 */

if ( is_admin() ) : ?>
	<?php echo __( 'Block: Image Text Left Right' ); ?>
<?php endif; ?>

<?php
$title        = get_field( 'title' );
$text         = get_field( 'text' );
$icon         = get_field( 'icon' );
$bg           = get_field( 'background_image' );
$image        = get_field( 'image' );
$choose_mode  = get_field( 'leftright' );
$choose_white = get_field( 'white_color' );
$section_id   = get_field( 'section_id' );
?>

<?php if ( ! $choose_mode ) : ?>
	<section id="<?php if ( $section_id = get_field( 'section_id' ) ) : ?><?php echo $section_id; ?><?php endif; ?>"
		class="block-image-text-left-right">
		<?php if ( $bg ) : ?>
			<img class="img-cover" src="<?php echo $bg['url']; ?>" alt="
		<?php echo $bg['alt']; ?>" />
		<?php endif; ?>
		<div class="block-image-text-left-right__image">
			<?php if ( $image = get_field( 'image' ) ) : ?>
				<?php echo wp_get_attachment_image( $image, [ 0, 560 ], false, [ 
					'class' => 'img-cover'
				] ) ?>
			<?php endif; ?>
		</div>

		<div
			class="block-image-text-left-right__content <?php if ( $choose_white ) : ?><?php echo 'white'; ?><?php endif; ?>">

			<?php if ( $icon ) : ?>
				<div class="block-image-text-left-right__icon">
					<?php echo wp_get_attachment_image( $icon, [ 32, 0 ], false, [ 
						'class' => 'icon'
					] ) ?>
				</div>

			<?php endif; ?>
			<?php if ( $title ) : ?>
				<h2 class="block-image-text-left-right__title"><?php echo $title; ?></h2>
			<?php endif; ?>

			<?php if ( $text ) : ?>
				<p class="block-image-text-left-right__text"><?php echo $text; ?></p>
			<?php endif; ?>

			<div class="block-image-text-left-right__btn">
				<?php if ( $cta = get_field( 'button' ) ) : ?>
					<a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>"
						class="block-image-text-left-right__cta btn-primary">
						<?php echo $cta['title']; ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ( $choose_mode ) : ?>
	<section id="<?php if ( $section_id = get_field( 'section_id' ) ) : ?><?php echo $section_id; ?><?php endif; ?>"
		class="block-image-text-left-right right ">
		<?php if ( $bg ) : ?>
			<img class="img-cover" src="<?php echo $bg['url']; ?>" alt="
		<?php echo $bg['alt']; ?>" />
		<?php endif; ?>
		<div
			class="block-image-text-left-right__content <?php if ( $choose_white ) : ?><?php echo 'white'; ?><?php endif; ?>">

			<?php if ( $icon ) : ?>
				<div class="block-image-text-left-right__icon">
					<?php echo wp_get_attachment_image( $icon, [ 32, 0 ], false, [ 
						'class' => 'icon'
					] ) ?>
				</div>

			<?php endif; ?>
			<?php if ( $title ) : ?>
				<h2 class="block-image-text-left-right__title"><?php echo $title; ?></h2>
			<?php endif; ?>

			<?php if ( $text ) : ?>
				<p class="block-image-text-left-right__text"><?php echo $text; ?></p>
			<?php endif; ?>

			<div class="block-image-text-left-right__btn">
				<?php if ( $cta = get_field( 'button' ) ) : ?>
					<a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>"
						class="block-image-text-left-right__cta btn-primary">
						<?php echo $cta['title']; ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="block-image-text-left-right__image">
			<?php if ( $image = get_field( 'image' ) ) : ?>
				<?php echo wp_get_attachment_image( $image, [ 0, 560 ], false, [ 
					'class' => 'img-cover'
				] ) ?>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

