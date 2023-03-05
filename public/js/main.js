"use strict";
var preloader    = $('.preloader'),
    imagesCount  = $('img').length,
    dBody        = $('body'),
    percent      = 100 / imagesCount,
    progress     = 0,
    imgSum       = $('img').length,
    loadedImg    = 0;


for (var i = 0; i < imagesCount; i++) {
    var img_copy        = new Image();
    img_copy.src        = document.images[i].src;
    img_copy.onload     = img_load;
    img_copy.onerror    = img_load;
}

function img_load () {
    progress += percent;
    loadedImg++;
    if (progress >= 100 || loadedImg == imagesCount) {

        setTimeout(function () {
            preloader.delay(100).slideUp('slow');
        }, 5000)
        dBody.css('overflow', '');
    }
}


$(window).on('load', function () {
    $('.callback, .popup__btn').click( (event)=> {
        event.preventDefault();
        $('.popup__back').slideDown('200')
        setTimeout(()=> {
            $('.popup').fadeIn('200');
        }, 250)
    });

    let selector = document.getElementsByClassName("form__tel");
    let im = new Inputmask("+\\9\\98(99)999-99-99");
    im.mask(selector);

    $('.arrow__top').click(function(event){
        event.preventDefault();
        $('html,body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });

    $('.popup__close').click(()=> {
        $('.popup').fadeOut('200');
        setTimeout(()=> {
            $('.popup__back').slideUp('200');
        }, 250)
    })

    $('.menu__cat').click(function (event) {
        event.preventDefault();
        $(this).parent().toggleClass('active')
        $(this).parent().children('.box__links').slideToggle('200')
    })


    $('button.header__menu').click(function (event) {
        event.preventDefault();
        $('.menu').slideToggle();
        $(this).toggleClass('active');
        $('.menu__box .box').removeClass('active');
    })

    const animItems = document.querySelectorAll(`.anima-blocks`)
    if (animItems.length > 0) {
        window.addEventListener(`scroll`, animOnScroll)

        function animOnScroll() {
            for (let index = 0; index < animItems.length; index++) {
                const animItem = animItems[index]
                const animItemHeight = animItem.offsetHeight
                const animItemOffSet = offset(animItem).top
                const animStart = 4;
                let animItemPoint = window.innerHeight - animItemHeight / animStart
                if (animItemHeight > window.innerHeight) {
                    animItemPoint = window.innerHeight - window.innerHeight / animStart
                }
                if ((pageYOffset > animItemOffSet - animItemPoint) && pageYOffset < (animItemOffSet + animItemHeight)) {
                    animItem.classList.add(`anima-active`)
                } else {
                    if (!(animItem.classList.contains(`_anim-no-hide`))) {
                        // animItem.classList.remove(`anima-active`)
                    }
                }
            }
        }

        function offset(el) {
            const rect = el.getBoundingClientRect()
            let scrollLeft = window.pageXOffset || document.documentElement.scrollLeft
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop
            return {top: rect.top + scrollTop, left: rect.left + scrollLeft}
        }

        setTimeout(() => {
            animOnScroll()
        }, 1000)
    }


    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 120, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 400, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: false, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });

    $(function(){

        var $customSelect = $( '.custom-select' );
        var $resetButton = $( '#resetButton' );


        $customSelect.each(function() {
            var classes = $( this ).attr( 'class' );
            var id = $( this ).attr( 'id' );
            var name = $( this ).attr( 'name' );

            var template =  '<div class="' + classes + '">';
            template += '<span class="custom-select-trigger">';
            template += '<span class="custom-select-trigger-text">' + $( this ).data( 'placeholder' ) + '</span>';
            template += '</span>';
            template += '<div class="custom-options">';

            $(this).find( 'option' ).each( function() {
                template += '<span class="custom-option" data-value="' + $( this ).attr( 'value' ) + '">' + $( this ).html() + '</span>';
            });

            template += '</div></div>';

            var customSelectWrapper = $( '<div class="custom-select-wrapper"></div>' );
            customSelectWrapper.css({
                '-webkit-user-select': 'none',
                '-moz-user-select': 'none',
                '-ms-user-select': 'none',
                'user-select': 'none'
            });

            $( this ).wrap( customSelectWrapper );
            $( this ).after( template );
        });


        $( document ).on( 'click', function( e ){
            var eTarget = e.target;

            if( !$( eTarget ).closest( '.custom-select-wrapper' ).hasClass( 'custom-select-wrapper' ) ) {
                $( '.custom-select' ).removeClass( 'opened' );
                customOptionsClosed();
            }
        });


        $( '.custom-select-trigger' ).on( 'click', function() {
            $( this ).parents( '.custom-select' ).toggleClass( 'opened' );

            var timer;
            if( $( this ).parents( '.custom-select' ).hasClass( 'opened' ) ){
                clearTimeout( timer );

                $( this )
                    .parents( '.custom-select' )
                    .find( '.custom-options' )
                    .stop()
                    .css('display', 'block')
                    .css('visibility', 'visible')
                    .animate({
                        'opacity': '1',
                        'margin-top': '15px',
                    },100 );
            }

            else{
                customOptionsClosed();
            }

        });


        $( '.custom-option' ).on( 'click', function() {
            $( this ).parents( '.custom-select-wrapper' ).find( 'select' ).val( $( this ).data( 'value' ) );
            $( this ).parents( '.custom-options' ).find( '.custom-option' ).removeClass( 'selection' );
            $( this ).addClass( 'selection' );
            $( this ).parents( '.custom-select' ).removeClass( 'opened' );
            $( this ).parents( '.custom-select' ).find( '.custom-select-trigger-text' ).text( $( this ).text() );
            customOptionsClosed();
        });


        $resetButton.on('click', function() {
            $( '.custom-select-trigger-text' ).text( $customSelect.data( 'placeholder' ) );
        });


        function customOptionsClosed() {
            $('.custom-options')
                .stop()
                .animate({
                    opacity: 0,
                    'margin-top': '0'

                },100 );

            t = setTimeout(function(){
                $('.custom-options').css('display', 'none');
            }, 500 );
        }

    });


});
