jQuery(document).ready(function ($) {
    // Initialize the slider
    $(".testimonials-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        dots: true,
        nav: false,
        navText: [
            '<img class="owl-nav-prev" src="https://onisis.white-space.gr//wp-content/themes/onisis-theme/assets/images/left.png">',
            '<img class="owl-nav-next" src="https://onisis.white-space.gr//wp-content/themes/onisis-theme/assets/images/right.png">'
        ]
    });

    // Initialize the slider
    $(".slides-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        dots: true,
        nav: false,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        navText: [
            '<img class="owl-nav-prev" src="https://onisis.white-space.gr//wp-content/themes/onisis-theme/assets/images/left.png">',
            '<img class="owl-nav-next" src="https://onisis.white-space.gr//wp-content/themes/onisis-theme/assets/images/right.png">'
        ]
    });

    /////////////////////////////////////////////////////////////////////////


    $('[id="book_now_btn"]').each(function(){
        $(this).click(function (e) {
            e.preventDefault();
            $('.form_popup').addClass('is_visible');
        });
    });

    $('#closeVideo').click(function (e) {
        e.preventDefault();
        $('.form_popup').removeClass('is_visible');
    });

    // var ajaxurl = mainajaxp.ajaxurl;

    // function diactivate_times(tm) {
    //     $(document).find('.time_range .time_btn[data-value="' + tm + '"]').prop('disabled', true);
    // }

    // function resetAll() {
    //     $(document).find('.time_range .time_btn').each(function () {
    //         $(this).prop('disabled', false);
    //     })
    // }
    // function getData(dt = '') {
    //     $(document).find('.time_range .time_btn.selected').removeClass('selected');
    //     $('select#your-time').val('').change();
    //     $.post(ajaxurl, {
    //         action: 'find_apps_ajax',
    //         search_date: dt,
    //     }).success(function (data) {
    //         var response = $.parseJSON(data);
    //         if (response.success) {
    //             resetAll();
    //             if (response.result.length) {
    //                 var substr = response.result;
    //                 jQuery.each(substr, function (index, item) {
    //                     diactivate_times(item);
    //                 });
    //             } else {
    //                 resetAll(); 
    //             }
    //         }
    //     });
    // }

    flatpickr.localize(flatpickr.l10ns.gr);
    $("input#flatpicker-date").flatpickr({
        enableTime: false,
        inline: true,
        dateFormat: "d-m-Y",
        minDate: "today",
        disable: [
            function (date) {
                return (date.getDay() === 0 || date.getDay() === 6);
            }
        ],
        locale: {
            firstDayOfWeek: 1
        },
        // onReady: function (selectedDates, dateStr, instance) {
        //     getData('');
        // },
        // onChange: function (selectedDates, dateStr, instance) {
        //     getData(dateStr);
        // },
    });

    $('select#your-time option').each(function () {
        if ($(this).attr('value')) {
            var txt = $(this).text();
            var cleand = txt.replace('_', ':');
            $('.button_options').append('<button type="button" class="btn btn-primary time_btn" data-value="' + $(this).attr('value') + '">' + cleand + '</button>');
        }
    });

    $(document).on('click', '.time_btn', function () {
        $(document).find('.time_btn').removeClass('selected');
        $(this).addClass('selected');
        var tmsel = $(this).data('value');
        $('select#your-time').val(tmsel).change();
    });

    //Hero Slider
    let $heroSlides = $('.hero-slider .slide');
    let $headlines = $('.headlines span');
    let jsServiceInterval;
    $heroSlides.first().addClass('active');
    $headlines.first().addClass('active');
    $('.hero-slider .title').first().addClass('slideUp');
    $('.hero-slider .desc').first().addClass('slideUp');

    var rotate = function rotate(){
        $activeSlide = $('.hero-slider .slide.active');
        $activeHeadline = $('.headlines span.active');
        $dataIndex = $activeSlide.data('index');
        if( $dataIndex+1 >= $heroSlides.length){
            $nextSlide = $('.hero-slider .slide').first();
            $nextHeadline = $('.headlines span').first();
        } else{
            $nextSlide = $('.hero-slider .slide.active').next();
            $nextHeadline = $('.headlines span.active').next();
        }
        $activeSlide.removeClass('active');
        $activeHeadline.removeClass('active');
        $nextSlide.addClass('active');
        $nextHeadline.addClass('active');
        $activeSlide.find('.title').removeClass('slideUp');
        $activeSlide.find('.desc').removeClass('slideUp');
        setTimeout(function(){
            $nextSlide.find('.title').addClass('slideUp');
        }, 2000);
        setTimeout(function(){
            $nextSlide.find('.desc').addClass('slideUp');
        }, 2500);
    }

    $headlines.each(function(){
        $(this).click(function (e) {
            $heroSlides.removeClass('active');
            $headlines.removeClass('active');
            $heroSlides.find('.title').removeClass('slideUp');
            $heroSlides.find('.desc').removeClass('slideUp');
            $(this).addClass('active');
            $clickedDataIndex = $(this).data('index');
            $("[data-index='" + $clickedDataIndex + "']").addClass('active'); 
            setTimeout(() => $("[data-index='" + $clickedDataIndex + "']").find('.title').addClass('slideUp'), 2000);
            setTimeout(() => $("[data-index='" + $clickedDataIndex + "']").find('.desc').addClass('slideUp'), 2500);
            stopSlider();
            startSlider();
        });
    });

    var startSlider = function startSlider() {
        if (!jsServiceInterval) {
          jsServiceInterval = setInterval(rotate, 6000);
        }
    };

    var stopSlider = function stopSlider() {
        clearInterval(jsServiceInterval);
        jsServiceInterval = null;
    };

    startSlider();

    
    //Mega Menu
    if ($("body").hasClass("home")) {
        $(document).on('scroll', function() {
            scroll_pos = $(this).scrollTop();
            if(scroll_pos > 80){
                $('.home .header-inner').addClass('sticky-white');
            } else{
                $('.home .header-inner').removeClass('sticky-white');
            }
        });
    }

    //Mega Menu
    $('.main-menu-wrapper .menu-item-has-children').each(function(){
        $(this).mouseover(function (e) {
            $(this).closest('.menu-item-has-children').find('.mega-menu-wrapper').addClass('hovered');
            $('.header-inner').addClass('bg-white');
        });

        $(this).mouseleave(function (e) {
            $(this).closest('.menu-item-has-children').find('.mega-menu-wrapper').removeClass('hovered');
            $('.header-inner').removeClass('bg-white');
        });
    });

    $('.burger-menu').click(function(){
        $(this).toggleClass('show');
        $('.main-menu-wrapper').toggleClass('show');
        $('.header, .header-inner').toggleClass('unset');
    });


    //Mobile Mega menu
    if($(window).width() < 1023){

        $('.header .menu-item.menu-item-has-children > a').each(function(){
            $(this).append('<span></span>');
            $(this).closest('.menu-item-has-children').find('.mega-menu-wrapper').hide();
        });

        $('.header .menu-item.menu-item-has-children a span').each(function(){
            $(this).click(function(e){
                var $this = $(this);
                e.preventDefault();
                if($this.hasClass('rotateMe')){
                    $this.removeClass('rotateMe');
                    $this.closest('.menu-item-has-children').find('.mega-menu-wrapper').slideUp('slow');
                }
                else{
                    $this.addClass('rotateMe');
                    $this.closest('.menu-item-has-children').find('.mega-menu-wrapper').slideDown('slow');
                }
            });
        });

        $('.header .phone').appendTo('.main-menu-wrapper');
        $('.header .pop_up').appendTo('.main-menu-wrapper');

        //Change position for case studies home carousel
        $('#placeMe').appendTo('#placeMeHere');

     };

    // Case Study Carousel
    // $(".case-studies-carousel").owlCarousel({
    //     items: 2,
    //     loop: true,
    //     autoplay: true,
    //     dots: true,
    //     nav: false,
    // });

    var caseStudiesOwl = $('.case-studies-carousel');
    $('.carousel-img-wrapper .carousel-img').first().addClass('active');
    caseStudiesOwl.owlCarousel({
        items: 2,
        slideBy: 2,
        loop: true,
        autoplay: true,
        dots: true,
        nav: false,
        responsive:{
            0:{
                items: 1,
                slideBy: 1,
            },
            800:{
                items: 2,
                slideBy: 2,
            }
        }
    });

    caseStudiesOwl.on('changed.owl.carousel', function(e) {
        var $caseIndex = $('.case-studies-carousel .owl-item.active').first().find('.column').data('case-index');
        $('.carousel-img').removeClass('active');
        $('.carousel-img-wrapper .carousel-img[data-case-index="' + $caseIndex + '"]').addClass('active')
    });
    

    //Case Studies Shortcode Carousel
    $('.js-make-carousel').owlCarousel({
        items: 2,
        slideBy: 2,
        loop: true,
        autoplay: true,
        dots: true,
        nav: false,
        responsive:{
            0:{
                items: 1,
                slideBy: 1,
            },
            800:{
                items: 2,
                slideBy: 2,
            }
        }
    });

    // Accordions With Images
    $('.custom-accordion-wrapper .elementor-tab-title').each(function($index){
        $(this).parent().find('.elementor-tab-content img').attr('data-img', $index+1).appendTo('.tab-image-area');
    });
    $('.tab-image-area img').first().addClass('show');
    $('.custom-accordion-wrapper .elementor-tab-title').each(function($index){
        $(this).click(function(e) {
            $tabIndex = $(this).attr('data-tab');
            $('.tab-image-area img').removeClass('show');
            $('.tab-image-area img[data-img="' + $tabIndex + '"]').addClass('show');
        });
    }); 

    //Custom Fade in Text on header Sections
    setTimeout(function(){
        $('.fadeMeIn').addClass('show')
    }, 200)


    // Fade in elements when they are on viewport
    const observerOptions = {
        root: null, 
        rootMargin: "0px",
        threshold: 0.5
    };
  
    function observerCallback(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                setTimeout(function(){
                    entry.target.classList.replace('fadeOut', 'fadeIn');
                }, 200)
            }
        });
    }

    const fadeElms = document.querySelectorAll('.fade-1 , .fade-2, .fade-3');
    const observer = new IntersectionObserver(observerCallback, observerOptions);
    fadeElms.forEach(el => observer.observe(el));

    //Change image border width on scroll
    // var scrolls = 0;
    // $(document).on('scroll touchmove mousewheel', function(turn, delta) { 
    //     scroll_pos = $(this).scrollTop();
    //     img_pos = $(".border-frame").offset().top;
    //     if(scroll_pos > img_pos - 50){
    //         $('html, body').css({ overflow: 'hidden' }); 
    //         if (delta == 1) {
    //             scrolls = scrolls+10;
    //             console.log('up', 150+scrolls);
    //             $(".border-frame").animate({
    //                 'border-width' : (150+scrolls) + "px"
    //             });
    //         }
    //         else {
    //             scrolls = scrolls-10;
    //             console.log('down', 150+scrolls);
    //             $(".border-frame").animate({
    //                 'border-width' : (150-scrolls) + "px"
    //             });
    //         }

           
    //     } else {
    //         $('html, body').css({ overflow: 'auto' }); 
    //     }
    //     console.log(scroll_pos, img_pos);
    // });


        var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
        // var isMozilla = /firefox/.test(navigator.userAgent.toLowerCase());
        
        $("a.BookmarkMe").click(function(e)  {
            e.preventDefault(); // this will prevent the anchor tag from taking the user off to the link
            
            var bookmarkUrl = this.href;
            var bookmarkTitle = this.title;
            window = $(window);
            console.log(bookmarkUrl,bookmarkTitle, 'hi' );

            if((window.external || document.all) && !isChrome)
            { // For IE Favorite
                window.external.AddFavorite( bookmarkUrl, bookmarkTitle);
            }
            else if(window.opera) { // For Opera Browsers
            $("a.BookmarkMe").attr("href",bookmarkUrl);
            $("a.BookmarkMe").attr("title",bookmarkTitle);
            $("a.BookmarkMe").attr("rel","sidebar");
            }
            else { // for other browsers which does not support
            alert('Your browser does not support this bookmark action');
            return false;
        }
        });
    
});
