<?php get_header('not'); ?>
<?php $image_url = get_template_directory_uri() . '/assets/images/home/banner_bg.jpg'; ?>
    <section class="not-found">

        <div class="not-found__inner inner">
            <div class="not-found__content">
                <div class="not-found__content-inner">
                    <?php if ($lg = get_field('logo_404', 'option')): ?>
                        <div class="not-found__logo">
                            <?php echo wp_get_attachment_image( $lg, [ 200, 0 ], false, [ 
                                'alt'     => 'Logo 404',
                                'loading' => 'eager'
                            ] ) ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($title_404 = get_field('title_404', 'option')): ?>
                        <h1 class="not-found__title"><?php echo $title_404; ?></h1>
                    <?php endif; ?>

                    <?php if ($text_404 = get_field('text_404', 'option')): ?>
                        <div class="not-found__subtitle"><?php echo $text_404; ?></div>
                    <?php endif; ?>
                    
                    <div class="not-found__btn-wrapper">
                        <a class="not-found__btn btn-primary"
                           href="<?php echo home_url('/') ?>"><?php echo __('Go Home', 'datizy'); ?></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>