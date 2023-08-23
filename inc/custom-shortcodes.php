<?php

// Shortcode for Client
function custom_post_clients() {

    $args = [    
        // 'posts_per_page' => 8, 
        'post_type' => 'client', 
        // 'paged' => get_query_var('paged')
    ];
    $clients = new WP_Query($args);

    $client_imgs .= '<div class="clients">';
        foreach ($clients->posts as $client){
            $client_imgs .= get_the_post_thumbnail($client->ID, 'clients-industry-thumbnail');
        }
    $client_imgs .= '</div>';

    return $client_imgs;

}
 
add_shortcode( 'post_clients', 'custom_post_clients' );

// Shortcode for Industry
function custom_post_industries() {

    $args = [    
        'post_type' => 'industry', 
    ];
    $industries = new WP_Query($args);
    $industry_imgs .= '<div class="industries">';
    foreach ($industries->posts as $industry){
        $industry_imgs .= get_the_post_thumbnail($industry->ID, 'clients-industry-thumbnail');
    }
    $industry_imgs .= '</div>';

    return $industry_imgs;
}

add_shortcode( 'post_industries', 'custom_post_industries' );

// Shortcode for Testimonial
function custom_post_testimonials() {
    $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => -1,
    );
    $testimonials = new WP_Query( $args );

    $output = '<div class="testimonials-carousel owl-carousel owl-theme">';

    while ( $testimonials->have_posts() ) {
        $testimonials->the_post();
        $testimonial_title = get_the_title();
        $testimonial_description = get_the_content();
        $testimonial_short_description = get_the_excerpt();
        $testimonial_image = get_the_post_thumbnail( get_the_ID(), 'testimonial-thumbnail' );

        $output .= '<div class="testimonial item"> <h3>' . $testimonial_title . '</h3>
                    <div class="testimonial-description">' . $testimonial_description . '</div>
                    <div class="testimonial-row">
                        <div class="testimonial-short-description">' . $testimonial_short_description . '</div>
                        <div class="testimonial-image">' . $testimonial_image . '</div>
                    </div>
                </div>';
    }
    wp_reset_postdata();

    $output .= '</div>';

    return $output;
}
add_shortcode( 'post_testimonials', 'custom_post_testimonials' );

// Shortcode for Slider with image and text
function custom_post_slides() {
    $args = array(
        'post_type' => 'slide',
        'posts_per_page' => -1,
    );
    $slides = get_posts( $args );
    $slidesOutput .= '<div class="slides-carousel owl-carousel owl-theme">';
    foreach ($slides as $slide){
        $slide_image = get_the_post_thumbnail_url( $slide->ID, 'large' );
        $btn = get_field('slides_button', $slide->ID);
        $slidesOutput .= '
                <div class="slide item">
                    <div class="slide-column">
                        <h2>' . $slide->post_title . '</h2>
                        <div class="slide-short-description">' . $slide->post_excerpt . '</div>
                        <a href="' . $btn['url'] .'" class="slide-button">'. $btn['title'] .'</a>
                    </div>
                    <div class="slide-image"><img src="' . $slide_image .'"></div>
                </div>';
    } 
    $slidesOutput .= '</div>';
    return $slidesOutput; 
}
add_shortcode( 'post_slides', 'custom_post_slides' );

/////////////////////////Case stories Carousel //////////////////////////////////////////
    function case_stories_shortcode_carousel() {
        $caseStudies = get_posts(['post_type' => 'case-study', 'posts_per_page' => 6]);
        $caseStudyImages .= '<div id="placeMe" class="carousel-img-wrapper">';
        foreach ($caseStudies as $index=>$caseStudy){
            $caseStudyList .= '<div data-case-index="' . $index .'" class="column large-6">
                                <div class="stories card">
                                    <div class="title_case card-divider"><p>' . pll__('case_study_shortcode_carousel_title', 'onisis') .'</p></div>
                                    <div class="divider"></div>
                                    <div class="card-section"><h5>' . $caseStudy->post_title .'</h5><a href="' . get_permalink($caseStudy->ID) .'">'. pll__('case_study_button','onisis') .'</a></div>
                                </div>
                            </div>';
            $caseStudyImages .= '<div class="carousel-img" data-case-index="' . $index .'">
                                    <img src="' . get_field('carousel_vertical_image', $caseStudy->ID)['sizes']['carousel-vertical'] .'" alt="">
                                </div>';
        }
        $caseStudyImages .= '</div>';
        $output = '<section class="case-stories">
            <div class="grid-x grid-margin-x">
                <div class="cell large-4 medium-6 small-12 special820">' . $caseStudyImages .'</div>
                <div class="cell large-8 medium-6 small-12 special820">
                    <div class="row"><div class="title_case column"><p>'. pll__('case_study_title','onisis') .'</p></div></div>
                    <div class="row"><div class="column"><h2>'. pll__('case_study_subtitle1','onisis') .'</h2></div></div>
                    <div class="row"><div class="column"> <p>'. pll__('case_study_subtitle2','onisis') .'</p></div></div>
                    <div id="placeMeHere"></div>
                    <div class="row"><div class="case-studies-carousel owl-carousel owl-theme"> ' . $caseStudyList .'</div>
                </div>
            </div>
        </section>';
        return $output;
    }

    add_shortcode( 'case_stories_carousel', 'case_stories_shortcode_carousel' );

//////////////////// Case studies //////////////////////////

function show_case_studies($atts) {
    extract(shortcode_atts(array(
        'ids' => '',
        'subtitle' =>  'default',
        'contained' => '',
    ), $atts));

    $CaseStudiesItems = get_posts([
        'post_type' => 'case-study',
        'post__in' => array_map('intval', explode(',', $ids)),
    ]); 

    $gridContainer = ($contained ==='yes') ? 'grid-container' : '';

    $makeCarousel = count(explode(',', $ids)) > 2 ? 'js-make-carousel owl-carousel owl-theme' : '';
    foreach ($CaseStudiesItems as $caseItem) {
        if($subtitle === "default") { 
            $industry = get_field('case_study_industries', $caseItem->ID); 
            $featureService = get_field('feature_service', $caseItem->ID); 
            $createSubtitle = '
            <a class="c-red" href="'. get_permalink($featureService->ID) .'"><span class="c-red">'. $featureService->post_title .'</span></a>
            <span class="vertical-separator"></span> 
            <span>' . $industry . ' </span>';
            $finalSubtitle = $createSubtitle;

        } else{
            $finalSubtitle = $subtitle;
        }
        $caseStudyList .= '
        <div class="caseStudy fade-3 fadeOut">
            <div class="caseStudy-img-wrapper"><img src="' . get_field('carousel_vertical_image', $caseItem->ID)['sizes']['carousel-vertical'] .'" alt=""></div>
            <div class="case-item-wrapper">
                <div class="title_case card-divider">'. $finalSubtitle .'</div> 
                <div class="divider"></div>
                <div class="title-section">
                    <a class="title-link" href="' . get_permalink($caseItem->ID) .'"><h5>' . $caseItem->post_title .'</h5></a>
                    <a class="case-excerpt" href="'. get_permalink($caseItem->ID) .'"><p>' . get_the_excerpt($caseItem->ID) .'</p></a>
                    <a class="button-link" href="' . get_permalink($caseItem->ID) .'">'. pll__('case_study_button','onisis') .'</a>
                </div>
            </div>
        </div>';
        // $createSubtitle ='';
    }

    $caseStudiesoutput = '
    <section class="case-stories-shortcode ' . $gridContainer .'"> 
        <div class="caseStudyList ' . $makeCarousel .'">' . $caseStudyList . '</div>
    </section>';
    return $caseStudiesoutput;       
}

add_shortcode( 'show_case_studies', 'show_case_studies' );

// Icons below the feature image
function add_share_bookmark_print_icons() {
    global $post;
    $url = urlencode(get_permalink());
    $title = str_replace(' ', '%20', get_the_title());
    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
    $output = '<div class="share-bookmark-print-icons">';
    $output .= '<a href="#" onclick="window.open(\'http://www.addtoany.com/share_save?linkurl=' . $url . '&amp;title=' . $title . '\', \'addtoany\', \'width=700,height=400\'); return false;" target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/share.png" alt="Share"></a>';
    $output .= '<a href="#" onclick="window.print(); return false;"><img src="' . get_template_directory_uri() . '/assets/images/print.png" alt="Print"></a>';
    $output .= '<a class="BookmarkMe" title="' . get_the_title() .'" href="' . get_permalink() .'"><img src="' . get_template_directory_uri() . '/assets/images/bookmark.png" alt="Bookmark"></a>';
    // $output .= '<a href="#" onclick="navigator.clipboard.writeText(\'' . get_permalink() . '\'); alert(\'Page URL copied to clipboard. Please manually add to your browser bookmarks.\'); return false;"><img src="' . get_template_directory_uri() . '/assets/images/bookmark.png" alt="Bookmark"></a>';
    $output .= '</div>';
    return $output;
}
add_shortcode( 'add_share_bookmark_print_icons', 'add_share_bookmark_print_icons' );

// Hero Slider
function heroSlider() {
    $heroSliderSlides = get_field('hero_slider');
    foreach ($heroSliderSlides as $index=>$slide) {
        $desktopSrc = $slide["slide"]["image"]["sizes"]["large"];
        $desktopAlt = $slide["slide"]["image"]["alt"];
        if (!empty($slide["slide"]["mobile_image"]["sizes"]["large"])){
            $mobileSrc = $slide["slide"]["mobile_image"]["sizes"]["large"];
            $mobileAlt = $slide["slide"]["mobile_image"]["alt"];
        } else{
            $mobileSrc = $slide["slide"]["image"]["sizes"]["large"];
            $mobileAlt = $slide["slide"]["image"]["alt"];
        }

        $slides .='
        <div data-index=' . $index .' class="slide make-full"> 
            <div class="img-wrapper">
                <img class="desktop-img" src="' . $desktopSrc .'" alt="' . $desktopAlt .'">
                <img class="mobile-img" src="' . $mobileSrc .'" alt="' . $mobileAlt .'">
            </div>
            <div class="content">
                <div class="title">' . $slide["slide"]["title"] .'</div> 
                <div class="desc">
                    <p>' . $slide["slide"]["description"] .'</p>
                    <div class="button"><a href="' . $slide["slide"]["button"]["url"] .'">' . $slide["slide"]["button"]["title"] .'</a></div>
                </div>
            </div> 
        </div>';
        $headlines .= '<span data-index=' . $index .'>' . $slide["slide"]["headline"] .'</span>';
    }

    $heroSlider = '
    <div class="hero-slider">
        <div class="slides-wrapper">' . $slides . '</div>
        <div class="headlines"> ' . $headlines .'</div>
    </div>';

    echo $heroSlider;
}

add_shortcode( 'hero_slider', 'heroSlider' );

