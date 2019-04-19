<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Praxis
 */

if(function_exists('cs_get_option'))
{
    $copyright_switcher = cs_get_option('copyright_switcher');
    $footer_copyright = cs_get_option('footer_copyright');
    $footer_column_number = cs_get_option('footer_column_number');
}
?>

<!-- Start Site Footer -->
        <footer class="site-footer black-bg myFooterBackgroundColor">
            <div class="container">
                <div class="row">
                    <?php for($i = 1; $i <= $footer_column_number; $i++): ?>
                    <div class="col-sm-<?php echo esc_attr(12/$footer_column_number); ?>">
                        <?php dynamic_sidebar("footer-{$i}"); ?>
                    </div><!-- .col -->
                    <?php endfor; ?>
                </div><!-- .row -->
                <?php if($copyright_switcher == true): ?>
                <div class="copy-right myCopyrightColor"><?php echo esc_html($footer_copyright); ?></div>
                <?php endif; ?>
            </div>
        </footer>
        <!-- End Site Footer -->

        <?php wp_footer(); ?>
    </body>
</html>
