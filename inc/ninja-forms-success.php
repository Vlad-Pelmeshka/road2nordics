<?php
// Prevent direct access
if (!defined('ABSPATH')) exit;

/**
 * Generate the success message HTML for Ninja Forms
 */
function get_custom_ninja_forms_success_message() {
    // Get ACF values from the options page
    $acf_success_title = get_field('success_title', 'option');
    $acf_success_message = get_field('success_text', 'option');
    $acf_success_logo = get_field('success_image', 'option');

    // Return nothing if both fields are empty
    if (empty($acf_success_message) && empty($acf_success_logo)) {
        return '';
    }

    ob_start(); // Start output buffering
    ?>
    <div class="custom-ninja-form-success" style="text-align: center; padding: 20px;">
        <?php if (!empty($acf_success_logo)) : ?>
            <div class="success-logo">
                <img src="<?php echo esc_url($acf_success_logo['url']); ?>"
                     alt="Success Logo"
                     style="max-width: 100px; margin-bottom: 10px;">
            </div>
        <?php endif; ?>

        <?php if (!empty($acf_success_message)) : ?>
            <p class="success-message" style="font-size: 18px; font-weight: bold; color: #333;">
                <?php echo esc_html($acf_success_message); ?>
            </p>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean(); // Return the buffered output
}

/**
 * Override Ninja Forms success message using the generated HTML
 */
function custom_ninja_forms_success_message($message, $form_data) {
    $custom_message = get_custom_ninja_forms_success_message();
    return !empty($custom_message) ? $custom_message : $message;
}
add_filter('ninja_forms_success_message', 'custom_ninja_forms_success_message', 10, 2);