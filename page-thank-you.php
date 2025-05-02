<?php
/**
 * Template Name: Thank Tou
 *
 */
get_header('ebook'); ?>

<?php
$image_url = get_template_directory_uri() . '/assets/images/th/bg.jpg'; // Adjust the path and filename as per your directory structure
$title = get_field('thank_you_title', 'option');
$icon = get_field('thank_you_icon', 'option');
?>

<section class="thank-you">
    <img class="img-cover" src="<?php echo $image_url; ?>" alt="">
    <div class="thank-you__message">
        <div class="thank-you__message-container">

        </div>
    </div>
</section>
<?php
get_footer();
