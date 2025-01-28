<?php
/**
 * General template for 404 page
 *
 * @package WP-rock
 * @since 4.4.0
 */

get_header();

do_action( 'wp_rock_before_page_content' );

global $global_options;
$title      = get_field_value($global_options, '404_title');
$subtitle   = get_field_value($global_options, '404_subtitle');
$button     = get_field_value($global_options, '404_button');
?>

<section class="section animate" >
    <div class="page-404">
        <div class="container animate" data-animate='{"target": ".slideUp",  "delay": 200}'>
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-4 col-md-5">
                    <div class="page-404-img animate fadeIn">
                        <img width="527" height="527" src="<?php echo ASSETS_IMG ?>/404.svg" alt="" loading="lazy" />
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 offset-lg-1 col-md-7">
                    <div class="page-404-inner">
                        <h1 class="title h4 slideUp"><?php echo $title; ?></h1>
                        <div class="text slideUp">
                            <?php echo $subtitle; ?>
                        </div>
                        <a href="<?php echo $button ? $button['url'] : esc_attr( get_home_url() ); ?>" class="btn-group slideUp">
                            <b><?php echo $button ? $button['title'] : pll__('Home') ?></b>
                            <div class="btn-icon">
                                <svg width="24" height="24">
                                    <use xlink:href="<?php echo ASSETS_IMG ?>icons/icons_global.svg#icon-arrow" fill="none"></use>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php do_action( 'wp_rock_after_page_content' ); ?>

<?php wp_footer(); ?>

