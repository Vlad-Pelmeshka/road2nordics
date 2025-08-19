<?php
/**
 * The theme header
 */

$currency_switcher = get_field('currency-switcher');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Google Analytics opt-out snippet added by Site Kit -->
	<script>
		window["ga-disable-G-EK7KTPZ9ZZ"] = true;
	</script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preload"
		href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" as="style">
	<link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap"
		rel="stylesheet">


	<?php wp_head(); ?>

	<!-- Google tag (gtag.js) snippet added by Site Kit -->

	<!-- Google Analytics snippet added by Site Kit -->
	<script src="https://www.googletagmanager.com/gtag/js?id=GT-NGWMQVNV" id="google_gtagjs-js" async></script>
	<script id="google_gtagjs-js-after">
		window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); }
		gtag("set", "linker", { "domains": ["road2nordics.com"] });
		gtag("js", new Date());
		gtag("set", "developer_id.dZTNiMT", true);
		gtag("config", "GT-NGWMQVNV");
	</script>

	<!-- End Google tag (gtag.js) snippet added by Site Kit -->

</head>

<body <?php body_class(); ?>>
	<script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
	<?php include get_stylesheet_directory() . '/assets/images/svg/icon-sprite.svg'; ?>

	<div id="test" class="page-wrap">
		<header class="header">
			<div class="header__inner inner">

				<div class="header__content">
					<?php if ( $logo = get_field( 'logo', 'option' ) ) : ?>
						<div class="header__logo-container">
							<a class="header__logo" href="<?php echo home_url( '/' ); ?>">
								<?php echo wp_get_attachment_image( $logo, [ 200, 0 ], false, [ 
									'class'   => 'header__logo-img',
									'alt'     => esc_attr( get_bloginfo( 'title' ) ),
									'loading' => 'eager'
								] ) ?>
							</a>
						</div>
					<?php endif; ?>
					<div class="header__menus desi">
						<?php
						wp_nav_menu( array(
							'theme_location'  => 'header-ebook',
							'container'       => 'nav',
							'container_class' => 'header__main-nav',
							'menu_class'      => 'header__main-nav-menu js-header-menu',
							'fallback_cb'     => '__return_false',
						) );
						?>
					</div>
				</div>
				<?php
				if ( $currency_switcher ) : ?>
					<div id="currency-switcher">
						<select id="currency-select" aria-labelledby="Currency select">
							<option value="USD">USD ($)</option>
							<option value="EUR">EUR (€)</option>
						</select>
					</div>
				<?php endif; ?>

				<button class="header__hamburger" aria-label="Toggle menu">
					<span class="header__hamburger-line"></span>
					<span class="header__hamburger-line"></span>
					<span class="header__hamburger-line"></span>
				</button>

			</div>
		</header>
		<div class="header__menus mobi js-mobi">
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'header-ebook',
				'container'       => 'nav',
				'container_class' => 'header__main-nav',
				'menu_class'      => 'header__main-nav-menu js-header-menu',
				'fallback_cb'     => '__return_false',
			) );
			?>

		</div>

		<main id="content" class="page-content">
