var owl = $('.portfolio-carousel');
owl.owlCarousel({
    loop: true,
    items: 1,
    nav: false,
    dots: false,
    animateOut: 'fadeOut',
    margin: 10,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 3300,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
// Custom Button
$('.customNextBtn').click(function () {
    owl.trigger('next.owl.carousel');
});
$('.our-client-carousel').owlCarousel({
    loop: true,
    items: 2,
    nav: false,
    dots: true,
    margin: 10,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 2500,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }
    }
});
$('.client-testimonial-carousel').owlCarousel({
    loop: false,
    items: 2,
    nav: false,
    dots: true,
    margin: 50,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 2500,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        },
        1200: {
            items: 3
        }
    }
});
$('.industries-we-serve-carousel').owlCarousel({
    loop: false,
    items: 2,
    nav: false,
    dots: true,
    margin: 24,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 2500,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        },
        1200: {
            items: 4
        }
    }
});
$('.process-we-follow-carousel').owlCarousel({
    loop: true,
    items: 2,
    nav: false,
    dots: false,
    margin: 24,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 3200,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        },
        1200: {
            items: 2
        },
        1300: {
            items: 2
        },
        1400: {
            items: 3
        }
    }
});
$('.hire-process-we-follow-carousel').owlCarousel({
    loop: true,
    items: 2,
    nav: false,
    dots: false,
    margin: 24,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 3200,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
});
var owl2 = $('.why-choose-carousel');
owl2.owlCarousel({
    loop: true,
    items: 1,
    nav: false,
    dots: true,
    margin: 50,
    dotsContainer: '.cust-dots',
    responsiveClass: true,
    autoplay: false,
    autoplayTimeout: 3200,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
// Custom Button
$('.cust-nav').click(function () {
    owl2.trigger('next.owl.carousel');
});


var acjs = undefined;
$(document).ready(function () {
    try {
        acjs = $('#accordion').accordionjs();
    } catch (error) {
        console.log("Error:" + error);
    }
});

//header tab
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
//header tab

$('.process-we-follow-carousel-2').owlCarousel({
    loop: true,
    items: 2,
    nav: false,
    dots: false,
    margin: 3,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 3200,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
});