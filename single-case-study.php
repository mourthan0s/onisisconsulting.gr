<?php get_header(); ?>
<div class="casefeatured-image">
    <?php the_post_thumbnail(); ?>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="caseinfo_single fadeMeIn single_study large-6 cell">
                <div class="case_header">
                    <div class="case_title"><?php the_title( '<h2>', '</h2>' ); ?></div>
                </div>
                <div class="case_content"><?php the_excerpt(); ?></div>
            </div>
        </div>
    </div>
</div>
<?php echo add_share_bookmark_print_icons(); ?>

<div class="case_content"><?php the_content(); ?></div>

<div class="custom_consultation">
    <div class="grid-container">
        <div class="temp-contact grid-x grid-padding-x">
            <div class="column-contact fade-3 fadeOut large-6 medium-7 small-12">
                <h3><?php echo pll__('connect_with_us_title', 'onisis'); ?></h3>
                <p><?php echo pll__('connect_with_us_description', 'onisis'); ?></p>
            </div>
            <div class="large-2"></div>
            <div class="button_schedule fade-3 fadeOut large-4 medium-5 small-10"><?php echo (pll_current_language('slug') === 'el') ? do_shortcode('[contact-form-7 id="6009" title="Red Form Gr"]') : do_shortcode('[contact-form-7 id="6048" title="Red Form En"]') ?></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>