var myslide = document.querySelectorAll('.main'),
    dot = document.querySelectorAll('.dot'),
    image = document.getElementsByClassName('image')

let counter = 1;
slidefun(counter);

let timer = setInterval(autoSlide, 6000);
function autoSlide() {
    counter += 1;
    slidefun(counter);
}
function plusSlides(n) {
    counter += n;
    slidefun(counter);
    resetTimer();
}
function currentSlide(n) {
    counter = n;
    slidefun(counter);
    resetTimer();
}
function resetTimer() {
    clearInterval(timer);
    timer = setInterval(autoSlide, 6000);
}

function slidefun(n) {

    let i;
    for (i = 0; i < myslide.length; i++) {
        myslide[i].className = 'main';
    }
    for (i = 0; i < dot.length; i++) {
        dot[i].className = 'dot';
    }
    if (n > myslide.length) {
        counter = 1;
    }
    if (n < 1) {
        counter = myslide.length;
    }
    myslide[counter - 1].className = 'active_main';
    dot[counter - 1].className += " dot_active";
}

$(document).ready(function () {
    $('.slider_seller').slick({
        autoplay: true,
        infinite: true,
        autoplaySpeed: 2000,
        prevArrow: "<i class='fa fa-angle-left'></i>",
        nextArrow: "<i class='fa fa-angle-right'></i>",
    });
});


$(document).ready(function () {
    $('.slider_sale').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 2000,
        prevArrow: "<i class='fa fa-angle-left'></i>",
        nextArrow: "<i class='fa fa-angle-right'></i>",
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});