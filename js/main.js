$('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })

    // Counter Animation
let nCount = function(selector) {
    $(selector).each(function() {
        $(this).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: "swing",
            step: function(value){
                $(this).text(Math.ceil(value));
            }
        })
    }); 
}

let a = 0;
let b = 0;
$(window).scroll(function() {
    let oTop = $(".numbers").offset().top - window.innerHeight;

    if (a==0 && $(window).scrollTop() >= oTop){
        a++;
        nCount(".date > .p");
    }
})




