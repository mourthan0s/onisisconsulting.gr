<?php
/** Template Name: Template Case Studies Page **/
get_header();

$args = [    
    'posts_per_page' => 6, 
    'post_type' => 'case-study', 
    'paged' => get_query_var('paged') 
    
];
$articles = new WP_Query($args); ?>
<div class="casefeatured-image">
    <?php the_post_thumbnail(); ?>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="caseinfo fadeMeIn large-4 cell">
                <div class="case_header">
                    <div class="case_title"><?php the_title( '<h2>', '</h2>' ); ?></div>
                </div>
                <div class="case_content"><?php the_content(); ?></div>
            </div>

        </div>
    </div>
</div>
<!-- <div class="grid-container">
        <div class="grid-x grid-padding-x"> -->
            <div class="slider_case_studies">
                <div class="background_slider fade-3 fadeOut">
                    <?php echo do_shortcode('[post_slides]'); ?>
                </div>
            </div>
        <!-- </div>
    </div> -->

<?php 
   $CaseStudiesItems = get_posts([
    'post_type' => 'case-study',
    'posts_per_page' => -1,
]); 
?>
<div class="grid-container">
<div class="case-stories-shortcode"> 
    <div class="caseStudyList">
        <?php foreach ($CaseStudiesItems as $caseStudy) {
            $featureService = get_field('feature_service', $caseStudy->ID); 
            $excerpt = get_the_excerpt($caseStudy->ID); ?>
            <div class="caseStudy spaceBottom fade-3 fadeOut"> 
                <div class="caseStudy-img-wrapper"><img src="<?php echo get_field('carousel_vertical_image', $caseStudy->ID)['sizes']['carousel-vertical']; ?>" alt="<?php echo $caseStudy->post_title; ?>"></div>
                <div class="case-item-wrapper">
                    <div class="title_case card-divider">
                       <a href="<?php echo get_permalink($featureService->ID); ?>"><span class="c-red"><?php echo $featureService->post_title; ?></span></a>
                       <span class="vertical-separator"></span> 
                       <span><?php echo get_field('case_study_industries', $caseStudy->ID);?></span>
                    </div> 
                    <div class="spaceBottomSmall"></div>
                    <div class="title-section">
                        <a class="title-link" href="<?php echo get_permalink($caseStudy->ID); ?>"><h5><?php echo $caseStudy->post_title; ?></h5></a>
                        <?php if(!empty($excerpt)) { ?><a class="case-excerpt" href="<?php echo get_permalink($caseStudy->ID); ?>"><p><?php echo $excerpt; ?></p></a><?php } ?>
                        <a class="button-link" href="<?php echo get_permalink($caseStudy->ID); ?>"><?php echo pll__('case_study_button', 'onisis'); ?></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>

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